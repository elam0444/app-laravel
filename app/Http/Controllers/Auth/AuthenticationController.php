<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\HashId;
use App\Http\Requests\LoginRequest;
use App\Models\Role;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\Http\Controllers\Controller;
use App\Http\Responses\Response;
use App\Http\Requests\PostSignUpRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

/**
 * Class AuthenticationController
 * @package App\Http\Controllers\Auth
 */
class AuthenticationController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * AuthenticationController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(
        UserRepository $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a basic home view with user and role information
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        //$user = Sentinel::getUser();
        $user = $request->user();
        $user = $this->userRepository->find($user->id);

        return view('welcome', [
            'user' => $user
        ]);
    }

    /**
     * Display the login page
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getLogin()
    {
        return view('auth.login');
    }

    /**
     * Process the login request and update the user variables based on this
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postLogin(LoginRequest $request)
    {
        $user = $this->userRepository->findByField('email', $request->get('email'))->first();

        $errorMessage = trans('responses.auth.login.error_default');

        $areCredentialsValid = Sentinel::validateCredentials($user, $request->only('email', 'password'));

        if ($areCredentialsValid) {
            Sentinel::login($user);
            return redirect()->intended(route('home'));
        }

        return redirect()->back()
            ->withInput()
            ->withErrors([
                'email' => $errorMessage
            ]);
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

    /**
     * Creates a new account on Sign-Up
     *
     * Route:
     *  POST /signup
     *
     * @param PostSignUpRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postSignUp(PostSignUpRequest $request)
    {
        try {
            $user = $this->userRepository->create([
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'email' => strtolower($request->get('email')),
                'password' => $request->get('password')
            ]);

            $role = Sentinel::findRoleBySlug(Role::SUPER_ADMIN);

            $role->users()->attach($user);

            //$user = Sentinel::findById(1);
            $activation = Activation::create($user);
            Activation::complete($user, $activation->code);

            return Response::buildDefaultResponse(
                trans('responses.success'),
                trans('responses.signup.success')
            );
        } catch (\Exception $e) {
            return Response::buildDefaultResponse(
                trans('responses.error'),
                trans('responses.signup.error')
            );
        }
    }

    /**
     * Display the logout page
     *
     * @return Response
     */
    public function getLogout()
    {
        $user = Sentinel::check();

        Sentinel::logout($user, true);

        return redirect()->intended(route('auth.login'));
    }
}
