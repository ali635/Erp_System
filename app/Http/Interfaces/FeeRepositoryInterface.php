<?php

namespace App\Http\Interfaces;
use App\Http\Requests\RequestFee;

interface FeeRepositoryInterface
{
    public function GetFee();
    public function StoreFee($request);
    public function UpdateFee($id,$request);
    public function ShowFee($id);
    public function deleteFee($id);
}