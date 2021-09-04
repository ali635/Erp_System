<?php

namespace App\Http\Interfaces;
use App\Http\Requests\RequestStore;

interface StoreRepositoryInterface
{
    public function GetStore();
    public function StoreStore($request);
    public function UpdateStore($id,$request);
    public function ShowStore($id);
    public function deleteStore($id);
}