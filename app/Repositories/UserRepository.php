<?php 

namespace App\Repositories;
use Auth;

class UserRepository{

    public function getDataUserLogin($guard)
    {
        return Auth::guard($guard)->user();
    }
    public function updateProfile($data, $guard)
    {
        $user = Auth::guard($guard)->user();
        $user->update($data);
        return $user;
    }
}