<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\estadios;

class EstadiosController extends Controller
{
    //
    public function index(){

    	$estadios = Estadios::All();

    	return view('estadios')->with('estadios',$estadios);
    }
    public function show($id){

    	$estadio = Estadios::find($id);

    	return view('estadios')->with('estadio',$estadio);
    }
}
