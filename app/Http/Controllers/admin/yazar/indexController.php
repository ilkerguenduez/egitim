<?php

namespace App\Http\Controllers\admin\yazar;

use App\Http\Controllers\Controller;
use App\Models\Yazarlar;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){
        $data=Yazarlar::paginate(10);
        return view('admin.yazar.index',['data'=>$data]);
    }


    public function create(){
        return view('admin.yazar.create');
    }


    public function store(Request $request){
        $all=$request->except('_token');
        dd($all);
    }
}
