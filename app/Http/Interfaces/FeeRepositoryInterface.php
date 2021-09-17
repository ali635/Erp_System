<?php

namespace App\Http\Interfaces;
use App\Http\Requests\RequestFee;
use App\Http\Requests\Fee as FeeRequest;

interface FeeRepositoryInterface
{
    public function GetFee();
    public function StoreFee(FeeRequest $request);
    public function UpdateFee($id,FeeRequest $request);
    public function ShowFee($id);
    public function deleteFee($id);
}