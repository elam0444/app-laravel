<?php

namespace App\Http\Controllers\Clients;

use Activation;
use App\Http\Controllers\Controller;

/**
 * Class AccountController
 * @package App\Http\Controllers\Clients
 */
class AccountController extends Controller
{
    /**
     * AccountController constructor.
     */
    public function __construct(
    )
    {
    }

    /**
     * Get the view for signing up
     *
     * Route:
     *  GET /signup
     *
     * @return \Illuminate\View\View
     */
    public function getSignUpView()
    {
        return view('clients.sign_up');
    }
}
