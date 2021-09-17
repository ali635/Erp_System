<?php

namespace App\Http\Interfaces;
use App\Http\Requests\Store as StoreRequest;

interface StoreRepositoryInterface
{
    public function GetStore();
    public function StoreStore(StoreRequest $request);
    public function UpdateStore($id,StoreRequest $request);
    public function ShowStore($id);
    public function deleteStore($id);
}