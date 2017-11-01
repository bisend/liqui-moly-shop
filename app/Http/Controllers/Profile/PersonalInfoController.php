<?php

namespace App\Http\Controllers\Profile;

use App\DatabaseModels\Profile;
use App\DatabaseModels\User;
use App\Helpers\Languages;
use App\Http\Controllers\LayoutController;
use App\Mail\NewEmailConfirm;
use App\Services\ProfileService;
use App\ViewModels\Profile\PersonalInfoViewModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Class PersonalInfoController
 * @package App\Http\Controllers\Profile
 */
class PersonalInfoController extends LayoutController
{
    /**
     * @var ProfileService
     */
    protected $profileService;

    /**
     * PersonalInfoController constructor.
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

        $model = new PersonalInfoViewModel($language);

        $this->profileService->fill($model);

        $this->profileService->fillUser($model);

        $this->profileService->fillProfile($model);

        $this->profileService->fillDeliveries($model);

        $this->profileService->fillPayments($model);

        $model->title = trans('meta.personal_info_page_title');

        return view('pages.profile.personal-info', compact('model'));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function savePersonalInfo()
    {
        if(!request()->ajax())
        {
            throw new BadRequestHttpException();
        }
        
        $user = auth()->user();

        $profile = Profile::whereUserId($user->id)->first();

        $data = request()->all();

        $language = $data['language'];

        Languages::localizeApp($language);

        $this->profileService->saveProfilePersonalInfo(
            $profile,
            $data['deliveryId'],
            $data['paymentId'],
            $data['phoneNumber'],
            $data['address']
        );

        $this->profileService->saveUserName($data['name']);

        if ($this->profileService->checkIfEmailChanged($data['email']))
        {
            if ($this->profileService->checkIfUserExists($data['email']))
            {
                return response()->json([
                    'status' => 'error',
                    'userExists' => true
                ]);
            }
            
            $this->profileService->setNewEmail($data['email']);

            $confirmationToken = $user->confirmation_token;

            try {
                $confirmationUrl = url_new_email_confirmation($confirmationToken, $language);

                \Mail::to($data['email'])->send(new NewEmailConfirm($user, $confirmationUrl, $language));
            }
            catch (\Exception $e) {

                return response()->json([
                    'status' => 'error',
                    'failed' => 'server'
                ]);
            }
            
            return response()->json([
                'status' => 'success',
                'emailChanged' => true
            ]);
        }

//        $this->profileService->saveUserPersonalInfo();

//        \Debugbar::info($data, $user, $profile);
        
        return response()->json([
            'status' => 'success'
        ]);
    }

    /**
     * @param null $confirmationToken
     * @param string $language
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function confirmNewEmail($confirmationToken = null, $language = Languages::DEFAULT_LANGUAGE)
    {
        Languages::localizeApp($language);

        $user = User::whereConfirmationToken($confirmationToken)->first();

        if (!$user)
        {
            abort(404);
        }

        if ($user->new_email == null)
        {
            return redirect(url_home($language));
        }

        $user->email = $user->new_email;

        $user->new_email = null;

        $user->save();

        auth()->logout();

        auth()->login($user);

        return redirect(url_home($language));
    }
}
