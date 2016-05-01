@extends('master')

@section('head')

@parent
        
@stop
    
    
@section('content')
	
	<header>
		<h3 class="title-head">Equipas</h3>
	</header>
	@foreach($equipas as $item)
		<div class="fashion">
			<div class="fashion-top">
				<div class="fashion-left">
					<a href="single.html"><img src="images/f1.jpg" class="img-responsive" alt=""></a>
					<div class="blog-poast-info">
						<p class="fdate"><span class="glyphicon glyphicon-time"></span>On Jun 20, 2015 <a class="span_link1" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link1" href="#"><span class="glyphicon glyphicon-thumbs-up"></span>52</a></p>
				    </div>
					<h3><a href="single.html">Contrary to popular belief</a></h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					<a class="reu" href="single.html"><img src="images/more.png" alt="" /></a>
				</div>
				<div class="fashion-right">
					<a href="single.html"><img src="images/f2.jpg" class="img-responsive" alt=""></a>
					<div class="blog-poast-info">
						<p class="fdate"><span class="glyphicon glyphicon-time"></span>On Apr 18, 2015 <a class="span_link1" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link1" href="#"><span class="glyphicon glyphicon-thumbs-up"></span>52</a></p>
				    </div>
					<h3><a href="single.html">Lorem Ipsum is simply</a></h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					<a class="reu" href="single.html"><img src="images/more.png" alt="" /></a>
				</div>
		<div class="clearfix"></div>
		</div>
	</div>
	@endforeach 


@stop