<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
      return view('users.index',[
        'users' => DB::select('select users.id, name, surname, email, stanowisko from users, stanowisko where stanowisko.id=users.id_stanowiska')
      ]);
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
;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
      DB::table('users')
      ->where('id',$id)
      ->update([
        'name' =>$req -> input('name'),
        'surname' =>$req -> input('surname'),
        'id_stanowiska' =>$req -> input('stanowisko'),
        'email' =>$req -> input('email'),
      ]) ;  //
      DB::select('update users, stanowisko set rola = poziom_dostepu where id_stanowiska=stanowisko.id');
      return $this -> index();    //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return $this->index();
    }

    public function editview($id)
    {
      $user = DB::table('users')->where('id', $id)->get();
      return view('auth.edit',[
        'users' => DB::select('select * from stanowisko'),'datas' => json_decode($user,true)
      ]);
    }


}
