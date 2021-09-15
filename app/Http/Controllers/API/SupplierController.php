<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Interfaces\SupplierInterface;

class SupplierController extends Controller
{
    protected $supplierinterface ;

    public function __construct(SupplierInterface $supplierinterface)
    {
        $this->supplierinterface = $supplierinterface;
    }

    public function index()
    {
        return $this->supplierinterface->getAllSuppliers();
    }

    public function store(Request $request, $id = null)
    {
        return $this->supplierinterface->createOrUpdateSupplier($request ,$id);
    }

    public function show($id)
    {
        return $this->supplierinterface->getSupplierByID($id);
    }

    public function update(Request $request, $id)
    {
        return $this->supplierinterface->createOrUpdateSupplier($request,$id);
    }


    public function destroy($id)
    {
        return $this->supplierinterface->deleteSupplier($id);
    }
}
