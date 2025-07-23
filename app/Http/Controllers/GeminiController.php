<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
// use Illuminate\Http\Request;

class GeminiController extends Controller
{
    public function handlePrompt(Request $request)
    {
        $text = $request->input('text', 'what is laravel?');
        
        if (empty($text)) {
        return response()->json(['error' => 'Text prompt is required'], 400);
        }

        $client = new Client();
        
        $key = env('GEMINI_API_KEY');        
        try {
        $res = $client->post(
            'https://generativelanguage.googleapis.com/v1/models/gemini-1.5-flash:generateContent?key=' . $key,
            [
                'json' => [
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => $text]
                            ]
                        ]
                    ]
                ]
            ]
        );

        $responseBody = json_decode($res->getBody(), true);
       // dd($responseBody);
        $reply = $responseBody['candidates'][0]['content']['parts'][0]['text'] ?? '';

        // return response()->json(['reply' => $reply]);
        // return view('backend.gemini', ['reply' => $reply]);
        return view('backend.gemini', [
            'reply' => $reply,
            'question' => $text
]);

    }
        catch (\Exception $e) {
        return response()->json([
            'error' => 'Request failed',
            'message' => $e->getMessage()
        ], 500);
    }

    }

}
