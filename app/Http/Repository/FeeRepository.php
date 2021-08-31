<?php

namespace App\Http\Repository;

use App\Http\Interfaces\FeeRepositoryInterface;
use App\Traits\ResponseAPI;
use App\Http\Resources\Fee as FeeResource;
use App\Models\Fee;
use Validator;
use Illuminate\Support\Facades\DB;


class FeeRepository implements FeeRepositoryInterface
{
    use ResponseAPI;

    public function GetFee()
    {
        $Fees = DB::table('fees')->get();
        return $this->sendResponse(FeeResource::collection($Fees),
          'تم ارسال جميع سندات الصرف');
    }

    public function StoreFee($request)
    {
        try {
            $Fees = new Fee();
            $Fees->name = $request->name;
            $Fees->amount = $request->amount;
            $Fees->year = $request->year;
            $Fees->payment_type = $request->payment_type;
            $Fees->description = $request->description;
            $Fees->save();
            return $this->sendResponse(new FeeResource($Fees) ,'تم اضافة سند الصرف بنجاح بنجاح ' );
        }
        catch (Exception $e) {
            return $this->sendError('Please validate error' ,$e->getMessage() );
        }
    }

    public function ShowFee($id) 
    {
        try {
            $fee = Fee::findOrFail($id);
            return $this->sendResponse(new FeeResource($fee) ,'هذا هو سند الصرف الذي تريده' );
        }
        catch (Exception $e) {
            return $this->sendError('Please validate error' ,$e->getMessage() );
        }
    }

    public function UpdateFee($id,$request) 
    {
        try {
            $Fees = Fee::findOrFail($id);
            $Fees->name = $request->name;
            $Fees->amount =  $request->amount;
            $Fees->year = $request->year;
            $Fees->payment_type = $request->payment_type;
            $Fees->description = $request->description;
            $Fees->save();
            return $this->sendResponse(new FeeResource($Fees) ,'تم تعديل سند الصرف بنجاح ' );
        }
        catch (Exception $e) {
            return $this->sendError('Please validate error' ,$e->getMessage() );
        }
    }

    public function deleteFee($id) 
    {
        $fee = Fee::findOrFail($id);
        $fee->delete();
        return $this->sendResponse(new FeeResource($fee)  ,'تم حذف سند الصرف بنجاح' );
    }
}