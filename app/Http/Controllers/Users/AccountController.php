<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function index()
    {
        /** @var User $user */
        $user = auth()->user();

        return view('users.accounts.index', compact('user'));
    }
}
