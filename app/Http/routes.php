<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {

    
    Route::get('/',  ['uses' => 'WelcomeController@index', 'as' => 'index']);
    Route::get('noticias/',['uses' => 'NoticiasController@index', 'as' => 'noticias.index']);
    Route::get('estadios/',['uses' => 'EstadiosController@index', 'as' => 'estadios.index']);
    Route::get('jogos/',['uses' => 'JogosController@index', 'as' => 'jogos.index']);
    Route::get('cidades/',['uses' => 'CidadesController@index', 'as' => 'cidades.index']);
    Route::get('equipas/',['uses' => 'EquipasController@index', 'as' => 'equipas.index']);
    Route::get('estatisticas/',['uses' => 'EstatisticasController@index', 'as' => 'estatisticas.index']);
    Route::get('historia/',['uses' => 'historiaController@index', 'as' => 'historia.index']);


    Route::group(array('prefix' => 'admin'), function()
    {
        Route::get('/',['uses' => 'AdminController@index', 'as' => 'admin.index']);
        Route::post('feeds',['uses' => 'ApiFeeds@store','as' => 'feeds.post']);
        Route::delete('feeds',['uses' => 'ApiFeeds@destroy','as' => 'feeds.delete']);
    });

    //Route::get('admin',['uses' => 'AdminController@index', 'as' => 'admin.index']);

    #
    # Colocar dentro deste Grupo todos os webservices criados por nos
    #

    // Grupo com o prefixo da API e versão, só url com este prefixo entram no grupo
    // ex: http://aw019.com/api/v1/equipas
	Route::group(array('prefix' => 'api/v1'), function()
	{
	  	//Route::resource('news', 'LastNewsController',['only' => ['index']]);

        //vai usar a url http://aw019.com/api/v1/equipas
        //vai usar a url http://aw019.com/api/v1/equipas/1
        Route::resource('equipas', 'ApiEquipasController',['only' => ['index','show']]);

        Route::resource('equipas.jogadores', 'ApiEquipasJogadoresController',['only' => ['index','show']]);

        //vai usar a url http://aw019.com/api/v1/cidades
        //vai usar a url http://aw019.com/api/v1/cidades/1  
        Route::resource('cidades', 'ApiCidadesController',['only' => ['index','show']]);

        //vai usar a url http://aw019.com/api/v1/cidades/1/alojamentos
        //vai usar a url http://aw019.com/api/v1/cidades/1/alojamentos/1
        Route::resource('cidades.alojamentos', 'ApiCidadesAlojamentosController',['only' => ['index','show']]);

        //vai usar a url http://aw019.com/api/v1/cidades/1/restaurantes
        //vai usar a url http://aw019.com/api/v1/cidades/1/restaurantes/1
        Route::resource('cidades.restaurantes', 'ApiCidadesRestaurantesController',['only' => ['index','show']]);

        //vai usar a url http://aw019.com/api/v1/estadios
        //vai usar a url http://aw019.com/api/v1/estadios/1
        Route::resource('estadios', 'ApiEstadiosController',['only' => ['index','show']]);

        //vai usar a url http://aw019.com/api/v1/grupos
        Route::resource('grupos', 'ApiGruposController',['only' => ['index']]);

        //vai usar a url http://aw019.com/api/v1/jogos
        Route::resource('jogos', 'ApiJogosController',['only' => ['index']]);

        //vai usar a url http://aw019.com/api/v1/resultados
        Route::resource('resultados', 'ApiResultadosController',['only' => ['index']]);

        //vai usar a url http://aw019.com/api/v1/noticias
        Route::resource('noticias', 'ApiNoticiasController',['only' => ['index']]);



	});

});
