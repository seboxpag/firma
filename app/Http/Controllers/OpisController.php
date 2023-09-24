<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OpisController extends Controller
{
    public function create()
      {
          return view('users.rcpopis',[
            'users' => DB::select('select * from users')
          ]);
      }

    public function store(Request $req)
    {
      DB::table('czas_pracy')
      ->where('id_pracownika',$req -> input('pracownik'))
      ->where('dzien',$req -> input('data'))
      ->update([

        'opis' =>$req -> input('opis'),

      ]) ;

    return $this->create();
    }
}
