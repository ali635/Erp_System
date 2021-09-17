<?php

namespace App\Http\Interfaces;
use App\Http\Requests\Admin as AdminRequest;

interface AdminRepositoryInterface
{
    public function GetAdmin();
    public function StoreAdmin(AdminRequest $request);
    public function UpdateAdmin($id,AdminRequest $request);
    public function ShowAdmin($id);
    public function deleteAdmin($id);   
}