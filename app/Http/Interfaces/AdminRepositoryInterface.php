<?php

namespace App\Http\Interfaces;

interface AdminRepositoryInterface
{
    public function GetAdmin();
    public function StoreAdmin($request);
    public function UpdateAdmin($id,$request);
    public function ShowAdmin($id);
    public function deleteAdmin($id);   
}