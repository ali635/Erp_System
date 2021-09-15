<?php
namespace App\Http\Interfaces;

interface SupplierInterface{

    public function getAllSuppliers();

    public function getSupplierByID($id);

    public function createOrUpdateSupplier($data = [], $id = null);

    public function deleteSupplier($id);

}
