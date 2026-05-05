<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(15);

        return view('admin.user-list', compact('users'));
    }

    public function showUser(User $user)
    {
        return view('admin.user-profile', compact('user'));
    }
}
