<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getUser(int $id): \Illuminate\Http\JsonResponse
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function updateUser(Request $request, int $id): \Illuminate\Http\JsonResponse
    {
        $user = User::find($id);
        $user->surname = $request->surname;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json($user);
    }

    public function deleteUser(int $id): \Illuminate\Http\JsonResponse
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}
