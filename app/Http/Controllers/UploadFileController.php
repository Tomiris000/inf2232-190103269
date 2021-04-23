<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadFileController extends Controller
{
    public function index(Request $request){
        // return $request->file('file')->store('docs');
        return view('project');
    }
}
