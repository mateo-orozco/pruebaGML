<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    //
    public function index(){
        $users =User::all();
        return $users;
    }

    public function show($id){
        $user = user::find($id);
        return $user;
    }

    public function create(Request $request){
        try{
            $request->validate([
                'name' => 'string|required|max:100|min:5|alpha:ascii',
                'lastname' => 'required|string|max:100|alpha:ascii',
                'CC' => 'required|numeric',
                'country' => 'required|string',
                'email' => 'required|unique:User,email|email:rfc,dns|max:150',
                'address' => 'required|string|max:180',
                'phone' => 'required|numeric|digits:10',
                'category_id' => 'required'
            ]);
        }catch(\throwable $th){
            return response()->json(['error' => $th->getMessage()], 400);
        }
        $user = User::create($request->all());
        return "User created successfully";
    }

    public function update(Request $request){
        try{
            $request->validate([
                'name' => 'string|required|max:100|min:5|alpha:ascii',
                'lastname' => 'required|string|max:100|alpha:ascii',
                'CC' => 'required|numeric',
                'country' => 'required|string',
                'email' => 'required|unique:User,email|email:rfc,dns|max:150',
                'address' => 'required|string|max:180',
                'phone' => 'required|numeric|digits:10',
                'category_id' => 'required'
            ]);
        }catch(\throwable $th){
            return response()->json(['error' => $th->getMessage()], 400);
        }
        $user = User::find($request->id);
        $user->update($request->all());
        return "User updated successfully";
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return "User deleted successfully";
    }
}
