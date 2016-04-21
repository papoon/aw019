@extends('master')

@section('head')

@parent
        
@stop
    
    
@section('content')
	
	<header>
		<h3 class="title-head">Noticías</h3>
	</header>
	@foreach($news as $item)
		<div class="article">
			<div class="article-left">
				<a href="{{ $item->link }}" target="_blank"><img src="{{ $item->img_link }}"></a>
			</div>
			<div class="article-right">
				<div class="article-title">
					<p>On Feb 25, 2015 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>104 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-thumbs-up"></span>52</a></p>
						<a class="title" href="{{ $item->link }}" target="_blank"> {{ $item->title }}</a>
				</div>
				<div class="article-text">
					<p>{{ $item->description }}</p>
					<a href="{{ $item->link }}" target="_blank"><img src="{{ URL::asset('assets/images/more.png') }}" alt="" /></a>
					<div class="clearfix"></div>
				</div>
			</div>
		<div class="clearfix"></div>
		</div>
	@endforeach 


@stop