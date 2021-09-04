<?php

namespace App\Http\Repository;

use App\Http\Interfaces\AdminRepositoryInterface;
use App\Http\Resources\Admin as ResourcesAdmin;
use App\Models\Admin;
use App\Traits\ResponseAPI;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;

class AdminRepository implements AdminRepositoryInterface
{
    use ResponseAPI;

    public function GetAdmin()
    {
        $Admin = DB::table('admins')->get();
        return $this->sendResponse(ResourcesAdmin::collection($Admin),
          'تم ارسال جميع المشرفين');
    }

    public function StoreAdmin($request)
    {
        try {
            $Admin = new Admin();
            $Admin->name = $request->name;
            $Admin->email = $request->email;
            $Admin->role_id = $request->role_id;
            $Admin->password = Hash::make($request->password);
            $Admin->save();
            return $this->sendResponse(new ResourcesAdmin($Admin) ,'تم اضافة الادمن  بنجاح ' );
        }
        catch (Exception $e) {
            return $this->sendError('Please validate error' ,$e->getMessage() );
        }
    }

    public function ShowAdmin($id) 
    {
        try {
            $Admin = Admin::findOrFail($id);
            return $this->sendResponse(new ResourcesAdmin($Admin) ,'هذا هو الادمن الذي تريده بنجاح' );
        }
        catch (Exception $e) {
            return $this->sendError('Please validate error' ,$e->getMessage() );
        }
    }

    public function UpdateAdmin($id,$request) 
    {
        try {
            $Admin = Admin::findOrFail($id);
            $Admin->name = $request->name;
            $Admin->email = $request->email;
            $Admin->role_id= $request->role_id;
            $Admin->password = Hash::make($request->password);;
            $Admin->save();
            return $this->sendResponse(new ResourcesAdmin($Admin) ,'تم تعديل الادمن بنجاح ' );
        }
        catch (Exception $e) {
            return $this->sendError('Please validate error' ,$e->getMessage() );
        }
    }

    public function deleteAdmin($id) 
    {
        $Admin = Admin::findOrFail($id);
        $Admin->delete();
        return $this->sendResponse(new ResourcesAdmin($Admin)  ,'تم حذف الادمن بنجاح' );
    }
    
}