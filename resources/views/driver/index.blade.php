@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Driver Lists
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
                <a href="#">Driver
                </a>
            </li>
            <li class="hidden-xs">
                <i class="livicon icon3" data-name="angle-double-right" data-size="18" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c">
                </i>
                <a href="#">Driver Lists
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
            Driver Lists
            @if($drivers != null)
                <a style="margin-left: 40%;" href="{{ URL::to('driver/create') }}">
                    <button style=" border-color: #09bd8f; width: 12%;" type="button" class="btn btn-default bt-lg">Add New Driver
                    </button>
                </a>                
            @else
                
            @endif
            
        </h2>
        <hr>

        <div id="notific">
            @include('notifications')
        </div>
        {{-- 
        <div class="table-responsive">
            <h3 > Total Data : 
            <span id="total_records">
            </span>
            </h3>
        </div> --}}
        @if(!$drivers == null)
            <div class="row">
                <div class="content">
                    <div class="col-md-8 right_float ">
                        @forelse ($drivers as $driver)
                            <!-- BEGIN FEATURED POST -->
                            <div id="reocrds" class="featured-post-wide thumbnail polaroid ">
                                <div class="featured-text relative-left">
                                    <h3 style="text-align: center" class="success">
                                    <a href="">
                                        <strong> Driver Number: &nbsp; 
                                        </strong>{{$driver->driver_number}}
                                    </a>
                                    </h3>
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p>
                                                    <strong>ID: &nbsp; 
                                                    </strong>
                                                    {!! $driver->id !!}
                                                    </p>
                                                    <p>
                                                    <strong>License Number: &nbsp; 
                                                    </strong>
                                                    {!! $driver->license_number !!}
                                                    </p>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p>
                                                        <strong>Full Name: &nbsp; 
                                                        </strong>
                                                        {!! $driver->first_name !!} 
                                                    </p>
                                                    <p>
                                                        <strong>Phone Number: &nbsp; 
                                                        </strong>
                                                        {!! $driver->ph_number !!}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="{{ URL::to('driver/' .$driver->id .'/edit') }}">
                                                <button  type="button" class="btn btn-success btn-sm">Edit
                                                </button>
                                            </a>
                                            

                                            <button style="margin-top: 3%" type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_confirm">
                                                Delete
                                            </button>
                                        </div>
                                        <p style="text-align: center" class="additional-post-wrap">
                                            <span style="margin-left: -15%" class="additional-post">
                                            <i class="livicon" data-name="user" data-size="13" data-loop="true" data-c="#5bc0de" data-hc="#5bc0de">
                                            </i>
                                            <a href="#">&nbsp;{{$driver->user->first_name.' '.$driver->user->last_name }} 
                                            </a>
                                            </span>
                                            <span style="margin-right: -15%" class="additional-post">
                                            <i class="livicon" data-name="clock" data-size="13" data-loop="true" data-c="#5bc0de" data-hc="#5bc0de">
                                            </i>
                                            <a href="#"> {{$driver->created_at->diffForHumans()}} 
                                            </a>
                                            </span>
                                        </p>
                                    </div>
                                </div>
                                <!-- /.featured-text -->
                            </div>

                            {{-- Delete Modal --}}
                            <form method="POST" action="driver/{{$driver->id}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <div  class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                    
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">
                                                <strong>Delete Driver</strong>
                                            </h4>
                                            <button type="button" class="close" style="color: red" data-dismiss="modal">&times;</button>
                                        </div>
                                        
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <h5>You sure, you want to DELETE This Driver?</h5>
                                        </div>
                                        
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                                <button style=" border-color: #09bd8f;" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        
                                            <button style="color: white;"  type="submit" class="btn btn-danger" >Confirm</button>
                                        </div>
                                        
                                    </div>
                                    </div>
                                </div>
                            </form>
                            <!-- /.featured-post-wide -->
                            <!-- END FEATURED POST -->
                            @empty
                            <h3>No Driver On your collections!
                            </h3>
                            @endforelse
                        <ul class="pager">
                        {{ $drivers->links() }}
                        {{-- {!! $apps->render() !!} --}}
                        </ul>
                    </div>
                </div>
            </div>
        @else 
            <p>No Driver Lists found
            </p>
        @endif
    </div> 
@stop 

{{-- page level scripts --}}
@section('footer_scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
@stop
