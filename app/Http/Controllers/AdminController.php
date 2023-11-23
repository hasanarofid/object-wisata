<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //index
    public function index(){
        $model = User::get();
        return view('admin.index',compact('model'));
    }
}
