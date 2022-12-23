<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //create
    public function userCreate(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required |string',
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }

        User::create([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return 'creado exitosamente el usuario ' . $request->email;
    }

    // list
    public function userList()
    {
        return User::get();
    }

    // update
    public function userUpdate($id, Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required |string',
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }

        User::find($id)->update([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return 'actualizado exitosamente el usuario ' . $id;
    }

     //delete
     public function userDelete($id)
     {
         User::find($id)->delete();
         return 'eliminado exitosamente  el usuario ' . $id;
     }
}
