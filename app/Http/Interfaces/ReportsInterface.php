<?php
namespace App\Http\Interfaces;

use Illuminate\Http\Request;

interface ReportsInterface{

    public function ClientReports(Request $request);
}
