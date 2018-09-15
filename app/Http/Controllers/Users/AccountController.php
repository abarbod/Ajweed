<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;

class AccountController extends Controller
{
    public function index()
    {
        /** @var User $user */
        $user = auth()->user();

        return view('users.accounts.index', compact('user'));
    }
}
