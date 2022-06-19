<?php

namespace App\Http\Controllers;

use Alternative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class AlternativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->search){
            $alternatives = DB::table('alternative')->join('users','users.id','=','alternative.user_id')
            ->select('alternative.id','alternative.name','alternative.NIK','alternative.address','alternative.gender',DB::raw('users.name as penginput'),'alternative.created_at')->where('alternative.name','LIKE','%'.$request->search.'%')->orWhere('alternative.NIK','LIKE','%'.$request->search.'%')->paginate(5)->withQueryString();
        }else{
            $alternatives = DB::table('alternative')->join('users','users.id','=','alternative.user_id')
            ->select('alternative.id','alternative.name','alternative.NIK','alternative.address','alternative.gender',DB::raw('users.name as penginput'),'alternative.created_at')->paginate(5);
        }
        return Inertia::render('Alternative/Index',['alternatives'=>$alternatives]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
