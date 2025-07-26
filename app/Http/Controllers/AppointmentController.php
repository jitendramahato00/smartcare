<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Adminhospital; // <<< अपने डॉक्टर के मॉडल को यहाँ इम्पोर्ट करें

class AppointmentController extends Controller
{
    /**
     * डॉक्टर का बुकिंग पेज दिखाता है।
     *
     * @param  int  $id  यह URL से आने वाली डॉक्टर की ID है।
     * @return \Illuminate\View\View
     */
    public function showBookingPage($id)
    {
        // URL से मिली ID के आधार पर डेटाबेस से डॉक्टर का डेटा ढूंढो।
        // findOrFail() अगर ID नहीं मिलती है तो 404 एरर पेज दिखाएगा।
        $hospital = Adminhospital::findOrFail($id);

        // ढूंढे हुए डॉक्टर के डेटा को 'hospital' वैरिएबल के रूप में व्यू को भेजो।
        // यही वो लाइन है जो 'Undefined variable: hospital' एरर को ठीक करती है।
        return view('frontend.hospitals.appointments.book', compact('hospital'));
    }
}