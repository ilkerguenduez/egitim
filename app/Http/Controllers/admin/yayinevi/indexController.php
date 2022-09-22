<?php

namespace App\Http\Controllers\admin\yayinevi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper;
use App\Helper\mHelper;
use App\Models\YayinEvi;

class indexController extends Controller
{
    public function index(){
        $data=YayinEvi::paginate(10);
        return view('admin.yayinevi.index',['data'=>$data]);
    }


    public function create(){
        return view('admin.yayinevi.create');
    }


    public function store(Request $request){
        $all=$request->except('_token');
        $all['selflink']=mHelper::permalink($all['name']);

        $insert = YayinEvi::create($all);

        if($insert){
            return redirect()->back()->with('status','Yayın Evi Başarı ile Eklendi');
        }
        else{
            return redirect()->back()->with('status','Yayın Evi Eklenemedi');
        }
    }

    public function edit($id){
        $c=YayinEvi::where('id','=',$id)->count();
        if($c!=0){
        $data=YayinEvi::where('id','=',$id)->first();
        return view('admin.yayinevi.edit',['data'=>$data]);
        }
        else{
            return abort(404);
        }
    }
}
