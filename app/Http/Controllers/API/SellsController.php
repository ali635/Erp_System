<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Interfaces\SellsInterface;

class SellsController extends Controller
{
    protected $sellsinterface ;
    public function __construct(SellsInterface $sellsInterface)
    {
        $this->sellsinterface = $sellsInterface ;
    }

    public function index()
    {
        return $this->sellsinterface->getAllInvoices();
    }


    public function store(Request $request, $id = null )
    {
        return $this->sellsinterface->createOrUpdateInvoice($request, $id);
    }


    public function show($id)
    {
        return $this->sellsinterface->getInvoiceByID($id);
    }

    public function update(Request $request, $id)
    {
        return $this->sellsinterface->createOrUpdateInvoice($request, $id);
    }


    public function destroy($id)
    {
        return $this->sellsinterface->deleteInvoice($id);
    }
}
