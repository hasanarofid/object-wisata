<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UbahpasswordController extends Controller
{
    public function ubah(){
        // dd(1);
        return view('auth.passwords.reset');
    }

    public function update(Request $request){
        // dd($request);
        $model = User::where('email',$request->email)->first();
        $model->password = Hash::make($request->password);
        $model->save();
        return redirect()->route('login')->with('success', 'Password berhasil diupdate');

    }
}
