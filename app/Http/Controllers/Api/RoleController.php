<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AssignRoleRequest;
use App\Http\Requests\Api\RoleRequest;
use App\Http\Resources\UserRoleResource;
use App\Repositories\AssignRoleRepository;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function store(RoleRequest $request ,RoleRepository $roleRepo)
    {
        $role = $roleRepo->create($request->only(['role']));
        return sendResponse($role, 'Store a newly created successfully');
    }

    public function assignRole(AssignRoleRequest $request ,AssignRoleRepository $assignRoleRepo)
    {
        $assignRole = $assignRoleRepo->allQuery()->updateOrCreate($request->only(['role_id','user_id']),$request->only(['role_id','user_id']));
        return sendResponse(new UserRoleResource($assignRole), 'Store a newly created successfully');
    }
}
