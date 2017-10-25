<?php

namespace App\Http\Controllers;

use App\Helpers\Languages;
use Illuminate\Http\Request;
use Response;
use Session;

/**
 * Class MainAjaxController
 * @package App\Http\Controllers
 */
class MainAjaxController extends LayoutController
{
    /**
     * @var bool
     */
    public $isOrderCreated = false;

    /**
     * @var bool
     */
    public $isUserAuth = false;

    /**
     * @return \Illuminate\Http\JsonResponse
     */
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
