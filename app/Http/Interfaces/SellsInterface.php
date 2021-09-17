<?php
namespace App\Http\Interfaces;

interface SellsInterface{

    public function getAllInvoices();

    public function getInvoiceByID($id);

    public function createOrUpdateInvoice($data = [], $id = null);

    public function deleteInvoice($id);
}
