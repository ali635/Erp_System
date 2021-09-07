<?php

namespace App\Http\Interfaces;
use App\Http\Requests\Product as ProductRequest;

interface ProductRepositoryInterface
{
    public function GetProduct();
    public function StoreProduct(ProductRequest $request);
    public function UpdateProduct($id,ProductRequest $request);
    public function ShowProduct($id);
    public function deleteProduct($id);
}