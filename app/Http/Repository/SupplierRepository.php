<?php
namespace App\Http\Repository;

use App\Http\Interfaces\SupplierInterface;
use App\Http\Resources\Supplier as SupplierResource;
use App\Models\Supplier;
use App\Traits\ResponseAPI;
use Illuminate\Support\Facades\DB;

class SupplierRepository implements SupplierInterface
{
    use ResponseAPI ;

    public function getAllSuppliers()
    {
        $users = DB::table('suppliers')->get();
        if ($users) {
            return $this->sendResponse(SupplierResource::collection($users), 'All suppliers have been sent successfully');
         }
    }

    public function getSupplierByID($id)
    {
        $user = Supplier::find($id);
        if($user){
            return $this->sendResponse(new SupplierResource($user), 'Supplier found successfully');
        }else{
            return $this->sendError('Supplier not found');
        }
    }

    public function createOrUpdateSupplier($data = [], $id = null)
    {
        if(is_null($id)){
            $user = new Supplier();
            $user->name   = $data['name'];
            $user->mobile = $data['mobile'];
            $user->email  = $data['email'];
            $user->city   = $data['city'];
            $user->address1 = $data['address1'];
            $user->address2 = $data['address2'];
            $user->save();
            return $this->sendResponse(new SupplierResource($user),'Supplier added successfully');
        }else{
            $user = Supplier::find($id);
            if($user){
                $user->name   = $data['name'];
                $user->mobile = $data['mobile'];
                $user->email  = $data['email'];
                $user->city   = $data['city'];
                $user->address1 = $data['address1'];
                $user->address2 = $data['address2'];
                $user->save();
                return $this->sendResponse(new SupplierResource($user),'Supplier updated successfully');
            }else{
                return $this->sendError('Supplier not found');
            }
        }
    }
    public function deleteSupplier($id)
    {
        $user = Supplier::findOrFail($id);
        if($user){
            $user->delete();
            return $this->sendResponse(new SupplierResource($user),'Supplier deleted successfully ');
        }else{
            return $this->sendError('Supplier not found');
        }
    }


}
