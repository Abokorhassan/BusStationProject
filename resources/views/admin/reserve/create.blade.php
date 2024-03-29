@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Resrve Seat
@stop

{{-- page level styles --}}
@section('header_styles')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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

{{-- Page content --}}
@section('content')
    <section class="content-header">
        <!--section starts-->
        <h1>Bus Reservation</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="14"
                                                             data-c="#000" data-loop="true"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">Bus Reservation</a>
            </li>
            <li class="active">Reserve Seat</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">
                  Reserve New Seat
                </h3>
                <span class="pull-right clickable">
                  <i class="glyphicon glyphicon-chevron-up">
                  </i>
                </span>
              </div>
              <div class="panel-body">
                <!--main content-->
                <form id="commentForm" action="{{ route('admin.reserve.store') }}"
                    method="POST" class="form-horizontal">
                  <!-- CSRF Token -->
                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                  <div id="rootwizard">
                    <h2 class="hidden">&nbsp;</h2>

                    <div class="form-group {{ $errors->first('rider', 'has-error') }}">
                      <label for="rider" class="col-sm-2 control-label">Rider ID No. *
                      </label>
                      <div class="col-sm-10">
                        <select class="form-control ridercatogry" title="Select Pas..." name="rider">                                         
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

                    <div class="form-group {{ $errors->first('schedule', 'has-error') }}">
                      <label for="schedule" class="col-sm-2 control-label">Schedule *
                      </label>
                      <div class="col-sm-10">
                        <select class="form-control schedule" title="Select Pas..." name="schedule">                                         
                          <option value="">Select Schedule
                          </option>
                          @foreach ($schedules as $schedule)
                          <option value="{{ $schedule->id}}" 
                            @if (old('schedule')=== "{{$schedule->id}}") selected="selected"@endif
                            >{{ $schedule->schedule_number}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  {{$schedule->station->name}}
                          </option>
                          @endforeach
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
                          <option value="0" disabled="true" selected = "true"> Select Seat

                          </option>
                        </select>
                        {!! $errors->first('seat_number', '
                        <span class="help-block">:message
                        </span>') !!}
                      </div>   
                    </div>  

                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-4 btn_rtl">
                        <a href="{{ route('admin.reserve.index') }}">
                          <button type="button" class="btn btn-danger">
                            Cancel 
                          </button>
                        </a>
                        <button type="submit" class="btn btn-success">
                            @lang('button.save')
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!--row end-->
    </section>
 
@stop

{{-- page level scripts --}}
@section('footer_scripts')
  <script src="{{ asset('assets/vendors/summernote/summernote.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
  {{--<script src="{{ asset('assets/vendors/bootstrap-tagsinput/bootstrap-tagsinput.js') }}" type="text/javascript"></script>--}}
  <script type="text/javascript" src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
  <script src="{{ asset('assets/js/pages/add_newblog.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/parsley.min.js') }}" type="text/javascript"></script>

  <script>
    $(function () {
        $('body').on('hidden.bs.modal', '.modal', function () {
            $(this).removeData('bs.modal');
        });
    });
  </script>

  <script>
    $(document).ready(function(){
      $(document).on('change','.schedule',function(){
        var id=$(this).val();

        if(id) {
                $.ajax({
                    url: "{{ route('admin.reserve.getBusStation') }}",
                    type: "GET",
                    data:{'id':id},
                    dataType: "json",
                    success:function(data) {
                        // var bus = data[2].bus_number;
                        // console.log(data);

                           // This is mine
                        // $('select[name="bus_number"]').empty();
                        // $.each(data, function(id,bus_number ){
                        //     $('select[name="bus_number"]').append('<option value="'+ id +'">'+ bus_number +'</option>');
                        // });

                          // This is from Stack overflow
                        // data.forEach(({id, bus_number}) => {
                        //   $('select[name="bus_number"]').append(`<option value="${id}">${bus_number}</option>`);
                        // });

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

      $(document).on('change','#busnumber',function(){
        var id=$(this).val();
        console.log(id);

        if(id) {
                $.ajax({
                    url: "{{ route('admin.reserve.getSeatNumber') }}",
                    type: "GET",
                    data:{'id':id},
                    dataType: "json",
                    success:function(data) {
                        // var bus = data[2].bus_number;
                        // console.log(data);

                        //   //also This is from stackoverflow
                        $('select[name="seat_number"]').empty();
                        $('select[name="seat_number"]').html('<option value=""  selected = "true">Chose seat number</option>');
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




@stop
