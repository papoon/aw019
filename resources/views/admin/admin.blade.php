@extends('admin.master')

    @section('head')

    @parent
     
    @stop
    
    
    @section('content')
        
            <div class="content">
                <div class="title">AW019 - Admin Area</div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="feeds" style="display:none;">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Feeds</h3>
                            </div>
                            <ul id="feedsUrlList" class="list-group">
                                     @foreach($feeds as $feed)
                                    <li class="list-group-item clearfix">
                                       
                                         <span class="glyphicon glyphicon-file"></span>
                                            {{$feed->url_feed}}
                                            <span class="pull-right">
                                              <button class="btn btn-xs btn-danger">
                                                <span class="glyphicon glyphicon-trash" onclick="apiDeleteAjax({{$feed->id}});"></span>
                                              </button>
                                            </span>
                                        
                                    </li>
                                    @endforeach 
                            </ul>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="input-group">
                              <span class="input-group-btn">
                                <button class="btn btn-default" type="button" onclick="apiPostAjax();">Adicionar</button>
                              </span>
                              <input type="text" name="feedUrl" class="form-control"  placeholder="url feed">
                              <input type="text" name="feedFonte" class="form-control" placeholder="fonte feed">
                            </div><!-- /input-group -->
                          </div><!-- /.col-lg-6 -->
                          
                        </div><!-- /.row -->
                    </div>
                </div>
            </div>
        

        <script type="text/javascript">

        $(document).ready(function() {
            $('.title').fadeOut(3000, function() {
                $('.feeds').fadeIn(3000);
            });
        });

        function apiPostAjax(){
                // passar a url para uma var js
                feedsApiUrl = "{{ URL::route('feeds.post') }}";

                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                });

                $.ajax({
                    method:'POST',
                    url:feedsApiUrl,
                    dataType:'json',
                    data:{'url':$('input[name=feedUrl]').val(), 'fonte': $('input[name=feedFonte]').val()},
                    success:function(data) {
                        alert("Sucesso");
                        $('input[name=feedUrl]').val('');
                        $('input[name=feedFonte]').val('');
                        $("#feedsUrlList").load("#feedsUrlList", data);

                    },
                    error:function( jqXHR, textStatus, errorThrown){
                        alert(errorThrown);
                    }
                });
        };
        function apiDeleteAjax(id){
                // passar a url para uma var js
                feedsApiUrl = "{{ URL::route('feeds.delete') }}";
                alert(id);
                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                });

                $.ajax({
                    method:'DELETE',
                    url:feedsApiUrl,
                    dataType:'json',
                    data:{'id':id},
                    success:function(data) {
                        alert("Sucesso");
                    },
                    error:function( jqXHR, textStatus, errorThrown){
                        alert(errorThrown);
                    }
                });
        };
        </script>
    @stop

    