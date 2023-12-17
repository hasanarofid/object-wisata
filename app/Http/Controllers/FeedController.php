<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index()
    {
        $model = Feedback::get();
        return view('admin.feedback.index',compact('model'));
    }
}
