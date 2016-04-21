	@extends('master')

    @section('head')

    @parent
        <link rel="stylesheet" href="{{ URL::asset('assets/style.css') }}"  type="text/css" >
    @stop
    
    
    @section('content')
        <div class="container">
            <div class="content">
                <div class="title">AW019</div>
                <div class="subtitle">Apresenta</div>
            </div>
            <div class="row">
               	<div class="col-xs-6 col-md-4">
                	
                </div>
                <div class="col-xs-6 col-md-4">
                	<div class="row">
                		<h2>{{$news->title}}</h2>
                	</div>
                </div>
            </div>
            <div class="container">
	            <div class="row">
	                <h2>{{$news->artigo}}</h2>
	            </div>
	        </div>
        </div>