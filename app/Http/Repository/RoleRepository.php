<?php

namespace App\Http\Repository;

use App\Http\Interfaces\RoleRepositoryInterface;
use App\Traits\ResponseAPI;
use App\Http\Resources\Role as RoleResource;
use App\Models\Role;
use App\Http\Requests\Role as RoleRequest;

class RoleRepository implements RoleRepositoryInterface
{
    use ResponseAPI;

    public function GetRole()
    {
        $Role = Role::get();
        return $this->sendResponse(RoleResource::collection($Role),
          'تم ارسال جميع سندات الصرف');
    }

    public function StoreRole(RoleRequest $request)
    {
        try {
            $role = new Role();
            $role->name = $request->name;
            $role->permissions = json_encode($request->permissions);
            $role->save();
            return $this->sendResponse(new RoleResource($role) ,'تم اضافة الصلاحية بنجاح بنجاح ' );
        }
        catch (Exception $e) {
            return $this->sendError('Please validate error' ,$e->getMessage() );
        }
    }

    public function ShowRole($id) 
    {
        try {
            $Role = Role::findOrFail($id);
            return $this->sendResponse(new RoleResource($Role) ,'هذا هو الصلاحية الذي تريده' );
        }
        catch (Exception $e) {
            return $this->sendError('Please validate error' ,$e->getMessage() );
        }
    }

    public function UpdateRole($id,RoleRequest $request) 
    {
        try {
            $role = Role::findOrFail($id);
            $role->name = $request->name;
            $role->permissions = json_encode($request->permissions);
            $role->save();
            return $this->sendResponse(new RoleResource($role) ,'تم تعديل الصلاحية بنجاح ' );
        }
        catch (Exception $e) {
            return $this->sendError('Please validate error' ,$e->getMessage() );
        }
    }

    public function deleteRole($id) 
    {
        $Role = Role::findOrFail($id);
        $Role->delete();
        return $this->sendResponse(new RoleResource($Role)  ,'تم حذف الصلاحية بنجاح' );
    }
}