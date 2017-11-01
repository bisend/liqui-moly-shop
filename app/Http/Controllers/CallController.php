<?php

namespace App\Http\Controllers;

use App\Helpers\Languages;
use App\Mail\OrderCall;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Class CallController
 * @package App\Http\Controllers
 */
class CallController extends LayoutController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function orderCall()
    {
        if(!request()->ajax())
        {
            throw new BadRequestHttpException();
        }
        
        $name = request('name');
        
        $phoneNumber = request('phoneNumber');
        
        $language = request('language');

        Languages::localizeApp($language);

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
