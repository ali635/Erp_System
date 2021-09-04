<?php

namespace App\Http\Interfaces;
use App\Http\Requests\RequestStore;

interface ProductRepositoryInterface
{
    public function GetProduct();
    public function StoreProduct($request);
    public function UpdateProduct($id,$request);
    public function ShowProduct($id);
    public function deleteProduct($id);
}