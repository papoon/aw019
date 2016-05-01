    
    @extends('master')

    @section('head')

    @parent
        
    @stop
    
    
    @section('content')
        
    
            
                <div class="slider">
                    <div class="callbacks_wrap">
                        <ul class="rslides" id="slider">
                            @foreach($news as $item)
                            <li>
                                <img src="{{ $item->img_link }}" alt="">
                                <div class="caption">
                                {{ URL::route('equipas.index') }}
                                    <h4>{{ $item->title }}</h4>
                                    <a href="{{ $item->link }}" target="_blank">{{ $item->description }}</a>
                                </div>
                            </li>
                            @endforeach 
                        </ul>
                    </div>
                </div>
                <div class="articles">
                    <header>
                        <h3 class="title-head">All around the world</h3>
                    </header>
                    <div class="article">
                        <div class="article-left">
                            <a href="single.html"><img src="images/article1.jpg"></a>
                        </div>
                        <div class="article-right">
                            <div class="article-title">
                                <p>On Feb 25, 2015 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>104 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-thumbs-up"></span>52</a></p>
                                <a class="title" href="single.html"> The section of the mass media industry that focuses on presenting</a>
                            </div>
                            <div class="article-text">
                                <p>The standard chunk of Lorem Ipsum used since the 1500s. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" exact original.....</p>
                                <a href="single.html"><img src="images/more.png" alt="" /></a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="article">
                        <div class="article-left">
                            <iframe width="100%" src="https://www.youtube.com/embed/mbDg4OG7z4Y" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="article-right">
                            <div class="article-title">
                                <p>On Apr 11, 2015 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>2 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>54 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-thumbs-up"></span>18</a></p>
                                <a class="title" href="single.html">Contrary to popular belief, Lorem Ipsum is not simply random</a>
                            </div>
                            <div class="article-text">
                                <p>It is a long established fact that a reader will be distracted by the readable.....</p>
                                <a href="single.html"><img src="images/more.png" alt="" /></a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="article">
                        <div class="article-left">
                            <a href="single.html"><img src="images/article3.jpg"></a>
                        </div>
                        <div class="article-right">
                            <div class="article-title">
                                <p>On Jun 21, 2015 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>181 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-thumbs-up"></span>89</a></p>
                                <a class="title" href="single.html">There are many variations that focuses on presenting</a>
                            </div>
                            <div class="article-text">
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.....</p>
                                <a href="single.html"><img src="images/more.png" alt="" /></a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="article">
                        <div class="article-left">
                            <a href="single.html"><img src="images/article4.jpg"></a>
                        </div>
                        <div class="article-right">
                            <div class="article-title">
                                <p>On Jan 17, 2015 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>1 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>144 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-thumbs-up"></span>74</a></p>
                                <a class="title" href="single.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a>
                            </div>
                            <div class="article-text">
                                <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born.....</p>
                                <a href="single.html"><img src="images/more.png" alt="" /></a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="article">
                        <div class="article-left">
                            <iframe width="100%" src="https://www.youtube.com/embed/GxXxvJYUpxk" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="article-right">
                            <div class="article-title">
                                <p>On Mar 14, 2015 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>250 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-thumbs-up"></span>68</a></p>
                                <a class="title" href="single.html">On the other hand, we denounce with righteous indignation</a>
                            </div>
                            <div class="article-text">
                                <p>It is a long established fact that a reader will be distracted by the readable.....</p>
                                <a href="single.html"><img src="images/more.png" alt="" /></a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
         
        <div class="life-style">
                    <header>
                        <h3 class="title-head">Life Style</h3>
                    </header>
                    <div class="life-style-grids">
                        <div class="life-style-left-grid">
                            <a href="single.html"><img src="images/l1.jpg" alt="" /></a>
                            <a class="title" href="single.html">It is a long established fact that a reader will be distracted.</a>
                        </div>
                        <div class="life-style-right-grid">
                            <a href="single.html"><img src="images/l2.jpg" alt="" /></a>
                            <a class="title" href="single.html">There are many variations of passages of Lorem Ipsum available.</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="life-style-grids">
                        <div class="life-style-left-grid">
                            <a href="single.html"><img src="images/l3.jpg" alt="" /></a>
                            <a class="title" href="single.html">Contrary to popular belief, Lorem Ipsum is not simply random text.</a>
                        </div>
                        <div class="life-style-right-grid">
                            <a href="single.html"><img src="images/l4.jpg" alt="" /></a>
                            <a class="title" href="single.html">Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="sports-top">
                            <div class="s-grid-left">
                                <div class="cricket">
                                    <header>
                                        <h3 class="title-head">Business</h3>
                                    </header>
                                    <div class="c-sports-main">
                                            <div class="c-image">
                                                <a href="single.html"><img src="images/bus1.jpg" alt="" /></a>
                                            </div>
                                            <div class="c-text">
                                                <h6>Lorem Ipsum</h6>
                                                <a class="power" href="single.html">It is a long established fact that a reader</a>
                                                <p class="date">On Feb 25, 2015</p>
                                                <a class="reu" href="single.html"><img src="images/more.png" alt="" /></a>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="s-grid-small">
                                            <div class="sc-image">
                                                <a href="single.html"><img src="images/bus2.jpg" alt="" /></a>
                                            </div>
                                        <div class="sc-text">
                                            <h6>Lorem Ipsum</h6>
                                            <a class="power" href="single.html">It is a long established fact that a reader</a>
                                            <p class="date">On Mar 21, 2015</p>
                                            <a class="reu" href="single.html"><img src="images/more.png" alt="" /></a>
                                                <div class="clearfix"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                        </div>
                                        <div class="s-grid-small">
                                            <div class="sc-image">
                                                <a href="single.html"><img src="images/bus3.jpg" alt="" /></a>
                                            </div>
                                        <div class="sc-text">
                                            <h6>Lorem Ipsum</h6>
                                            <a class="power" href="single.html">It is a long established fact that a reader</a>
                                            <p class="date">On Jan 25, 2015</p>
                                            <a class="reu" href="single.html"><img src="images/more.png" alt="" /></a>
                                                <div class="clearfix"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                        </div>
                                        <div class="s-grid-small">
                                            <div class="sc-image">
                                                <a href="single.html"><img src="images/bus4.jpg" alt="" /></a>
                                            </div>
                                        <div class="sc-text">
                                            <h6>Lorem Ipsum</h6>
                                            <a class="power" href="single.html">It is a long established fact that a reader</a>
                                            <p class="date">On Jul 19, 2015</p>
                                            <a class="reu" href="single.html"><img src="images/more.png" alt="" /></a>
                                                <div class="clearfix"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            <div class="s-grid-right">
                                <div class="cricket">
                                    <header>
                                        <h3 class="title-popular">Technology</h3>
                                    </header>
                                    <div class="c-sports-main">
                                            <div class="c-image">
                                                <a href="single.html"><img src="images/tec1.jpg" alt="" /></a>
                                            </div>
                                            <div class="c-text">
                                                <h6>Lorem Ipsum</h6>
                                                <a class="power" href="single.html">It is a long established fact that a reader</a>
                                                <p class="date">On Apr 22, 2015</p>
                                                <a class="reu" href="single.html"><img src="images/more.png" alt="" /></a>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="s-grid-small">
                                            <div class="sc-image">
                                                <a href="single.html"><img src="images/tec2.jpg" alt="" /></a>
                                            </div>
                                        <div class="sc-text">
                                            <h6>Lorem Ipsum</h6>
                                            <a class="power" href="single.html">It is a long established fact that a reader</a>
                                            <p class="date">On Jan 19, 2015</p>
                                            <a class="reu" href="single.html"><img src="images/more.png" alt="" /></a>
                                                <div class="clearfix"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                        </div>
                                        <div class="s-grid-small">
                                            <div class="sc-image">
                                                <a href="single.html"><img src="images/tec3.jpg" alt="" /></a>
                                            </div>
                                        <div class="sc-text">
                                            <h6>Lorem Ipsum</h6>
                                            <a class="power" href="single.html">It is a long established fact that a reader</a>
                                            <p class="date">On Jun 25, 2015</p>
                                            <a class="reu" href="single.html"><img src="images/more.png" alt="" /></a>
                                                <div class="clearfix"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                        </div>
                                        <div class="s-grid-small">
                                            <div class="sc-image">
                                                <a href="single.html"><img src="images/tec4.jpg" alt="" /></a>
                                            </div>
                                        <div class="sc-text">
                                            <h6>Lorem Ipsum</h6>
                                            <a class="power" href="single.html">It is a long established fact that a reader</a>
                                            <p class="date">On Jul 19, 2015</p>
                                            <a class="reu" href="single.html"><img src="images/more.png" alt="" /></a>
                                                <div class="clearfix"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>



                            <div class="photos">
                    <header>
                        <h3 class="title-head">Photos</h3>
                    </header>
                     <div class="course_demo1">
                                  <ul id="flexiselDemo">    
                                     <li>
                                        <a href="single.html"><img src="{{ URL::asset('assets/images/eg4.jpg') }}" alt="" /></a>                           
                                     </li>
                                     <li>
                                        <a href="single.html"><img src="{{ URL::asset('assets/images/eg3.jpg') }}" alt="" /></a>
                                      </li> 
                                     <li>
                                        <a href="single.html"><img src="{{ URL::asset('assets/images/eg2.jpg') }}" alt="" /></a>
                                     </li>  
                                     <li>
                                        <a href="single.html"><img src="{{ URL::asset('assets/images/eg1.jpg') }}" alt="" /></a>
                                     </li>  
                                 </ul>
                             </div>
                             <link rel="stylesheet" href="{{ URL::asset('assets/css/flexslider.css') }}" type="text/css" media="screen" />
                                <script type="text/javascript">
                             $(window).load(function() {
                                $("#flexiselDemo").flexisel({
                                    visibleItems: 4,
                                    animationSpeed: 1000,
                                    autoPlay: true,
                                    autoPlaySpeed: 3000,            
                                    pauseOnHover: true,
                                    enableResponsiveBreakpoints: true,
                                    responsiveBreakpoints: { 
                                        portrait: { 
                                            changePoint:480,
                                            visibleItems: 2
                                        }, 
                                        landscape: { 
                                            changePoint:640,
                                            visibleItems: 2
                                        },
                                        tablet: { 
                                            changePoint:768,
                                            visibleItems: 3
                                        }
                                    }
                                });
                                
                             });
                              </script>
                             <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.flexisel.js') }}"></script>
                    </div>

                </div>

                        
                          

       
      
        

        <script type="text/javascript">

             $(document).ready(function() { 

                //loadLastNews();
            });

            function loadLastNews(){
                // passar a url para uma var js
                newsApiUrl = "{{ URL::route('api.v1.noticias.index') }}";

                $.ajax({
                    method:'GET',
                    url:newsApiUrl,
                    dataType:'json',
                    success:function(data) {
                        
                        for (var i = 0; i <= data.news.length-1; i++) {
                            
                            var news =data.news[i];
                            $("#lastNews").append("<ul class='list-group'>");
                            $("#lastNews").append("<li class='list-group-item'>"+news.title+"</li>");
                            $("#lastNews").append("<li class='list-group-item'>"+news.description+"</li>");
                            $("#lastNews").append("<li class='list-group-item'>"+news.source+"</li>");
                            $("#lastNews").append("<li class='list-group-item'>"+news.link+"</li>");
                            $("#lastNews").append("<li class='list-group-item'>"+news.date_pub+"</li>");
                            $("#lastNews").append("</ul>");

                            /*
                            $(".lastNews").append("
                                <ul class='list-group'>
                                    <li class='list-group-item'>"+news.title+"</li>
                                    <li class='list-group-item'>"+news.description+"</li>
                                    <li class='list-group-item'>"+news.source+"</li>
                                    <li class='list-group-item'>"+news.link+"</li>
                                    <li class='list-group-item'>"+news.date_pub+"</li>
                                </ul>"
                            );*/
                        };
                        
                    },
                    error:function( jqXHR, textStatus, errorThrown){
                        alert('Erro ajax get last news');
                    }
                });
            }

        </script>
        

    @stop
    

