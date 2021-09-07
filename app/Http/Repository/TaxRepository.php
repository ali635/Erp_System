<?php

namespace App\Http\Repository;

use App\Http\Interfaces\TaxRepositoryInterface;
use App\Traits\ResponseAPI;
use App\Http\Resources\Tax as TaxResource;
use App\Http\Requests\Tax as TaxRequest;
use App\Models\Tax;
use Validator;
use Illuminate\Support\Facades\DB;


class TaxRepository implements TaxRepositoryInterface
{
    use ResponseAPI;

    public function GetTax()
    {
        $Tax = DB::table('taxes')->get();
        return $this->sendResponse(TaxResource::collection($Tax),
          'تم ارسال جميع الضرائب');
    }

    public function StoreTax(TaxRequest $request)
    {
        try {
            $Tax = new Tax();
            $Tax->name = $request->name;
            $Tax->tax_rate = $request->tax_rate;
            $Tax->save();
            return $this->sendResponse(new TaxResource($Tax) ,'تم اضافة الضريبة بنجاح ' );
        }
        catch (Exception $e) {
            return $this->sendError('Please validate error' ,$e->getMessage() );
        }
    }

    public function ShowTax($id) 
    {
        try {
            $Tax = Tax::findOrFail($id);
            return $this->sendResponse(new TaxResource($Tax) ,'هذا هو الضريبةالذي تريده' );
        }
        catch (Exception $e) {
            return $this->sendError('Please validate error' ,$e->getMessage() );
        }
    }

    public function UpdateTax($id,TaxRequest $request) 
    {
        try {
            $Tax = Tax::findOrFail($id);
            $Tax->name = $request->name;
            $Tax->tax_rate =  $request->tax_rate;
            $Tax->save();
            return $this->sendResponse(new TaxResource($Tax) ,'تم تعديل الضريبةبنجاح ' );
        }
        catch (Exception $e) {
            return $this->sendError('Please validate error' ,$e->getMessage() );
        }
    }

    public function deleteTax($id) 
    {
        $Tax = Tax::findOrFail($id);
        $Tax->delete();
        return $this->sendResponse(new TaxResource($Tax)  ,'تم حذف الضريبةبنجاح' );
    }
}