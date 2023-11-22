<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pantai;
class DashboardController extends Controller
{
    //index
    public function index()
    {
        $model = Pantai::limit(4)->get();
        return view('dashboard.index',compact('model'));
    }
    
    //load more card pantai
    public function loadMore(Request $request)
    {
        $offset = $request->input('offset', 0);
        $limit = 4; // Number of items to load each time

        $data = Pantai::skip($offset)->take($limit)->get();

        return response()->json(['data' => $data]);
    }

    //detail pantai
    public function detail($id){
        $model = Pantai::find($id);
        return view('dashboard.detail',compact('model'));
    }


}
