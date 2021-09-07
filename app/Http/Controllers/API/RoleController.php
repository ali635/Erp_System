<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\RoleRepositoryInterface;
use App\Http\Requests\Role as RoleRequest;
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
    public function store(RoleRequest $request)
    {
        return $this->Role->StoreRole($request);
    }
    public function show($id)
    {
        return $this->Role->ShowRole($id);
    }
    public function update($id,RoleRequest $request)
    {
        return $this->Role->UpdateRole($id,$request);
    }
    public function destroy($id)
    {
        return $this->Role->DeleteRole($id);
    }
}
