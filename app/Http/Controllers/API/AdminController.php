<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\AdminRepositoryInterface;
use App\Http\Requests\Admin as AdminRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $Admin;
    public function __construct(AdminRepositoryInterface $Admin)
    {
        $this->Admin = $Admin;
    }
    public function index()
    {
        return $this->Admin->GetAdmin();
    }
    public function store(AdminRequest $request)
    {
        return $this->Admin->StoreAdmin($request);
    }
    public function show($id)
    {
        return $this->Admin->ShowAdmin($id);
    }
    public function update($id,AdminRequest $request)
    {
        return $this->Admin->UpdateAdmin($id,$request);
    }
    public function destroy($id)
    {
        return $this->Admin->DeleteAdmin($id);
    }
}
