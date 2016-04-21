<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use GuzzleHttp;

class NoticiasController extends Controller
{
    //
    //
    //
    public function index(){

    	$client = new GuzzleHttp\Client();
		
		$res = $client->request('GET', route('api.v1.noticias.index'));

		
		$responde = json_decode($res->getBody());
		
		//retorna o objecto para  view welcome e chama a view
		return view('noticias')->with('news',$responde->news);
    }
    
}
