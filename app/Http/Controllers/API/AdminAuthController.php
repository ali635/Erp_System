<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Interfaces\AdminAuthRepositoryInterface;

class AdminAuthController extends Controller
{
    protected $Admin;
    public function __construct(AdminAuthRepositoryInterface $Admin)
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