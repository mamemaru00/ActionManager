<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository
{
    public function getAuthUser()
    {
        return Auth::user();
    }

    public function getAuthUserId()
    {
        return Auth::user()->id;
    }

    public function getUserAllData()
    {
        return User::all();
    }

    public function getUserName($id)
    {
        return User::find($id)->name;
    }
}
