<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\RoleRepositoryInterface;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $Role;
    public function __construct(RoleRepositoryInterface $Role)
    {
        $this->Role = $Role;
    }

    public function index()
    {
        return $this->Role->GetRole();
    }
    public function store(Request $request)
    {
        return $this->Role->StoreRole($request);
    }
    public function show($id)
    {
        return $this->Role->ShowRole($id);
    }
    public function update($id,Request $request)
    {
        return $this->Role->UpdateRole($id,$request);
    }
    public function destroy($id)
    {
        return $this->Role->DeleteRole($id);
    }
}
