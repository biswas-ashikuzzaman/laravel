<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Phone;
class UserController extends Controller
{
    public function index()
    {

        // $users = Phone::find(1);
        // $users = Phone::find(1)->user;
        $users = User::all();
        // return $users;
        return view('user', compact('users'));
    }
}
