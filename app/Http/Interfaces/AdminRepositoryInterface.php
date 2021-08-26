<?php

namespace App\Http\Interfaces;

interface AdminRepositoryInterface
{
    public function login($request);
    public function logoutApi();
}