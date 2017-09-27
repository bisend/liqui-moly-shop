<?php

namespace App\Http\Controllers;

use App\Helpers\Languages;
use Illuminate\Http\Request;
use Response;
use Session;

class MainAjaxController extends LayoutController
{
    public $isOrderCreated = false;

    public $isUserAuth = false;

    public function index()
    {
        if (Session::has('isOrderCreated'))
        {
            $this->isOrderCreated = Session::get('isOrderCreated');

            Session::forget('isOrderCreated');

            if (Session::has('isOrderCreated'))
            {
                return Response::json([
                    'status' => 'error',
                    'isOrderCreated' => false
                ]);
            }
        }

        if (auth()->check())
        {
            $this->isUserAuth = true;
        }

        return response()->json([
            'status' => 'success',
            'isOrderCreated' => $this->isOrderCreated,
            'isUserAuth' => $this->isUserAuth
        ]);
    }
}
