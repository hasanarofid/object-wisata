<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pantai;
class DashboardController extends Controller
{
    public function index()
    {
        $model = Pantai::limit(4)->get();
        // dd($model);
        return view('dashboard.index',compact('model'));
    }
}
