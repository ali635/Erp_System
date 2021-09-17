<?php

namespace App\Http\Interfaces;
use App\Http\Requests\Tax as TaxRequest;

interface TaxRepositoryInterface
{
    public function GetTax();
    public function StoreTax(TaxRequest $request);
    public function UpdateTax($id, TaxRequest $request);
    public function ShowTax($id);
    public function deleteTax($id);
}