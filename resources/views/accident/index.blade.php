@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Accident Lists
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css starts-->

    {{-- without bootstrap mini .css modal will not work so we take out all the moda from mini css and plot it on script --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> --}} 
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/tabbular.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/blog.css') }}">
    
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" /> --}}
    
    <!--end of page level css-->
    
    <style>
        div.polaroid {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        #rcorners {
            border-radius: 15px;
            /* border: 2px solid; */
            /* border: 2px solid #73AD21; */
            /* padding: 20px; 
            width: 200px;
            height: 150px;   */
        }
        #myList li{
            background: #F0F0EC;
        }
    </style>

    <!-- Modal Delete CSS -->
    <style>
        .modal-open {
        overflow: hidden
        }

        .modal-open .modal {
            overflow-x: hidden;
            overflow-y: auto
        }

        .modal {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1050;
            display: none;
            width: 100%;
            height: 100%;
            overflow: hidden;
            outline: 0
        }

        .modal-dialog {
            position: relative;
            width: auto;
            margin: .5rem;
            pointer-events: none
        }

        .modal.fade .modal-dialog {
            transition: -webkit-transform .3s ease-out;
            transition: transform .3s ease-out;
            transition: transform .3s ease-out, -webkit-transform .3s ease-out;
            -webkit-transform: translate(0, -50px);
            transform: translate(0, -50px)
        }

        @media (prefers-reduced-motion:reduce) {
            .modal.fade .modal-dialog {
                transition: none
            }
        }

        .modal.show .modal-dialog {
            -webkit-transform: none;
            transform: none
        }

        .modal-dialog-scrollable {
            display: -ms-flexbox;
            display: flex;
            max-height: calc(100% - 1rem)
        }

        .modal-dialog-scrollable .modal-content {
            max-height: calc(100vh - 1rem);
            overflow: hidden
        }

        .modal-dialog-scrollable .modal-footer, .modal-dialog-scrollable .modal-header {
            -ms-flex-negative: 0;
            flex-shrink: 0
        }

        .modal-dialog-scrollable .modal-body {
            overflow-y: auto
        }

        .modal-dialog-centered {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            min-height: calc(100% - 1rem)
        }

        .modal-dialog-centered::before {
            display: block;
            height: calc(100vh - 1rem);
            content: ""
        }

        .modal-dialog-centered.modal-dialog-scrollable {
            -ms-flex-direction: column;
            flex-direction: column;
            -ms-flex-pack: center;
            justify-content: center;
            height: 100%
        }

        .modal-dialog-centered.modal-dialog-scrollable .modal-content {
            max-height: none
        }

        .modal-dialog-centered.modal-dialog-scrollable::before {
            content: none
        }

        .modal-content {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            width: 100%;
            pointer-events: auto;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, .2);
            border-radius: .3rem;
            outline: 0
        }

        .modal-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1040;
            width: 100vw;
            height: 100vh;
            background-color: #000
        }

        .modal-backdrop.fade {
            opacity: 0
        }

        .modal-backdrop.show {
            opacity: .5
        }

        .modal-header {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: start;
            align-items: flex-start;
            -ms-flex-pack: justify;
            justify-content: space-between;
            padding: 1rem 1rem;
            border-bottom: 1px solid #dee2e6;
            border-top-left-radius: .3rem;
            border-top-right-radius: .3rem
        }

        .modal-header .close {
            padding: 1rem 1rem;
            margin: -1rem -1rem -1rem auto
        }

        .modal-title {
            margin-bottom: 0;
            line-height: 1.5
        }

        .modal-body {
            position: relative;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1rem
        }

        .modal-footer {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-pack: end;
            justify-content: flex-end;
            padding: 1rem;
            border-top: 1px solid #dee2e6;
            border-bottom-right-radius: .3rem;
            border-bottom-left-radius: .3rem
        }

        .modal-footer>:not(:first-child) {
            margin-left: .25rem
        }

        .modal-footer>:not(:last-child) {
            margin-right: .25rem
        }

        .modal-scrollbar-measure {
            position: absolute;
            top: -9999px;
            width: 50px;
            height: 50px;
            overflow: scroll
        }

        @media (min-width:576px) {
            .modal-dialog {
                max-width: 500px;
                margin: 1.75rem auto
            }
            .modal-dialog-scrollable {
                max-height: calc(100% - 3.5rem)
            }
            .modal-dialog-scrollable .modal-content {
                max-height: calc(100vh - 3.5rem)
            }
            .modal-dialog-centered {
                min-height: calc(100% - 3.5rem)
            }
            .modal-dialog-centered::before {
                height: calc(100vh - 3.5rem)
            }
            .modal-sm {
                max-width: 300px
            }
        }

        @media (min-width:992px) {
            .modal-lg, .modal-xl {
                max-width: 800px
            }
        }

        @media (min-width:1200px) {
            .modal-xl {
                max-width: 1140px
            }
        }

    </style>
@stop

{{-- breadcrumb --}}
@section('top')
    <div style="background-color: ##68d8bb" class="breadcum">
        <div  class="container">
            <ol class="breadcrumb right_float">
            <li>
                <a href="{{ route('home') }}"> 
                <i class="livicon icon3 icon4" data-name="home" data-size="18" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d">
                </i>Dashboard
                </a>
            </li>
            <li class="hidden-xs">
                <i class="livicon icon3" data-name="angle-double-right" data-size="18" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c">
                </i>
                <a href="#">Accident
                </a>
            </li>
            <li class="hidden-xs">
                <i class="livicon icon3" data-name="angle-double-right" data-size="18" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c">
                </i>
                <a href="#">Accident Lists
                </a>
            </li>
            </ol>
        </div>
    </div>
@stop

{{-- Page content --}}
@section('content')
    <!-- Container Section Strat -->
    <div class="container">
        <h2>
            Accident Lists
            @if($accidents != null)
                <a style="margin-left: 52%;" href="{{ URL::to('accident/create') }}">
                    <button style=" border-color: #09bd8f; width: 12%;" type="button" class="btn btn-default bt-lg">Add New Accident
                    </button>
                </a>
            <div style="margin-left: 25%; margin-top: -3% " class="form-group">
                <input type="text" name="search" id="search" class="form-control" style="width: 35%; height: 35px; border-color: #09bd8f;" placeholder="Search Accident Data">                                                
                
            </div>
            @else
                
            @endif
            
        </h2>
        <hr>

        <div id="notific">
            @include('notifications')
        </div>

        <div class="row">
            <div class="content">
                <div id="d" class="col-md-8 right_float ">
                    @if(!$accidents == null)
                        @forelse ($accidents->chunk(3) as $collection)
                            @foreach ($collection as $accident)
                                <!-- BEGIN FEATURED POST -->
                                <div class="col-sm-6">
                                    <div id="reocrds" class="featured-post-wide thumbnail polaroid ">
                                        <div class="featured-text relative-left">
                                            <h3 style="text-align: center" class="success">
                                            <a style="margin-left: -3em;text-align: center" href="{{ URL::to('accident/' .$accident->id .'') }}">
                                                <strong > Bus No. &nbsp; 
                                                </strong>{{$accident->bus_number}}
                                            </a>
                                            </h3>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <p>
                                                                <strong>Driver: &nbsp; 
                                                                </strong>
                                                                {!! $accident->driver_number !!}
                                                            </p>
                                                            <p  class="additional-post-wrap">
                                                                <span class="additional-post">
                                                                    <i class="livicon" data-name="user" data-size="13" data-loop="true" data-c="#5bc0de" data-hc="#5bc0de">
                                                                    </i>
                                                                    <a href="#">&nbsp;
                                                                        @if (isset($accident->user_id) && $accident->user && $accident->user->first_name)
                                                                            {{$accident->user->first_name.' '.$accident->user->last_name }}
                                                                        @endif
                                                                        
                                                                    </a>
                                                                </span>
                                                            </p>
                                                            <a style="margin-left: 5em; " href="{{ URL::to('accident/' .$accident->id .'/edit') }}">
                                                                <button style=" font-size: 1em; width: 4.5em; height: 2.5em;"  type="button" class="btn btn-success btn-sm">Edit
                                                                </button>
                                                            </a>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <p>
                                                                <strong>Route: &nbsp; 
                                                                </strong>
                                                                {!! $accident->route_name !!} 
                                                            </p>
                                                            <p class="additional-post-wrap">
                                                                <span style="margin-right: -15%" class="additional-post">
                                                                    <i class="livicon" data-name="clock" data-size="13" data-loop="true" data-c="#5bc0de" data-hc="#5bc0de">
                                                                    </i>
                                                                    <a href="#"> {{$accident->created_at->diffForHumans()}} 
                                                                    </a>
                                                                </span>
                                                            </p>
                                                            <a style="color: white; margin-left: -2em;" href="javascript:;" data-toggle="modal" onclick="deleteData({{$accident->id}})" 
                                                                data-target="#delete_confirm" class="btn btn-danger">
                                                                {{-- <i class="fa fa-trash"></i>  --}}
                                                                Delete
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.featured-text -->
                                    </div>
                                </div>
                        
                                {{-- Delete Modal --}}
                                <form method="POST" id="deleteForm" >
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <div  class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                        
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">
                                                    <strong>Delete Accident</strong>
                                                </h4>
                                                <button type="button" class="close" style="color: red" data-dismiss="modal">&times;</button>
                                            </div>
                                            
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <h5>You sure, you want to DELETE This Accident?</h5>
                                            </div>
                                            
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button style=" border-color: #09bd8f;" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <button style="color: white;" type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Delete</button>
                                            </div>
                                            
                                        </div>
                                        </div>
                                    </div>
                                </form>
                            @endforeach
                                <!-- /.featured-post-wide -->
                                <!-- END FEATURED POST -->
                        @empty
                        <h3>No Accident On your collections!
                        </h3>
                            
                        @endforelse
                        <ul class="pager">
                            {{ $accidents->links() }}
                            {{-- {!! $apps->render() !!} --}}
                        </ul>
                    @else 
                        <p>No Accident Lists found
                        </p>
                    @endif
                </div>
                    
                {{-- Delete Modal --}}
                <form method="POST" id="deleteForm" >
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div  class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                        
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">
                                    <strong>Delete Accident</strong>
                                </h4>
                                <button type="button" class="close" style="color: red" data-dismiss="modal">&times;</button>
                            </div>
                            
                            <!-- Modal body -->
                            <div class="modal-body">
                                <h5>You sure, you want to DELETE This Accident?</h5>
                            </div>
                            
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button style=" border-color: #09bd8f;" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button style="color: white;" type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Delete</button>
                            </div>
                            
                        </div>
                        </div>
                    </div>
                </form>

                <div class="col-md-4 right_float ">
                    <h3 class="martop">Recent Accidents</h3>
                    <div style="height: 30em; overflow: auto"  class="tabbable-panel polaroid">
                        <!-- Tabbablw-line Start -->
                        <div class="tabbable-line ">

                             <ul class="nav nav-tabs tabs_content">
                                @foreach ($routes as $index => $route)
                                        <li @if($index== 0) class="active" @endif>
                                            <a href="#{{ $route->id }}" id="ad{{ $route->id }}" data-toggle="tab">
                                                {!! $route->name !!}
                                            </a>
                                        </li>
                                @endforeach
                             </ul>

                            <div class="tab-content blog_tabs">
                                
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
    </div> 
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
    <script type="text/javascript">
        function deleteData(id){
            var id = id;
            var url = '{{ route("user.accident.destroy", ":id") }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }
   
        function formSubmit(){
            $("#deleteForm").submit();
        }

        $("ul.nav-tabs > li > a").click(function() {
            var id = $(this).attr("href").replace("#", "");
            console.log(id);
         
            if(id) {
                $.ajax({
                    url: "{{ route('user.accident.getId') }}",
                    type: "GET",
                    data:{'id':id},
                    dataType: "json",
                    success:function(data) {
                        console.log(id);
                        console.log(data);

                        $(".tab-content").empty();
                        $(".tab-content").html('<div class="tab-pane" name="accident" id="'+ id +'">')
                        $.each( data, function( index, object ) {
                            $(".tab-content").append('<ul id="myList" class="list-group"><li class="list-group-item">'+ object['bus_number'] +'</li></ul></div>');
                                      
                        });
                        
                    }
                });
            }    
        });

        $("ul.nav-tabs > li:first > a").trigger( "click" );

        // search_accident();
        function search_accident(query = '')
        {
            $.ajax({
                url:"{{ route('user.accident.liveSearch') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(records)
                {
                    console.log(records.output);
                    $('#d').html(records.output);
                }
            })
        }

        $(document).on('keyup', '#search', function(){
            var query = $(this).val();
            search_accident(query);
        });

    </script>
@stop
