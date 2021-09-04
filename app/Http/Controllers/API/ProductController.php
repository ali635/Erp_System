<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $Product;
    public function __construct(ProductRepositoryInterface $Product)
    {
        $this->Product = $Product;
    }

    public function index()
    {
        return $this->Product->GetProduct();
    }
    public function store(Request $request)
    {
        return $this->Product->StoreProduct($request);
    }
    public function show($id)
    {
        return $this->Product->ShowProduct($id);
    }
    public function update($id,Request $request)
    {
        return $this->Product->UpdateProduct($id,$request);
    }
    public function destroy($id)
    {
        return $this->Product->DeleteProduct($id);
    }
}
