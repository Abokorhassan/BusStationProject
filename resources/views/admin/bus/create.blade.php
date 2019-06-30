@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Add Bus
@stop

{{-- page level styles --}}
@section('header_styles')

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
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <!--section starts-->
        <h1>Bus</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="14"
                                                             data-c="#000" data-loop="true"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">Bus</a>
            </li>
            <li class="active">Add New Bus</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">
                      Add New Bus
                    </h3>
                    <span class="pull-right clickable">
                      <i class="glyphicon glyphicon-chevron-up">
                      </i>
                    </span>
                  </div>
                  <div class="panel-body">
                    <!--main content-->
                    <form id="commentForm" action="{{ route('admin.bus.store') }}"
                          method="POST" class="form-horizontal">
                      <!-- CSRF Token -->
                      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                      <div id="rootwizard">
                        <h2 class="hidden">&nbsp;</h2>

                        <div class="form-group {{ $errors->first('model_type', 'has-error') }}">
                          <label for="name" class="col-sm-2 control-label">Model Type *
                          </label>
                          <div class="col-sm-10">
                            <input id="model_type"  autocomplete="off" name="model_type" type="text"
                                    placeholder="Model Type" class="form-control required"
                                    value="{!! old('model_type') !!}"/>
                            {!! $errors->first('model_type', '
                            <span class="help-block">:message
                            </span>') !!}
                          </div>
                        </div>
                        
                        <div class="form-group {{ $errors->first('bus_number', 'has-error') }}">
                          <label for="bus_number" class="col-sm-2 control-label">Bus Number *
                          </label>
                          <div class="col-sm-10">
                            <input id="bus_number"  autocomplete="off" name="bus_number" type="text" placeholder="Bus Number"
                                    class="form-control required" value="{!! old('bus_number') !!}"/>
                            {!! $errors->first('bus_number', '
                            <span class="help-block">:message
                            </span>') !!}
                          </div>
                        </div>
                        
                        <div class="form-group {{ $errors->first('station', 'has-error') }}">
                          <label for="station" class="col-sm-2 control-label">Station *
                          </label>
                          <div class="col-sm-10">
                            <select class="form-control" id="station" name="station">                                         
                              <option value="">Select Station
                              </option>

                              @foreach ($stations as $station)
                                <option value="{{ $station->id}}" 
                                  @if (old('station')=== "{{$station->id}}") selected="selected"@endif
                                  >{{ $station->name}}
                                </option>
                              @endforeach
                            </select>
                            {!! $errors->first('station', '
                            <span class="help-block">:message
                            </span>') !!}
                          </div>   
                        </div>

                        <div class="form-group {{ $errors->first('driver_number', 'has-error') }}">
                          <label for="driver_number" class="col-sm-2 control-label">Driver Number*
                          </label>
                          <div class="col-sm-10">
                            <select class="form-control" id="driver" name="driver_number">                                         
                              {{-- <option value="">Select Driver number
                              </option>
                              @foreach ($drivers as $driver)
                                <option value="{{ $driver->id}}" 
                                  @if (old('driver_number')=== "{{$driver->id}}") selected="selected"@endif
                                  >{{ $driver->driver_number}}
                                </option>
                              @endforeach --}}
                            </select>
                            {!! $errors->first('driver_number', '
                            <span class="help-block">:message
                            </span>') !!}
                          </div>   
                        </div>

                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-4 btn_rtl">
                            <a href="{{ route('admin.bus.index') }}">
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
  <!-- begining of page level js -->
  <!--edit blog-->
  <script src="{{ asset('assets/vendors/summernote/summernote.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
  {{--<script src="{{ asset('assets/vendors/bootstrap-tagsinput/bootstrap-tagsinput.js') }}" type="text/javascript"></script>--}}
  <script type="text/javascript" src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
  <script src="{{ asset('assets/js/pages/add_newblog.js') }}" type="text/javascript"></script>

  <script src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
  <script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" ></script>
  <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"  type="text/javascript"></script>
  <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/pages/adduser.js') }}"></script>

  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <script>
    $(document).ready(function(){
      $(document).on('change','#station',function(){
        var id=$(this).val();
        console.log(id);

        if(id) {
                $.ajax({
                    url: "{{ route('admin.bus.getDriverStation') }}",
                    type: "GET",
                    data:{'id':id},
                    dataType: "json",
                    success:function(data) {
                        // var bus = data[2].bus_number;
                        console.log(data);

                        $('select[name="driver_number"]').empty();
                        $.each( data, function( index, object ) {
                          $('select[name="driver_number"]').append('<option value="'+ object['id'] +'" >'+ object['driver_number'] +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="seat_number"]').empty();
            }
      });
    });
  </script>

  <script>
    $("#station").select2({
      placeholder:'select station', allowClear:true
    });

    $("#driver").select2({
      placeholder:'select driver', allowClear:true
    });
  </script>

@stop
