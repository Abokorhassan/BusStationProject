@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Add Reserve
@stop

{{-- page level styles --}}
@section('header_styles')
  <!--page level css starts-->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/tabbular.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/blog.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js">
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
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
              <a href="#">Reserve
              </a>
            </li>
            <li class="hidden-xs">
              <i class="livicon icon3" data-name="angle-double-right" data-size="18" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c">
              </i>
              <a href="#">Add Reserve
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
        <h2> Reserve Seat
        </h2>
        <hr>
        <div class="row margin_right_left">
          <div class="row margin_right_left">
            <div class="col-md-12">
              <!--main content-->
              <div class="position-center">
                <div class="row">
                  <div class="col-sm-8">
                    <form id="commentForm" action="{{ route('user.reserve.store') }}"
                          method="POST" enctype="multipart/form-data" class="form-horizontal">
                      <!-- CSRF Token -->
                      <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                      <div class="form-group {{ $errors->first('rider', 'has-error') }}">
                        <label for="ridriderer_id" class="col-sm-2 control-label">Rider ID No. *
                        </label>
                        <div class="col-sm-10">
                          <select class="form-control ridercatogry" id="riderNumber" title="Select Pas..." name="rider">                                         
                            <option value="">Select Rider
                            </option>
                            @foreach ($riders as $rider)
                            <option value="{{ $rider->id}}" 
                              @if (old('rider')=== "{{$rider->id}}") selected="selected"@endif
                              >{{ $rider->id_number}}
                            </option>
                            @endforeach
                          </select>
                          {!! $errors->first('rider', '
                          <span class="help-block">:message
                          </span>') !!}
                        </div>   
                      </div>
  

                      <div class="form-group {{ $errors->first('bus_number', 'has-error') }}">
                        <label for="bus_number" class="col-sm-2 control-label">Bus *
                        </label>
                        <div class="col-sm-10">
                          <select class="form-control " id="busnumber"  name="bus_number">                                         
                            <option value="">Select Bus
                            </option>
                            
                            <option value="{{ $queues->id}}" 
                              @if (old('schedule')=== "{{$queues->id}}") selected="selected"@endif
                              >{{ $queues->bus_number}} 
                            </option>
                          </select>
                          {!! $errors->first('bus_number', '
                          <span class="help-block">:message
                          </span>') !!}
                        </div>   
                      </div>     
                      
                      <div class="form-group {{ $errors->first('seat_number', 'has-error') }}">
                        <label for="seat_number" class="col-sm-2 control-label">Seat Number *
                        </label>
                        <div class="col-sm-10">
                          <select class="form-control " id="seat_number"  name="seat_number">                                         
                            {{-- <option value="0" disabled="true" selected = "true"> Select Seat
                            </option> --}}
                          </select>
                          {!! $errors->first('seat_number', '
                          <span class="help-block">:message
                          </span>') !!}
                        </div>   
                      </div>

                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-4 btn_rtl">
                            <a href="{{ route('user.reserve.index') }}">
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

  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


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
    $(document).ready(function(){
      $(document).on('change','#busnumber',function(){
        var id=$(this).val();
        console.log(id);

        if(id) {
                $.ajax({
                    url: "{{ route('user.reserve.getBusSeat') }}",
                    type: "GET",
                    data:{'id':id},
                    dataType: "json",
                    success:function(data) {
                        // var bus = data[2].bus_number;
                        // console.log(data);

                        //   //also This is from stackoverflow
                        $('select[name="seat_number"]').empty();
                        // $('select[name="seat_number"]').html('<option value=""  selected = "true">Chose seat number</option>');
                        $.each( data, function( index, object ) {
                          $('select[name="seat_number"]').append('<option value="'+ object['seat_number'] +'" >'+ object['seat_number'] +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="seat_number"]').empty();
            }
      });
    });
  </script>

  <script type="text/javascript">
    $("#riderNumber").select2({
      placeholder:'select Rdier', allowClear:true
    });

    $("#busnumber").select2({
      placeholder:'select Bus', allowClear:true
    });

    $("#seat_number").select2({
      placeholder:'select Seat Number', allowClear:true
    });
  </script>


@stop
