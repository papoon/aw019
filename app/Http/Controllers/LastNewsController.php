<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LastNews;
use App\Http\Requests;

class LastNewsController extends Controller
{
    //é chamado este metodo para listar todas as noticias
    public function index($id)
	{
		$news = LastNews::find($id);


		return view('noticias/noticias')->with('news',$news);
	}
}
