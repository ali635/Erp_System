<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\StoreRepositoryInterface;
use App\Http\Requests\Store as StoreRequest;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    protected $Store;
    public function __construct(StoreRepositoryInterface $Store)
    {
        $this->Store = $Store;
    }

    public function index()
    {
        return $this->Store->GetStore();
    }
    public function store(StoreRequest $request)
    {
        return $this->Store->StoreStore($request);
    }
    public function show($id)
    {
        return $this->Store->ShowStore($id);
    }
    public function update($id,Request $request)
    {
        return $this->Store->UpdateStore($id,$request);
    }
    public function destroy($id)
    {
        return $this->Store->DeleteStore($id);
    }
}
