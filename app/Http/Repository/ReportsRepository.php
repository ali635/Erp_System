<?php

namespace App\Http\Repository ;

use App\Http\Interfaces\ReportsInterface;
use App\Traits\ResponseAPI;
use App\Models\Sells ;
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
        $sales  = Sells::select('*')->whereBetween('pay_date', [$from, $to])->get();
        // check if their data  or no
        if ($sales->isEmpty()) {
            return $this->sendError('no data found');
         }else{
            return $this->sendResponse(SellsResource::collection($sales), 'All sales  invoices have been sent successfully');
         }
    }

 }
