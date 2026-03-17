<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function show(User $user)
    {
        return response()->json($user);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role'=>'required',
            'phone'=>'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'role'=>'required',
            'phone'=>'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'sometimes|required|min:8',
        ]);
        $user->update($request->all());
        return response()->json($user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }
    
}
