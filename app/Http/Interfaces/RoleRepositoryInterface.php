<?php

namespace App\Http\Interfaces;
use App\Http\Requests\Role as RoleRequest;

interface RoleRepositoryInterface
{
    public function GetRole();
    public function StoreRole(RoleRequest $request);
    public function UpdateRole($id,RoleRequest $request);
    public function ShowRole($id);
    public function deleteRole($id);
}