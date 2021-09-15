<?php
namespace App\Http\Repository;

use App\Http\Interfaces\UserInterface;
use App\Http\Resources\User as UserResource;
use App\Models\User;
use App\Traits\ResponseAPI;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserInterface
{
    use ResponseAPI ;

    public function getAllUsers()
    {
        $users = DB::table('users')->get();
        if ($users) {
            return $this->sendResponse(UserResource::collection($users), 'All users have been sent successfully');
         }
    }

    public function getUserByID($id)
    {
        $user = User::find($id);
        if($user){
            return $this->sendResponse(new UserResource($user), 'user found successfully');
        }else{
            return $this->sendError('user not found');
        }
    }

    public function createOrUpdateUser($data = [], $id = null)
    {
        if(is_null($id)){
            $user = new User();
            $user->name   = $data['name'];
            $user->mobile = $data['mobile'];
            $user->email  = $data['email'];
            $user->city   = $data['city'];
            $user->address1 = $data['address1'];
            $user->address2 = $data['address2'];
            $user->save();
            return $this->sendResponse(new UserResource($user),'user added successfully');
        }else{
            $user = User::find($id);
            if($user){
                $user->name   = $data['name'];
                $user->mobile = $data['mobile'];
                $user->email  = $data['email'];
                $user->city   = $data['city'];
                $user->address1 = $data['address1'];
                $user->address2 = $data['address2'];
                $user->save();
                return $this->sendResponse(new UserResource($user),'user updated successfully');
            }else{
                return $this->sendError('user not found');
            }
        }
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        if($user){
            $user->delete();
            return $this->sendResponse(new UserResource($user),'user deleted successfully ');
        }else{
            return $this->sendError('user not found');
        }
    }


}
