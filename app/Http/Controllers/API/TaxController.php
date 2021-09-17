<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\TaxRepositoryInterface;
use App\Http\Requests\Tax as TaxRequest;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    protected $Tax;
    public function __construct(TaxRepositoryInterface $Tax)
    {
        $this->Tax = $Tax;
    }

    public function index()
    {
        return $this->Tax->GetTax();
    }
    public function store(TaxRequest $request)
    {
        return $this->Tax->StoreTax($request);
    }
    public function show($id)
    {
        return $this->Tax->ShowTax($id);
    }
    public function update($id,TaxRequest $request)
    {
        return $this->Tax->UpdateTax($id,$request);
    }
    public function destroy($id)
    {
        return $this->Tax->DeleteTax($id);
    }
}
