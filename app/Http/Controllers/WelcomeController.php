<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LastNews;
use App\Http\Requests;
use GuzzleHttp;

class WelcomeController extends Controller
{
    /**
     * [index description]
     * @return [type] [description]
     */
    public function index(){

		//$news = LastNews::all();
		$client = new GuzzleHttp\Client();
		
		$resNoticias = $client->request('GET', route('api.v1.noticias.index'));

		//echo $res->getStatusCode();
		// 200
		//echo $res->getHeaderLine('content-type');
		// 'application/json; charset=utf8'
		$respondeNoticias = json_decode($resNoticias->getBody());

		$resEstadios = $client->request('GET', route('api.v1.estadios.index'));
		/*
		//echo $res->getStatusCode();
		// 200
		//echo $res->getHeaderLine('content-type');
		// 'application/json; charset=utf8'
		$respondeEstadios = json_decode($resEstadios->getBody());
		$estadios = $respondeEstadios->estadios;

		$estadiosNome = array();

		foreach ($estadios as $key => $item) {
			$estadiosNome[] = $item->estadio;
		}
		*/
		$news = $respondeNoticias->news;
		//retorna o objecto para  view welcome e chama a view
		return view('welcome')->with(compact('news'));
		
    }
}
