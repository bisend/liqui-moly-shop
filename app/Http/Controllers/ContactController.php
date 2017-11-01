<?php

namespace App\Http\Controllers;

use App\Helpers\Languages;
use App\Mail\ContactEmail;
use App\Services\ContactService;
use App\ViewModels\ContactViewModel;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Class ContactController
 * @package App\Http\Controllers
 */
class ContactController extends LayoutController
{
    /**
     * @var ContactService
     */
    protected $contactService;

    /**
     * ContactController constructor.
     * @param ContactService $contactService
     */
    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    /**
     * @param string $language
     * @return mixed
     */
    public function index($language = Languages::DEFAULT_LANGUAGE)
    {
        $model = new ContactViewModel($language);

        $this->contactService->fill($model);

        return view('pages.contact.contact', compact('model'));
    }

    /**
     * send email to manager (contact)
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendContactEmail()
    {
        if(!request()->ajax())
        {
            throw new BadRequestHttpException();
        }
        
        $email = request('email');
        $name = request('name');
        $message = request('message');
        $language = request('language');
        
        Languages::localizeApp($language);

        try {
            \Mail::to(config('mail.from.address'))->send(new ContactEmail($email, $name, $message, $language));
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
