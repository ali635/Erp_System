<?php
namespace App\Http\Interfaces;

interface UserInterface{

    public function getAllUsers();

    public function getUserByID($id);

    public function createOrUpdateUser($data = [], $id = null);

    public function deleteUser($id);

}
