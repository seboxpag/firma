<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonthController extends Controller
{
  protected $timeWord=[];
  public function create()
    {
        return view('users.Timeform',[
          'users' => DB::select('select * from users'), 'timeWord'=>$this->timeWord
        ]);
    }
    public function showhour()
      {
          return 0;
      }

  public function store(Request $req)
  {
    $month=DB::table('czas_pracy')
    ->select(DB::raw('sum(godziny) as suma'))
    ->where('id_pracownika',$req -> input('pracownik'))
    ->whereMonth('dzien',$req -> input('miesiac'))
    ->whereYear('dzien',$req -> input('rok'))
    ->get();

    $this->timeWord=json_decode($month,true,512,JSON_THROW_ON_ERROR);
    return $this->create();
  }
}
