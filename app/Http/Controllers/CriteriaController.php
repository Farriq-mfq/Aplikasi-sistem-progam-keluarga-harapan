<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {    
        if($request->search){
            $criterias = Criteria::select('criteria.id','criteria.name','criteria.attribute','criteria.type','criteria.weight',DB::raw('count(criteria_option.id) as total_option'))
            ->leftJoin('criteria_option','criteria.id','=','criteria_option.criteria_id')
            ->groupBy('criteria.name')->where('criteria.name','LIKE','%'.$request->search.'%')->paginate(5)->withQueryString();
        }else{
            $criterias = Criteria::select('criteria.id','criteria.name','criteria.attribute','criteria.type','criteria.weight',DB::raw('count(criteria_option.id) as total_option'))
            ->leftJoin('criteria_option','criteria.id','=','criteria_option.criteria_id')
            ->groupBy('criteria.name')->paginate(5);
        }
        return Inertia::render('Criteria/Index',['criterias'=>$criterias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Criteria/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'attribute'=>'required',
            'weight'=>'required|numeric',
        ]);

        $save = Criteria::create([
            'name'=>$request->name,
            'attribute'=>$request->attribute,
            'type'=>$request->type,
            'weight'=>$request->weight
        ]);
        if($save){
            return session()->flash('alert',['type'=>'success','message'=>'Berhasil Menambahkan Criteria']);
        }else{
            return session()->flash('alert',['type'=>'danger','message'=>'Gagal Menambahkan Criteria']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Criteria::find($id);
        return Inertia::render('Criteria/Edit',['criteria'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'attribute'=>'required',
            'weight'=>'required|numeric',
        ]);

        $update = Criteria::find($id)->update([
            'name'=>$request->name,
            'attribute'=>$request->attribute,
            'type'=>$request->type,
            'weight'=>$request->weight
        ]);
        if($update){
            return session()->flash('alert',['type'=>'success','message'=>'Berhasil Mengedit Criteria']);
        }else{
            return session()->flash('alert',['type'=>'danger','message'=>'Gagal Mengedit Criteria']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Criteria::where('id',$id)->delete();
    }
}
