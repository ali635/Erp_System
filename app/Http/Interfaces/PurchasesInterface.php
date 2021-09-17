<?php
namespace App\Http\Interfaces;

interface PurchasesInterface{

    public function getAllPurchases();

    public function getPurchasesByID($id);

    public function createOrUpdatePurchases($data = [], $id = null);

    public function deletePurchases($id);
}
