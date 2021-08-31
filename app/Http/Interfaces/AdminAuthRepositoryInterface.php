<?php

namespace App\Http\Interfaces;

interface AdminAuthRepositoryInterface
{
    public function login($request);
    public function logoutApi();
}