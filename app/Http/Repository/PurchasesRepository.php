<?php

namespace App\Http\Repository ;

use App\Http\Interfaces\PurchasesInterface;
use App\Http\Resources\Purchases as PurchasesResource;
use App\Models\Purchases;
use App\Traits\ResponseAPI;
use Illuminate\Support\Facades\DB;

class PurchasesRepository implements PurchasesInterface {

    use ResponseAPI ;

    public function getAllPurchases()
    {
        $invoices = DB::table('purchases')->get();
        if ($invoices) {
            return $this->sendResponse(PurchasesResource::collection($invoices), 'All Purchases have been sent successfully');
         }
    }

    public function getPurchasesByID($id)
    {
        $invoice = Purchases::find($id);
        if($invoice){
            return $this->sendResponse(new PurchasesResource($invoice), 'Purchases found successfully');
        }else{
            return $this->sendError('Purchases not found');
        }
    }

    public function createOrUpdatePurchases($data = [], $id = null)
    {
        if(is_null($id)){
            $invoice = new Purchases();
            $invoice->supplier     = $data['supplier'];
            $invoice->pay_date     = $data['pay_date'];
            $invoice->cash_status  = $data['cash_status'];
            $invoice->in_pocket    = $data['in_pocket'];
            $invoice->barcode      = $data['barcode'];
            $invoice->product_number = $data['product_number'];
            $invoice->description    = $data['description'];
            $invoice->price    = $data['price'];
            $invoice->quantity = $data['quantity'];
            $invoice->total    = $data['total'];

            $invoice->save();
            return $this->sendResponse(new PurchasesResource($invoice),'Purchases added successfully');
        }else{
            $invoice = Purchases::find($id);
            if($invoice){
                $invoice->supplier     = $data['supplier'];
                $invoice->pay_date     = $data['pay_date'];
                $invoice->cash_status  = $data['cash_status'];
                $invoice->in_pocket    = $data['in_pocket'];
                $invoice->barcode      = $data['barcode'];
                $invoice->product_number = $data['product_number'];
                $invoice->description    = $data['description'];
                $invoice->price    = $data['price'];
                $invoice->quantity = $data['quantity'];
                $invoice->total    = $data['total'];
                $invoice->save();
                return $this->sendResponse(new PurchasesResource($invoice),'Purchases updated successfully');
            }else{
                return $this->sendError('Purchases not found');
            }
        }

    }

    public function deletePurchases($id)
    {
        $invoice = Purchases::findOrFail($id);
        if($invoice){
            $invoice->delete();
            return $this->sendResponse(new PurchasesResource($invoice),'Purchases deleted successfully ');
        }else{
            return $this->sendError('Purchases not found');
        }
    }

}
