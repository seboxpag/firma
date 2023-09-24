<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TimeController extends Controller
{

  public function create()
  {
      return view('users.rcp',[
        'users' => DB::select('select * from users')
      ]);
  }

public function store(Request $req)
{
  DB::table('czas_pracy')->insert([
    'id_pracownika' =>$req -> input('pracownik'),
    'dzien' =>$req -> input('data'),
    'godziny' =>$req -> input('czas'),
    'opis' =>$req -> input('opis'),

  ]);

    return $this->create();
}
}
