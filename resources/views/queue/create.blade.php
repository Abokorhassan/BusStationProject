@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Add Queue
@stop

{{-- page level styles --}}
@section('header_styles')
  <!--page level css starts-->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/tabbular.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/blog.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js">
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
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

  {{-- Pic and Date css --}}
  <link href="{{ asset('assets/vendors/summernote/summernote.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/pages/blog.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}">
    <!--end of page level css-->
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/iCheck/css/all.css') }}"  rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/pages/wizard.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/parsley.css') }}" rel="stylesheet">

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
              <a href="#">Queue
              </a>
            </li>
            <li class="hidden-xs">
              <i class="livicon icon3" data-name="angle-double-right" data-size="18" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c">
              </i>
              <a href="#">Add Queue
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
        <h2> Add Bus to the Queue
        </h2>
        <hr>
        <div class="row margin_right_left">
          <div class="row margin_right_left">
            <div class="col-md-12">
              <!--main content-->
              <div class="position-center">
                <div class="row">

                  <div class="col-sm-8">
                    <form id="commentForm" action="{{ route('user.queue.store') }}"
                          method="POST" enctype="multipart/form-data" class="form-horizontal">
                      <!-- CSRF Token -->
                      <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                      <div class="form-group {{ $errors->first('route', 'has-error') }}">
                        <label for="route" class="col-sm-2 control-label">Route *
                        </label>
                        <div class="col-sm-10">
                          <select class="form-control" id="route" name="route">                                         
                            <option value="">Select route
                            </option>
                            @foreach ($routes as $route)
                              <option value="{{ $route->id}}" 
                                @if (old('route')=== "{{$route->id}}") selected="selected"@endif
                                >{{ $route->name}}
                              </option>
                            @endforeach
                          </select>
                          {!! $errors->first('route', '
                          <span class="help-block">:message
                          </span>') !!}
                        </div>   
                      </div>

                      <div class="form-group {{ $errors->first('schedule', 'has-error') }}">
                        <label for="schedule" class="col-sm-2 control-label">Schedule *
                        </label>
                        <div class="col-sm-10">
                          <select class="form-control schedule"  id="schedule_number" name="schedule">                                         
                            <option value="">Select Schedule
                            </option>
                            {{-- <option value="{{ $schedules->id}}" 
                              @if (old('schedule')=== "{{$schedules->id}}") selected="selected"@endif
                              >{{ $schedules->schedule_number}}
                            </option> --}}
                          </select>
                          {!! $errors->first('schedule', '
                          <span class="help-block">:message
                          </span>') !!}
                        </div>   
                      </div>
                      

                      <div class="form-group {{ $errors->first('bus_number', 'has-error') }}">
                        <label for="bus_number" class="col-sm-2 control-label">Bus *
                        </label>
                        <div class="col-sm-10">
                          <select class="form-control " id="busnumber"  name="bus_number">                                         
                            <option value="0" disabled="true" selected = "true"> Select Bus
                            </option>
                            {{-- @foreach ($buses as $bus)
                              <option value="{{ $bus->id}}" 
                                @if (old('bus_number')=== "{{$bus->id}}") selected="selected"@endif
                                >{{ $bus->bus_number}}
                              </option>
                            @endforeach --}}
                          </select>
                          </select>
                          {!! $errors->first('bus_number', '
                          <span class="help-block">:message
                          </span>') !!}
                        </div>   
                      </div>  


                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-4 btn_rtl">
                            <a href="{{ route('user.queue.index') }}">
                              <button type="button" class="btn btn-danger">
                                Cancel 
                              </button>
                            </a>
                            <button type="submit" class="btn btn-success">
                                @lang('button.save')
                            </button>
                        </div>
                      </div>

                    </form>{{--{!!  Form::close()  !!}--}}
                  </div>

                  <div class="col-md-4 right_float ">
                      <h3 class="martop">Recent Schedules</h3>
                      <div style="height: 22em; overflow: auto" class="tabbable-panel ">
                          <!-- Tabbablw-line Start -->
                          <div class="tabbable-line ">
  
                              <!-- Nav Nav-tabs Start -->
                              {{-- <ul class="nav nav-tabs tabs_content">
                                  @foreach ($routes as $index => $route)
                                     <li {{ $index== 0 ? 'class="active"' : '' }}>
                                        <a href="#{{ $route->id }}" id="ad{{ $route->id }}" data-toggle="tab">
                                           {!! $route->name !!}
                                        </a>
                                     </li>
                                  @endforeach
                               </ul> --}}
  
                               <ul  class="nav nav-tabs tabs_content">
                                  @foreach ($routes as $index => $route)
                                      {{-- @if ($loop->first)
                                          <li class="active"> 
                                      @endif --}}
                                          {{-- <li {{ $index== 0 ? 'class="active"' : '' }}> --}}
                                          <li @if($index== 0) class="active" @endif>
                                              <a href="#{{ $route->id }}" id="ad{{ $route->id }}" data-toggle="tab">
                                                  {!! $route->name !!}
                                              </a>
                                          </li>
                                  @endforeach
                               </ul>
  
                              <div class="tab-content blog_tabs">
                                  {{-- <div class="tab-pane" name="schedule" id="" >
                                      @foreach ($tabSchedule as $schedule)
                                          <ul class="list-group">
                                              <li class="list-group-item">{{ $schedule->schedule_number}}</li>
                                          </ul>
                                      @endforeach    
                                  </div> --}}
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
      
@stop 

{{-- page level scripts --}}
@section('footer_scripts')
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  {{-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> --}}
  {{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> --}}

  {{-- PIC AND DATA SCRIPT --}}
  <script src="{{ asset('assets/vendors/summernote/summernote.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
  {{--<script src="{{ asset('assets/vendors/bootstrap-tagsinput/bootstrap-tagsinput.js') }}" type="text/javascript"></script>--}}
  <script type="text/javascript" src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
  <script src="{{ asset('assets/js/pages/add_newblog.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/parsley.min.js') }}" type="text/javascript"></script>

  <script src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
  <script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" ></script>
  <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"  type="text/javascript"></script>
  <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
 
  <script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>

  <script>

    $("ul.nav-tabs > li > a").click(function() {
        var id = $(this).attr("href").replace("#", "");
        console.log(id);
      
        if(id) {
            $.ajax({
                url: "{{ route('user.queue.getId') }}",
                type: "GET",
                data:{'id':id},
                dataType: "json",
                success:function(data) {
                    console.log(id);
                    console.log(data);

                    $(".tab-content").empty();
                    $(".tab-content").html('<div class="tab-pane" name="queue" id="'+ id +'">')
                    $.each( data, function( index, object ) {
                        $(".tab-content").append('<ul id="myList" class="list-group"><li class="list-group-item">'+ object['bus_number'] +' <span style="margin-left:3em;">'+ object['schedule_number']+'</span></li></ul></div>');
                                  
                    });
                    
                }
            });
        }    
    });

    $("ul.nav-tabs > li:first > a").trigger( "click" );

    $(document).ready(function(){
      $(document).on('change','#route',function(){
        var id=$(this).val();
        console.log(id);

        if(id) {
            $.ajax({
                url: "{{ route('user.queue.getRouteSchedule') }}",
                type: "GET",
                data:{'id':id},
                dataType: "json",
                success:function(data) {
                    console.log(data);
                    if(data){
                        // also This is from stackoverflow
                        $('select[name="schedule"]').empty();
                        $('select[name="schedule"]').html('<option value=""  selected = "true">Select Schedule</option>');
                        // $.each( data, function( index, object ) {
                        //   $('select[name="schedule"]').append('<option value="'+ object['id'] +'" >'+ object['schedule_number'] +'</option>');
                        // });
                          // $('select[name="schedule"]').append('<option value="'+ data['id'] +'" >'+ data['schedule_number'] +'</option>');

                          $.each( data, function( index, object ) {
                            $('select[name="schedule"]').append('<option value="'+ object['id'] +'" >'+ object['schedule_number'] +'</option>');
                          });

                      

                        // schedule_number

                        // This is mine
                        // $('select[name="schedule"]').empty();
                        // $.each(data, function(id,schedule_number ){
                        //     $('select[name="schedule"]').append('<option value="'+ id +'">'+ schedule_number +'</option>');
                        // });

                          // This is from Stack overflow
                        // data.forEach(({id, schedule_number}) => {
                        //   $('select[name="schedule"]').append(`<option value="${id}">${schedule_number}</option>`);
                        // });
                      }else{
                      $('select[name="schedule"]').empty(); 
                      $('select[name="schedule"]').html('<option value=""  selected = "true"></option>');                    
                    }  
                }
            });
        }else{
            $('select[name="schedule"]').empty();
        }
      });
    });
    $(document).ready(function(){
      $(document).on('change','.schedule',function(){
        var id=$(this).val();
        console.log(id);

        if(id) {
            $.ajax({
                url: "{{ route('user.queue.getBusQueue') }}",
                type: "GET",
                data:{'id':id},
                dataType: "json",
                success:function(data) {
                    console.log(data);

                      //also This is from stackoverflow
                    $('select[name="bus_number"]').empty();
                    $('select[name="bus_number"]').html('<option value=""  selected = "true">Chose Bus</option>');
                    $.each( data, function( index, object ) {
                      $('select[name="bus_number"]').append('<option value="'+ object['id'] +'" >'+ object['bus_number'] +'</option>');
                    });


                }
            });
        }else{
            $('select[name="bus_number"]').empty();
        }
      });
    });
  </script>


@stop
