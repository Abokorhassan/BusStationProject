@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Rider  Detail
@stop

{{-- page level styles --}}
@section('header_styles')
    
  <meta name="csrf_token" content="{{ csrf_token() }}">
  <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet"/>
  <link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet"/>
  <link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet"/>
    
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
                <a href="#">Rider
                </a>
            </li>
            <li class="hidden-xs">
                <i class="livicon icon3" data-name="angle-double-right" data-size="18" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c">
                </i>
                <a href="#">Rider Detail
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
                <div style="margin-left: 15em"  class="tab-content mar-top">
                    <div id="tab1" class="tab-pane fade active in">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel">
                                    <div  class="panel-heading">
                                        <h1 class="panel-title">
  
                                            Rider Detail
                                        </h1>
  
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-8">
                                            <div  class="panel-body">
                                                <div class="table-responsive">
                                                    <table  class="table table-bordered table-striped" id="users">
  
                                                        <tr>
                                                            <td>Id</td>
                                                            <td><p class="user_name_max">{{ $rider->id }}</p></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Rider Number</td>
                                                            <td><p class="user_name_max">{{ $rider->id_number}}</p></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Name</td>
                                                            <td>{{ $rider->first_name.'  '.$rider->last_name.'  '.$rider->third_name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Phone Number</td>
                                                            <td><p class="user_name_max">{{ $rider->ph_number}}</p></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gender</td>
                                                            <td><p class="user_name_max">{{ $rider->gender}}</p></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Station_name/td>
                                                            <td><p class="user_name_max">{{ $rider->station_name}}</p></td>
                                                        </tr>
                                                        <tr>
                                                            <td>User</td>
                                                            <td>{{ $rider->user_first.'  '.$rider->user_last }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Created At</td>
                                                            <td>{!!$rider->created_at->diffForHumans() !!} </td>
                                                        </tr>
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
    