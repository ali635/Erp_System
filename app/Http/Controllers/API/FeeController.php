<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\FeeRepositoryInterface;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    protected $Fee;
    public function __construct(FeeRepositoryInterface $Fee)
    {
        $this->Fee = $Fee;
    }

    public function index()
    {
        return $this->Fee->GetFee();
    }
    public function store(Request $request)
    {
        return $this->Fee->StoreFee($request);
    }
    public function show($id)
    {
        return $this->Fee->ShowFee($id);
    }
    public function update($id,Request $request)
    {
        return $this->Fee->UpdateFee($id,$request);
    }
    public function destroy($id)
    {
        return $this->Fee->DeleteFee($id);
    }
}
