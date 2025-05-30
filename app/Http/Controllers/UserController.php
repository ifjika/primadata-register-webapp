<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function assignRole(Request $request, User $user)
    {
        if (!optional(auth()->user())->isAdmin()) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'role' => 'required|string|in:admin,leader,user',
        ]);

        $user->role = $request->role;
        $user->save();

        return response()->json(['message' => 'Role assigned successfully.']);
    }
}
