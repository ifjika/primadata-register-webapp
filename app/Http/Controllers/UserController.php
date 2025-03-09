<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function isAdmin()
    {
        return auth()->check() && auth()->user()->role === 'admin';
    }

    public function isUser()
    {
        return auth()->check() && auth()->user()->role === 'user';
    }

    public function assignRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|string',
        ]);

        $user->role = $request->role;
        $user->save();

        return response()->json(['message' => 'Role assigned successfully.']);
    }
}
