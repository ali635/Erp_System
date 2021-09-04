<?php

namespace App\Http\Repository;

use App\Http\Interfaces\StoreRepositoryInterface;
use App\Traits\ResponseAPI;
use App\Http\Resources\Store as StoreResource;
use App\Models\Store;
use Validator;
use Illuminate\Support\Facades\DB;


class StoreRepository implements StoreRepositoryInterface
{
    use ResponseAPI;

    public function GetStore()
    {
        $stores = DB::table('stores')->get();
        return $this->sendResponse(StoreResource::collection($stores),
          'تم ارسال جميع المستودعات');
    }

    public function StoreStore($request)
    {
        try 
        {
            $stores = new Store();
            $stores->name = $request->name;
            $stores->save();
            return $this->sendResponse(new StoreResource($stores) ,'تم اضافةالمستود بنجاح ' );
        }
        catch (Exception $e) 
        {
            return $this->sendError('Please validate error' ,$e->getMessage() );
        }
    }

    public function ShowStore($id) 
    {
        try 
        {
            $store = Store::findOrFail($id);
            return $this->sendResponse(new StoreResource($store) ,'هذا هو المستود الذي تريده' );
        }
        catch (Exception $e) 
        {
            return $this->sendError('Please validate error' ,$e->getMessage() );
        }
    }

    public function UpdateStore($id,$request) 
    {
        try 
        {
            $stores = Store::findOrFail($id);
            $stores->name = $request->name;
            $stores->save();
            return $this->sendResponse(new StoreResource($stores) ,'تم تعديل المستود بنجاح ' );
        }
        catch (Exception $e) 
        {
            return $this->sendError('Please validate error' ,$e->getMessage() );
        }
    }

    public function deleteStore($id) 
    {
        $store = Store::findOrFail($id);
        $store->delete();
        return $this->sendResponse(new StoreResource($store)  ,'تم حذف المستود بنجاح' );
    }
}