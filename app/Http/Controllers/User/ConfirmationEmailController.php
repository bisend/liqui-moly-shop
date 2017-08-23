<?php

namespace App\Http\Controllers\User;

use App\DatabaseModels\User;
use App\Helpers\Languages;
use App\Http\Controllers\LayoutController;

/**
 * Class ConfirmationEmailController
 * @package App\Http\Controllers\User
 */
class ConfirmationEmailController extends LayoutController
{
    /**
     * @param null $confirmationToken
     * @param string $language
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function confirm($confirmationToken = null, $language = Languages::DEFAULT_LANGUAGE)
    {
        $user = User::whereConfirmationToken($confirmationToken)->first();

        if (!$user)
        {
            abort(404);
        }

        if ($user->active == true)
        {
            return redirect(url_home($language));
        }

        $user->active = true;
        $user->save();
        
        auth()->login($user);
        
        return redirect(url_home($language));
    }
}
