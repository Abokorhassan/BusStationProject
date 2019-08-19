@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Edit Schedule
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
    
    <!-- Pic and date Css -->
    <link href="{{ asset('assets/vendors/summernote/summernote.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}">
    <link href="{{ asset('assets/css/pages/blog.css') }}" rel="stylesheet" type="text/css">
    <style>
      #myList li{
              background: #F0F0EC;
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
              <a href="#">Schedule
              </a>
            </li>
            <li class="hidden-xs">
              <i class="livicon icon3" data-name="angle-double-right" data-size="18" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c">
              </i>
              <a href="#">Edit Schedule
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
        <h2> Edit Schedule
        </h2>
        <hr>
        <div class="row margin_right_left">
          <div class="row margin_right_left">
            <div class="col-md-12">
              <!--main content-->
              <div class="position-center">
                <div class="row">
                  <div class="col-sm-8">
                    {!! Form::model($schedule, ['url' => URL::to('schedule/' . $schedule->id), 'method' => 'put',
                      'class' => 'form-horizontal', 'files'=> true]) !!}

                      <!-- CSRF Token -->
                      <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                      <div class="form-group {{ $errors->first('schedule_number', 'has-error') }}">
                        <label style="margin-top: -0.9em"  for="schedule_number" class="col-sm-2 control-label">Schedule Number *
                        </label>
                        <div class="col-sm-10">
                              {!! Form::text('schedule_number', null, array('class' => 'form-control required', 'placeholder'=>'Schedule Number')) !!}

                          {!! $errors->first('schedule_number', '
                          <span class="help-block">:message
                          </span>') !!}
                        </div>
                      </div>

                      <div class="form-group {{ $errors->first('route_id', 'has-error') }}">
                        <label for="route_id" class="col-sm-2 control-label">Route *
                        </label>
                        <div class="col-sm-10">
                              {!! Form::select('route_id', $opRoutes, null, ['placeholder' => 'Select Route', 'id' => 'route_id', 'class' => 'form-control required']) !!}
                          {!! $errors->first('route_id', '
                          <span class="help-block">:message
                          </span>') !!}
                        </div>
                      </div>
                  
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-4 btn_rtl">
                            <a href="{{ route('user.schedule.index') }}">
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
                      <div style="height: 22em; overflow: auto" style="height: 30em" class="tabbable-panel polaroid">
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
  
                               <ul class="nav nav-tabs tabs_content">
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
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    {{-- Pic and Date Script --}}
    <script src="{{ asset('assets/vendors/summernote/summernote.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/add_newblog.js') }}"></script>
    <script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/summernote/summernote.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/pages/add_newblog.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/parsley.min.js') }}" type="text/javascript"></script>
  
    <script src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
    <script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" ></script>
    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/adduser.js') }}"></script> 
    <script>
        $("ul.nav-tabs > li > a").click(function() {
              var id = $(this).attr("href").replace("#", "");
              console.log(id);
           
              if(id) {
                  $.ajax({
                      url: "{{ route('user.schedule.getId') }}",
                      type: "GET",
                      data:{'id':id},
                      dataType: "json",
                      success:function(data) {
                          console.log(id);
                          console.log(data);
  
                          $(".tab-content").empty();
                          $(".tab-content").html('<div class="tab-pane" name="schedule" id="'+ id +'">')
                          $.each( data, function( index, object ) {
                              $(".tab-content").append('<ul id="myList" class="list-group"><li class="list-group-item">'+ object['schedule_number'] +'<span style="margin-left:3em;">'+ object['start']+'</span></li></ul></div>');
                                        
                          });
                          
                      }
                  });
              }    
          });
  
        $("ul.nav-tabs > li:first > a").trigger( "click" );
    </script>
@stop
