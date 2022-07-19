<?php

namespace App\Http\Controllers\Api;

use App\Events\VerifyEmailEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateUserRequest;
use App\Http\Requests\Api\EmailRequest;
use App\Http\Requests\Api\UpdateUserRequest;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param UserRepository $userRepo
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(UserRepository $userRepo)
    {
        $users = $userRepo->allQuery()->paginate(20);
        return sendResponse($users, 'Display a listing of the resource.');
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateUserRequest $request
     * @param UserRepository $userRepo
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateUserRequest $request, UserRepository $userRepo)
    {
        $user = $userRepo->create($request->only(['name', 'email', 'password']));
        return sendResponse($user, 'Store a newly created successfully');
    }

    /**
     * Display the specified resource.
     * @param $id
     * @param UserRepository $userRepo
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function show($id, UserRepository $userRepo)
    {
        $user = $userRepo->find($id);
        if (is_null($user)) {
            return sendError('No Data Found');
        }
        return sendResponse($user, 'Display the specified user.');
    }

    /**
     * Update the specified resource in storage.
     * @param UserRepository $userRepo
     * @param UpdateUserRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function update(UpdateUserRequest $request, $id, UserRepository $userRepo)
    {
        $user = $userRepo->find($id);
        if (is_null($user)) {
            return sendError('No Data Found');
        }
        $user = $user->update([$request->only(['name', 'email', 'password'])], $id);
        return sendResponse($user, 'Update the specified user successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @param UserRepository $userRepo
     * @return \Illuminate\Http\JsonResponse|void
     */

    public function destroy($id, UserRepository $userRepo)
    {
        $user = $userRepo->find($id);
        if (is_null($user)) {
            return sendError('No Data Found');
        }

        $user->delete();
        return sendSuccess('Remove the specified user successfully');
    }

    public function verifyEmail(EmailRequest $request)
    {
         event(new VerifyEmailEvent($request->email));

         return sendSuccess('Sending Verify Code to ' . $request->email);
    }
}
