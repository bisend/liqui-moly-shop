<?php

namespace App\Http\Controllers;

use App\Helpers\Languages;
use App\Services\HistoryService;
use App\Services\HomeService;
use App\ViewModels\HomeViewModel;
use Illuminate\Support\Facades\Validator;

class HomeController extends LayoutController
{
    protected $homeService;

    protected $historyService;

    public function __construct(HomeService $homeService, HistoryService $historyService)
    {
        $this->homeService = $homeService;

        $this->historyService = $historyService;
    }

    public function index($language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new HomeViewModel($language);

        $this->homeService->fill($model);

        $this->historyService->fillVisitedProducts($model);

        return view('pages.home.home', compact('model'));
    }

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
//    public function showLoginForm()
//    {
//        return view('login');
//    }
//
//    public function showRegisterForm()
//    {
//        return view('register');
//    }
//
//    public function login()
//    {
//        if (!auth()->guard()->attempt(request(['email', 'password'])))
//        {
//            return back()->withInput(request(['email']));
//        }
//
//        return redirect('/');
//    }
//
//    public function logout()
//    {
//        auth()->guard()->logout();
//        return redirect('/');
//    }
//
//    public function changePassword()
//    {
//        Validator::make(request()->all(),[
//            'oldPassword' => 'required|string|min:6',
//            'newPassword' => 'required|string|min:6'
//        ])->validate();
//        $user = \Auth::user();
//        $oldPassword = request('oldPassword');
//        $newPassword = request('newPassword');
//
//        if (\Hash::check($oldPassword, $user->password))
//        {
//            $user->password = bcrypt($newPassword);
//            $user->save();
//        }
//        return redirect('/');
//    }
//
//    public function showChangePasswordForm()
//    {
//        return view('change-password');
//    }
}
