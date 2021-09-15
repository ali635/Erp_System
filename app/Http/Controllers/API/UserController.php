<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Interfaces\UserInterface;

class UserController extends Controller
{
    protected $userinterface ;

    public function __construct(UserInterface $userinterface)
    {
        $this->userinterface = $userinterface;
    }

    public function index()
    {
        return $this->userinterface->getAllUsers();
    }

    public function store(Request $request, $id = null)
    {
        return $this->userinterface->createOrUpdateUser($request ,$id);
    }

    public function show($id)
    {
        return $this->userinterface->getUserByID($id);
    }

    public function update(Request $request, $id)
    {
        return $this->userinterface->createOrUpdateUser($request,$id);
    }


    public function destroy($id)
    {
        return $this->userinterface->deleteUser($id);
    }
}
