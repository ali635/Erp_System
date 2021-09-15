<?php

namespace App\Http\Repository ;

use App\Http\Interfaces\ReportsInterface;
use App\Traits\ResponseAPI;
use App\Models\Sells ;
use App\Models\Purchases ;
use Illuminate\Http\Request;
use App\Http\Resources\Sells as SellsResource ;
use Illuminate\Support\Facades\DB;

class  ReportsRepository implements ReportsInterface {

    use ResponseAPI ;

    public function ClientReports(Request $request)
    {
        $from = $request->start ;
        $to   = $request->end   ;
        // fetch data from to tables
        $sales  = Sells::select('client')->whereBetween('pay_date', [$from, $to]);
        $receipt = Purchases::select('supplier')->whereBetween('pay_date', [$from, $to]);
        $get_data = $sales->unionAll($receipt)->get();
        // check if their data  or no
        if ($get_data->isEmpty()) {
            return $this->sendError('no data found');
         }else{
            return $this->sendResponse(SellsResource::collection($get_data), 'All sales and receipt invoices have been sent successfully');
         }
    }

    

}
