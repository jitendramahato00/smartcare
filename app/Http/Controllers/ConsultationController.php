<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Provider;
use App\Consultation;
use Illuminate\Support\Facades\Validator; // Validator को इम्पोर्ट करें

class ConsultationController extends Controller
{
    /**
     * Store a newly created consultation in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     * 
     * 
     */




    public function create(Provider $provider)
    {
        // ... (यह मेथड प्रोवाइडर के आरक्षित स्लॉट्स को निकालता है) ...
        $confirmedConsultations = Consultation::where('provider_id', $provider->id)
            ->whereIn('status', ['confirmed', 'pending_approval'])
            ->where('consultation_date', '>=', now()->toDateString())
            ->get();

        $reservedSlots = [];
        foreach ($confirmedConsultations as $consultation) {
            $date = $consultation->consultation_date;
            $time = date('h:i A', strtotime($consultation->consultation_time));
            if (!isset($reservedSlots[$date])) {
                $reservedSlots[$date] = [];
            }
            $reservedSlots[$date][] = $time;
        }

        // <<<--- सबसे महत्वपूर्ण लाइन यह है ---<<<
        // यह सुनिश्चित करता है कि $provider और $reservedSlots वैरिएबल व्यू को भेजे जाएं
        return view('frontend.hospitals.appointments.book', [ 
            'provider' => $provider,
            'reservedSlots' => $reservedSlots
        ]);
    }

    public function store(Request $request)
    {
        // स्टेप 1: डेटा को वैलिडेट करना
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'provider_id' => 'required|exists:providers,id', // यह सुनिश्चित करेगा कि प्रोवाइडर मौजूद है
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'payment_method' => 'required|string',
            'terms_accept' => 'required', // Terms & Conditions को चेक करना
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        // स्टेप 2: मरीज़ को खोजना या बनाना (Find or Create Patient)
        $patient = Patient::updateOrCreate(
            ['email' => $request->input('email')],
            [
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'phone' => $request->input('phone'),
            ]
        );
        
        // स्टेप 3: प्रोवाइडर की जानकारी निकालना
        $provider = Provider::findOrFail($request->input('provider_id'));

        // स्टेप 4: कंसल्टेशन रिकॉर्ड बनाना
        $consultation = new Consultation();
        $consultation->patient_id = $patient->id;
        $consultation->provider_id = $provider->id;
        $consultation->consultation_date = $request->input('appointment_date');
        $consultation->consultation_time = date('H:i:s', strtotime($request->input('appointment_time'))); // समय को 24-घंटे के फॉर्मेट में सेव करें
        $consultation->total_amount = $provider->consulting_fee + $provider->booking_fee;
        $consultation->payment_method = $request->input('payment_method');
        $consultation->status = 'pending_approval'; // सबसे महत्वपूर्ण: स्टेटस को 'pending' पर सेट करें
        $consultation->save();

        // यहाँ से आप पेमेंट गेटवे (Khalti/eSewa) के लिए लॉजिक लिख सकते हैं

        // स्टेप 5: उपयोगकर्ता को सफलता संदेश के साथ रीडायरेक्ट करना
        return redirect()->back()->with('success', 'आपकी कंसल्टेशन का अनुरोध सफलतापूर्वक भेज दिया गया है। एडमिन द्वारा स्वीकृति की प्रतीक्षा करें।');
    }
}