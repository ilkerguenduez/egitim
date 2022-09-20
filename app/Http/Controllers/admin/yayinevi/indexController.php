<?php

namespace App\Http\Controllers\admin\yayinevi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){
        return view('admin.yayinevi.index');
    }


    public function create(){
        return view('admin.yayinevi.create');
    }


    public function store(Request $request){
        $all=$request->except('_token');
        dd($all);
    }
}
