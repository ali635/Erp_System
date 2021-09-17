<?php

namespace App\Http\Interfaces;
use App\Http\Requests\RequestReceipt;

interface ReceiptRepositoryInterface
{
    public function GetReceipt();
    public function StoreReceipt(RequestReceipt $request);
    public function UpdateReceipt($id,RequestReceipt $request);
    public function ShowReceipt($id);
    public function deleteReceipt($id);
}