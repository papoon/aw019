<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\equipas;

class EquipasController extends Controller
{
    //
    public function index(){

    	$equipas = Equipas::all();

    	return view('equipas')->with('equipas',$equipas);
    }

    public function show($id){

    	$equipa =  Equipas::find($id);

    	return view('equipas')->with('equipa',$equipa);
    }
}
