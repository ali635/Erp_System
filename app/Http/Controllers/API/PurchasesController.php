<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Interfaces\PurchasesInterface;

class PurchasesController extends Controller
{
    protected $purchasesinterface ;
    public function __construct(PurchasesInterface $purchasesinterface)
    {
        $this->purchasesinterface = $purchasesinterface ;
    }

    public function index()
    {
        return $this->purchasesinterface->getAllPurchases();
    }


    public function store(Request $request, $id = null )
    {
        return $this->purchasesinterface->createOrUpdatePurchases($request, $id);
    }


    public function show($id)
    {
        return $this->purchasesinterface->getPurchasesByID($id);
    }

    public function update(Request $request, $id)
    {
        return $this->purchasesinterface->createOrUpdatePurchases($request, $id);
    }


    public function destroy($id)
    {
        return $this->purchasesinterface->deletePurchases($id);
    }
}
