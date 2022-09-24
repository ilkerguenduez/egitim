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
        $data=YayinEvi::where('id','=',$id)->get();
        return view('admin.yayinevi.edit',['data'=>$data]);
        }
        else{
            return abort(404);
        }
    }

    public function update(Request $request){
        $id=$request->route('id');
        $c=YayinEvi::where('id','=',$id)->count();
        if($c!=0){
            $all=$request->except('_token');
            $all['selflink']=mHelper::permalink($all['name']);
            $update=YayinEvi::where('id','=',$id)->update($all);
            if($update){
                return redirect()->back()->with('status','Yayın evi düzenlendi.');

            }
            else{
                return redirect()->back()->with('status','Yayın evi düzenlenemedi.');
            }
        }
        else{
            return abort(404);
        }
    }

    public function delete($id){
        $c=YayinEvi::where('id','=',$id)->count();
        if($c!=0){
            $delete=YayinEvi::where('id','=',$id)->delete();
            return redirect()->back();
        }
        else{
            return abort(404);
        }
    }
}
