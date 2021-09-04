<?php

namespace App\Http\Repository;

use App\Http\Interfaces\ProductRepositoryInterface;
use App\Traits\ResponseAPI;
use App\Http\Resources\Product as ProductResource;
use App\Models\Product;
use Validator;
use Illuminate\Support\Facades\DB;


class ProductRepository implements ProductRepositoryInterface
{
    use ResponseAPI;

    public function GetProduct()
    {
        $Product = DB::table('products')->get();
        return $this->sendResponse(ProductResource::collection($Product),
          'تم ارسال جميع سندات الصرف');
    }

    public function StoreProduct($request)
    {
        try {
            $Product = new Product();
            $Product->Product_name = $request->Product_name;
            $Product->Product_number = $request->Product_number;
            $Product->description = $request->description;
            $Product->position = $request->position;
            $Product->weight = $request->weight;
            $Product->cost = $request->cost;
            $Product->price = $request->price;
            $Product->quantity = $request->quantity;
            $Product->less_quantity = $request->less_quantity;
            $Product->Factory_No = $request->Factory_No;

            if($request->photo && $request->photo->isValid())
            {
                $file=$request->file('photo');
                $name='products/'.uniqid().'.'.$file->extension();
                $file->storePubliclyAs('public',$name);
                $Product->photo=$name;
            }

            $Product->store_id = $request->store_id;
            $Product->save();
            return $this->sendResponse(new ProductResource($Product) ,'تم اضافة سند الصرف بنجاح بنجاح ' );
        }
        catch (Exception $e) {
            return $this->sendError('Please validate error' ,$e->getMessage() );
        }
    }

    public function ShowProduct($id) 
    {
        try {
            $Product = Product::findOrFail($id);
            return $this->sendResponse(new ProductResource($Product) ,'هذا هو سند الصرف الذي تريده' );
        }
        catch (Exception $e) {
            return $this->sendError('Please validate error' ,$e->getMessage() );
        }
    }

    public function UpdateProduct($id,$request) 
    {
        try {
            $Product = Product::findOrFail($id);
            $Product->Product_name = $request->Product_name;
            $Product->Product_number =  $request->Product_number;
            $Product->description = $request->description;
            $Product->position = $request->position;
            $Product->weight = $request->weight;
            $Product->cost = $request->cost;
            $Product->price = $request->price;
            $Product->quantity = $request->quantity;
            $Product->less_quantity = $request->less_quantity;
            $Product->Factory_No = $request->Factory_No;
            if($request->photo && $request->photo->isValid())
            {
                $file=$request->file('photo');
                $name='products/'.uniqid().'.'.$file->extension();
                $file->storePubliclyAs('public',$name);
                $Product->photo=$name;
            }
            $Product->store_id = $request->store_id;
            $Product->save();
            return $this->sendResponse(new ProductResource($Product) ,'تم تعديل سند الصرف بنجاح ' );
        }
        catch (Exception $e) {
            return $this->sendError('Please validate error' ,$e->getMessage() );
        }
    }

    public function deleteProduct($id) 
    {
        $Product = Product::findOrFail($id);
        $Product->delete();
        return $this->sendResponse(new ProductResource($Product)  ,'تم حذف سند الصرف بنجاح' );
    }
}