<?php

namespace App\Http\Interfaces;
use App\Http\Requests\RequestReceipt;

interface ReceiptRepositoryInterface
{
    public function GetReceipt();
    public function StoreReceipt($request);
    public function UpdateReceipt($id,$request);
    public function ShowReceipt($id);
    public function deleteReceipt($id);
}