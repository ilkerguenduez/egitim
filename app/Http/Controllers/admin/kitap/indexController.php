<?php

namespace App\Http\Controllers\admin\kitap;

use App\Helper\imageUpload;
use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Models\Kategoriler;
use App\Models\Kitaplar;
use App\Models\YayinEvi;
use App\Models\Yazarlar;
use Illuminate\Http\Request;
use File;

class indexController extends Controller
{
    public function index(){
        $data=Kitaplar::paginate(10);
        return view('admin.kitap.index',['data'=>$data]);
    }

    public function create(){
        $yazar=Yazarlar::all();
        $yayinevi=YayinEvi::all();
        $kategori=Kategoriler::all();
        return view('admin.kitap.create',['yazar'=>$yazar,'yayinevi'=>$yayinevi,'kategori'=>$kategori]);
    }

    public function store(Request $request){
        $all=$request->except('_token');
        $all['selflink']=mHelper::permalink($all['name']);
        $all['image']=imageUpload::singleUpload(rand(1,90000),"kitap",$request->file('image'));

        $insert=Kitaplar::create($all);

        if($insert){
            return redirect()->back()->with('status','Kitap başarı ile eklendi');

        }
        else{
            return redirect()->back()->with('status','Kitap eklenemedi');

        }
    }

    public function edit($id){
        
        $c=Kitaplar::where('id','=',$id)->count();
        if($c!=0){
            $yazar=Yazarlar::all();
            $yayinevi=YayinEvi::all();
            $kategori=Kategoriler::all();
            $data=Kitaplar::where('id','=',$id)->get();
            return view('admin.kitap.edit',['data'=>$data,'yazar'=>$yazar,'yayinevi'=>$yayinevi,'kategori'=>$kategori]);

        }
        else{
            return abort(404);
        }
    }

    public function update(Request $request){
        $id=$request->route('id');
        $c=Kitaplar::where('id','=',$id)->count();
        if($c!=0){
            $data=Kitaplar::where('id','=',$id)->get();
            $all =$request->except('_token');
            $all['selflink']=mHelper::permalink($all['name']);
            $all['image']=imageUpload::singleUploadUpdate(rand(1,90000),"kitap",$request->file('image'),$data,"image");
            $update=Kitaplar::where('id','=',$id)->update($all);
            if($update){
                return redirect()->back()->with('status','başarılı');
            }
            else{
                return redirect()->back()->with('statüs','başarısız');
            }

        }
        else{
            return abort(404);
        }
    }

    public function delete($id){
        $c=Kitaplar::where('id','=',$id)->count();
        if($c!=0){
            $data=Kitaplar::where('id','=',$id)->get();
            File::delete('public/'.$data[0]['image']);
            Kitaplar::where('id','=',$id)->delete();
            return redirect()->back();
        }
        else{
            return redirect('/');
        }
    }
}
