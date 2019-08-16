@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Bus Seats
@stop

{{-- page level styles --}}
@section('header_styles')
    
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet"/>

    <style>
        .circle_tr {
            height: 35px;
            width: 35px;
            background-color: #038482;
            border-radius: 50%;
            display: inline-block;
            color: white;
            
        }
        .reserve_seat{
            margin-left: 0.3em;
            margin-top: 2em;
            font-size: 130%;
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
                    <a href="#">show bus seat
                    </a>
                </li>
            </ol>
        </div>
    </div>
@stop

{{-- Page content --}}
@section('content')
    <!-- Container Section Strat -->
    <section   class="content">
        <div  class="row">
            <div class="col-lg-12">
                <div style="margin-left: 15em;"  class="tab-content mar-top">
                    <div id="tab1" class="tab-pane fade active in">
                        <div class="row">
                            <div class="col-lg-12">
                                <div  class="panel">
                                    <div  class="panel-heading">
                                        <h3 style=" margin-top: -1%;" >
                                            show Bus seats
                                        </h3>
  
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-8">
                                            <div  class="panel-body">
                                                <div class="table-responsive">
                                                    <table  class="table table-bordered table-striped" id="users">
                                                        @forelse ($reserves as $reserve)
                                                            <tr>
                                                                <td>
                                                                    <span class="circle_tr">
                                                                        <span style="margin-bottom: -140%" class="reserve_seat">{{ $reserve->seat_number }}</span>
                                                                    </span>
                                                                    <strong style="margin-left: 1em;">
                                                                        {{ $reserve->rider_number }}
                                                                    </strong>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td>there's no reserve seat this for this bus</td>
                                                            </tr>
                                                        @endforelse

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
@stop 

{{-- page level scripts --}}
@section('footer_scripts')
    <!-- Bootstrap WYSIHTML5 -->
    <script  src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function () {
           
        });
    </script>

@stop
    