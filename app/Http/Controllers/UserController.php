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
    
}
