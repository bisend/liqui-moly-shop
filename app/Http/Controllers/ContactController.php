<?php

namespace App\Http\Controllers;

use App\Helpers\Languages;
use App\Services\ContactService;
use App\ViewModels\ContactViewModel;

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
}
