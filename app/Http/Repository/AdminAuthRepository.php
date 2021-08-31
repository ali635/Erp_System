<?php

namespace App\Http\Repository;

use App\Http\Interfaces\AdminAuthRepositoryInterface;
use App\Models\Admin;
use App\Traits\ResponseAPI;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminAuthRepository implements AdminAuthRepositoryInterface
{
    use ResponseAPI;
    public function login($request)
    {
        
        $admin = Admin::where('email', $request->input("email"))
        ->first();
        

        if($admin && Hash::check($request->input('password'), $admin->password))
        {
            // $admin = Auth::user();
            $success['token'] = $admin->createToken('mohamed')->accessToken;
            $success['name'] = $admin->name;
            return $this->sendResponse($success ,'Admin login successfully' );
        }
        else{
            return $this->sendError('Please check your Auth' ,['error'=> 'Unauthorised'] );
        }
    }

    public function logoutApi()
    { 
        if (Auth::check()) 
        {
            $user = Auth::user()->token();
            $user->revoke();
            return $this->sendResponse($user ,'Admin logout successfully' );
        }
    }
}