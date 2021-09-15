<?php

namespace App\Http\Repository ;

use App\Http\Interfaces\SellsInterface;
use App\Http\Resources\Sells as SellsResource;
use App\Models\Sells;
use App\Traits\ResponseAPI;
use Illuminate\Support\Facades\DB;

class SellsRepository implements SellsInterface {

    use ResponseAPI ;

    public function getAllInvoices()
    {
        $invoices = DB::table('sells')->get();
        if ($invoices) {
            return $this->sendResponse(SellsResource::collection($invoices), 'All sales invoicesinvoices have been sent successfully');
         }
    }

    public function getInvoiceByID($id)
    {
        $invoice = Sells::find($id);
        if($invoice){
            return $this->sendResponse(new SellsResource($invoice), 'sales invoice found successfully');
        }else{
            return $this->sendError('sales invoice not found');
        }
    }

    public function createOrUpdateInvoice($data = [], $id = null)
    {
        if(is_null($id)){
            $invoice = new Sells();
            $invoice->client       = $data['client'];
            $invoice->pay_date     = $data['pay_date'];
            $invoice->cash_status  = $data['cash_status'];
            $invoice->in_pocket    = $data['in_pocket'];
            $invoice->barcode      = $data['barcode'];
            $invoice->product_number = $data['product_number'];
            $invoice->description    = $data['description'];
            $invoice->price    = $data['price'];
            $invoice->tax      = $data['tax'];
            $invoice->quantity = $data['quantity'];
            $invoice->total    = $data['total'];

            $invoice->save();
            return $this->sendResponse(new SellsResource($invoice),'sales invoice added successfully');
        }else{
            $invoice = Sells::find($id);
            if($invoice){
                $invoice->client         = $data['client'];
                $invoice->pay_date       = $data['pay_date'];
                $invoice->cash_status  = $data['cash_status'];
                $invoice->in_pocket    = $data['in_pocket'];
                $invoice->barcode      = $data['barcode'];
                $invoice->product_number = $data['product_number'];
                $invoice->description    = $data['description'];
                $invoice->price    = $data['price'];
                $invoice->tax      = $data['tax'];
                $invoice->quantity = $data['quantity'];
                $invoice->total    = $data['total'];
                $invoice->save();
                return $this->sendResponse(new SellsResource($invoice),'sales invoice updated successfully');
            }else{
                return $this->sendError('sales invoice not found');
            }
        }

    }

    public function deleteInvoice($id)
    {
        $invoice = Sells::findOrFail($id);
        if($invoice){
            $invoice->delete();
            return $this->sendResponse(new SellsResource($invoice),'sales invoice deleted successfully ');
        }else{
            return $this->sendError('sales invoice not found');
        }
    }

}
