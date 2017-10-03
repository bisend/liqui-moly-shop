<?php

namespace App\Http\Controllers;

use App\Mail\OrderCall;

class CallController extends LayoutController
{
    public function orderCall()
    {
        $name = request('name');
        
        $phoneNumber = request('phoneNumber');
        
        $language = request('language');

        try
        {
            \Mail::to(config('mail.from.address'))->send(new OrderCall($name, $phoneNumber, $language));
        }
        catch (\Exception $e)
        {
            return response()->json([
                'status' => 'error'
            ]);
        }

        return response()->json([
            'status' => 'success'
        ]);
    }
}
