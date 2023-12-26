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
}
