<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Interfaces\ReceiptRepositoryInterface;
use App\Http\Requests\RequestReceipt;

class ReceiptController extends Controller
{
    protected $Receipt;
    public function __construct(ReceiptRepositoryInterface $Receipt)
    {
        $this->Receipt = $Receipt;
    }

    public function index()
    {
        return $this->Receipt->GetReceipt();
    }
    public function store(RequestReceipt $request)
    {
        return $this->Receipt->StoreReceipt($request);
    }
    public function show($id)
    {
        return $this->Receipt->ShowReceipt($id);
    }
    public function update($id,RequestReceipt $request)
    {
        return $this->Receipt->UpdateReceipt($id,$request);
    }
    public function destroy($id)
    {
        return $this->Receipt->DeleteReceipt($id);
    }
}
