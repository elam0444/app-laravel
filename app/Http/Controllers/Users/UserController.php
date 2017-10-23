<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostProfileRequest;
use App\Repositories\UserRepository;
use App\Http\Responses\Response;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Log;

/**
 * Class UserController
 * @package VOIQ\Http\Controllers\Clients
 */
class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(
        UserRepository $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Returns User Details View
     *
     * Routes:
     *  GET user/{hashedId}
     *
     * @param Request $request
     * @param $hashedUserId
     * @return View
     */
    public function getProfile(Request $request, $hashedUserId)
    {
        $user = $this->userRepository->find($request->get('user_id'));

        return view('users.profile', [
            'user' => $user
        ]);
    }

    /**
     * Save User Details View
     *
     * Routes:
     *  POST user/{hashedId}
     *
     * @param PostProfileRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateProfile(PostProfileRequest $request)
    {
        try {
            $user = $this->userRepository->find($request->get('user_id'));

            $userParams = [
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name')
            ];

            if (!empty($user)) {
                $this->userRepository->update($userParams, $user->id);
            }

            return Response::buildDefaultResponse(
                trans('responses.success'),
                trans('responses.users.profile.update.success')
            );
        } catch (\Exception $e) {
            Log::error($e);
            return Response::buildDefaultResponse(
                trans('responses.error'),
                trans('responses.users.profile.update.error')
            );
        }
    }

}
