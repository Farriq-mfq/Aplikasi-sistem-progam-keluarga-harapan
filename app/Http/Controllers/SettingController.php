<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SettingController extends Controller
{
    public function index()
    {
        return Inertia::render('Setting/index',['nilai'=>Nilai::first()]);
    }
    public function change(Request $request)
    {
        $request->  validate([
            'setting'=>"required|numeric",
            'tanggal_keluar'=>'required'
        ]);
        
        if(Nilai::count() > 0){
            $id = Nilai::first()->id;
            Nilai::where('id',$id)->update([
                'nilai_minim'=>$request->setting,
                'tanggal_keluar'=>$request->tanggal_keluar
            ]);
        }else{
            Nilai::create([
                'nilai_minim'=>$request->setting,
                'tanggal_keluar'=>$request->tanggal_keluar
            ]);
        }
    }
}
