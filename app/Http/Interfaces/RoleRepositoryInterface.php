<?php

namespace App\Http\Interfaces;
use App\Http\Requests\RequestRole;

interface RoleRepositoryInterface
{
    public function GetRole();
    public function StoreRole($request);
    public function UpdateRole($id,$request);
    public function ShowRole($id);
    public function deleteRole($id);
}