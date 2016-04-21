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
		
		$res = $client->request('GET', route('api.v1.noticias.index'));

		//echo $res->getStatusCode();
		// 200
		//echo $res->getHeaderLine('content-type');
		// 'application/json; charset=utf8'
		$responde = json_decode($res->getBody());
		
		//retorna o objecto para  view welcome e chama a view
		return view('welcome')->with('news',$responde->news);
		
    }
}
