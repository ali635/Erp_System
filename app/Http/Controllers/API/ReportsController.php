<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\ReportsInterface;


class ReportsController extends Controller
{
    protected $reportsinterface ;
    public function __construct(ReportsInterface $reportsinterface)
    {
        $this->reportsinterface = $reportsinterface ;
    }


    public function index(Request $request)
    {
        return $this->reportsinterface->ClientReports($request);
    }

}
