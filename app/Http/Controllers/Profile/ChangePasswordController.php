<?php

namespace App\Http\Controllers\Profile;

use App\Helpers\Languages;
use App\Http\Controllers\LayoutController;
use App\Services\ProfileService;
use App\ViewModels\Profile\ChangePasswordViewModel;

/**
 * Class ChangePasswordController
 * @package App\Http\Controllers\Profile
 */
class ChangePasswordController extends LayoutController
{
    /**
     * @var ProfileService
     */
    protected $profileService;

    /**
     * ChangePasswordController constructor.
     * @param ProfileService $profileService
     */
    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    /**
     * @param string $language
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function index($language = Languages::DEFAULT_LANGUAGE)
    {
        Languages::localizeApp($language);
        
        if (!auth()->check())
        {
            return redirect(url_home($language));
        }

        $model = new ChangePasswordViewModel($language);

        $this->profileService->fill($model);

        $model->title = trans('meta.change_password_page_title');

        return view('pages.profile.change-password', compact('model'));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function changePassword()
    {
        $user = auth()->user();

        $data = request()->all();

        $oldPassword = request('oldPassword');

        if (\Hash::check($oldPassword, $user->password))
        {
            $this->profileService->changePassword($user, $data['newPassword']);

            auth()->logout();

            auth()->login($user);

            return response()->json([
                'status' => 'success',
                'message' => 'goodPass',
                'urlCurrent' => ''
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'badPass'
        ]);
    }
}
