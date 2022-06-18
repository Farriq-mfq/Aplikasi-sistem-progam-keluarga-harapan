<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->search){
            $users = User::where('name','LIKE','%'.$request->search.'%')->paginate(5)->withQueryString();
        }else{
            $users = User::paginate(5);
        }
        return Inertia::render('Users/Index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Users/Create');
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
            'username'=>'required',
            'password'=>'required',
        ]);

        $saveuser = User::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'password'=>Hash::make($request->password)
        ]);
        if($saveuser){
            return session()->flash('alert',['type'=>'success','message'=>'Berhasil Menambahkan Users']);
        }else{
            return session()->flash('alert',['type'=>'danger','message'=>'Gagal Menambahkan Users']);
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
        $user = User::find($id);
        return Inertia::render('Users/Edit',['user'=>$user]);
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
            'username'=>'required',
        ]);
        if($request->password){
            $update = User::find($id)->update([
                'name'=>$request->name,
                'username'=>$request->username,
                'password'=>Hash::make($request->password)
            ]);
        }else if($request->email){
            $update = User::find($id)->update([
                'name'=>$request->name,
                'username'=>$request->username,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]);
        }else{
            $update = User::find($id)->update([
                'name'=>$request->name,
                'username'=>$request->username,
            ]);
        }
        if($update){
            return session()->flash('alert',['type'=>'success','message'=>'Berhasil Mengupdate Users']);
        }else{
            return session()->flash('alert',['type'=>'danger','message'=>'Gagal Mengupdate Users']);
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
        User::find($id)->delete();
    }
}
