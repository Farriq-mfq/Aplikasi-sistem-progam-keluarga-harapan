<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\CriteriaOption;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CriteriaOptionController extends Controller
{
    public function index($id,Request $request)
    {
        if($request->search){
            $options = CriteriaOption::where('criteria_id',$id)->where('name','LIKE','%'.$request->search.'%')->paginate(5)->withQueryString();
        }else{
            $options = CriteriaOption::where('criteria_id',$id)->paginate(5);
        }
        return Inertia::render('Criteria/Option',['options'=>$options,'criteria'=>Criteria::where('id',$id)->first()]);
    }
    public function destroy($optid)
    {
        CriteriaOption::where('id',$optid)->delete();
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'criteria_id'=>'required',
                'name'=>'required',
                'klasifikasi'=>'required',
                'value'=>'required'
            ]
        );

        $save = CriteriaOption::create([
            'criteria_id'=>$request->criteria_id,
            'name'=>$request->name,
            'klasifikasi'=>$request->klasifikasi,
            'value'=>$request->value
        ]);
        if($save){
            return session()->flash('alert',['type'=>'success','message'=>'Berhasil Menambahkan Option']);
        }else{
            return session()->flash('alert',['type'=>'danger','message'=>'Gagal Menambahkan Option']);
        }
    }
}
