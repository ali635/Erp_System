<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Interfaces\AdminRepositoryInterface;

class AdminController extends Controller
{
    protected $Admin;
    public function __construct(AdminRepositoryInterface $Admin)
    {
        $this->Admin = $Admin;
    }

    public function index(Request $request)
    {
        return $this->Admin->login($request);
    }
    
    public function logout()
    {
        return $this->Admin->logoutApi();
    }
}