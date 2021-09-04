<?php

namespace App\Http\Interfaces;
use App\Http\Requests\RequestTax;

interface TaxRepositoryInterface
{
    public function GetTax();
    public function StoreTax($request);
    public function UpdateTax($id,$request);
    public function ShowTax($id);
    public function deleteTax($id);
}