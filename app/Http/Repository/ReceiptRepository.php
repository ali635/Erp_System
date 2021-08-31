<?php

namespace App\Http\Repository;

use App\Http\Interfaces\ReceiptRepositoryInterface;
use App\Http\Requests\RequestReceipt;
use App\Models\Admin;
use App\Traits\ResponseAPI;
use App\Http\Resources\Receipt as ReceiptResource;
use App\Models\Receipt;
use Validator;
use Illuminate\Support\Facades\DB;


class ReceiptRepository implements ReceiptRepositoryInterface
{
    use ResponseAPI;

    public function GetReceipt()
    {
        $Receipts = DB::table('receipts')->get();
        return $this->sendResponse(ReceiptResource::collection($Receipts),
          'تم ارسال جميع سندات القبض');
    }

    public function StoreReceipt($request)
    {
        try {
            $Receipts = new Receipt();
            $Receipts->user_id = $request->user_id;
            $Receipts->amount = $request->amount;
            $Receipts->year = $request->year;
            $Receipts->payment_type = $request->payment_type;
            $Receipts->description = $request->description;
            $Receipts->save();
            return $this->sendResponse(new ReceiptResource($Receipts) ,'تم اضافة سند القبض بنجاح بنجاح ' );
        }
        catch (Exception $e) {
            return $this->sendError('Please validate error' ,$e->getMessage() );
        }
    }

    public function ShowReceipt($id) 
    {
        try {
            $Receipt = Receipt::findOrFail($id);
            return $this->sendResponse(new ReceiptResource($Receipt) ,'هذا هو سند القبض الذي تريده' );
        }
        catch (Exception $e) {
            return $this->sendError('Please validate error' ,$e->getMessage() );
        }
    }

    public function UpdateReceipt($id,$request) 
    {
        try {
            $Receipts = Receipt::findOrFail($id);
            $Receipts->user_id = $request->user_id;
            $Receipts->amount =  $request->amount;
            $Receipts->year = $request->year;
            $Receipts->payment_type = $request->payment_type;
            $Receipts->description = $request->description;
            $Receipts->save();
            return $this->sendResponse(new ReceiptResource($Receipts) ,'تم تعديل سند القبض بنجاح بنجاح ' );
        }
        catch (Exception $e) {
            return $this->sendError('Please validate error' ,$e->getMessage() );
        }
    }

    public function deleteReceipt($id) 
    {
        $Receipt = Receipt::findOrFail($id);
        $Receipt->delete();
        return $this->sendResponse(new ReceiptResource($Receipt)  ,'تم حذف سند القبض بنجاح' );
    }
}