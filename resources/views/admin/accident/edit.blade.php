@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Edit Accident
@stop

{{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('assets/vendors/summernote/summernote.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}">
    <link href="{{ asset('assets/css/pages/blog.css') }}" rel="stylesheet" type="text/css">

    <!--end of page level css-->
@stop

@section('content')
  <section class="content-header">
      <!--section starts-->
      <h1>Accident</h1>
      <ol class="breadcrumb">
          <li>
              <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="14"
                                                            data-c="#000" data-loop="true"></i>
                  Dashboard
              </a>
          </li>
          <li>
              <a href="#">Accident</a>
          </li>
          <li class="active">Edit Accident</li>
      </ol>
  </section>
  <!--section ends-->

  <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">
                Edit Accident
              </h3>
              <span class="pull-right clickable">
                <i class="glyphicon glyphicon-chevron-up">
                </i>
              </span>
            </div>
            <div class="panel-body">
              <!--main content-->
              {!! Form::model($accident, ['url' => URL::to('admin/accident/' . $accident->id), 'method' => 'put', 'class' => 'form-horizontal', 'files'=> true]) !!}

                  <!-- CSRF Token -->
                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div id="rootwizard">
                      <h2 class="hidden">&nbsp;</h2>

                      <div class="form-group {{ $errors->first('station_id', 'has-error') }}">
                        <label for="station_id" class="col-sm-2 control-label">Station *
                        </label>
                        <div class="col-sm-10">
                              {!! Form::select('station_id', $opStations, null, ['placeholder' => 'Select Station', 'id' => 'station',  'class' => 'form-control required']) !!}
                          {!! $errors->first('station_id', '
                          <span class="help-block">:message
                          </span>') !!}
                        </div>
                      </div>

                      <div class="form-group {{ $errors->first('bus_id', 'has-error') }}">
                        <label for="bus_id" class="col-sm-2 control-label">Bus *
                        </label>
                        <div class="col-sm-10">
                              {!! Form::select('bus_id', $opBuses, null, ['placeholder' => 'Select Bus', 'name' => 'bus_id', 'class' => 'form-control required']) !!}
                              {{-- {!! Form::select('bus_id',[''=>'Select Bus'],null,['class'=>'form-control']) !!} --}}
                          {!! $errors->first('bus_id', '
                          <span class="help-block">:message
                          </span>') !!}
                        </div>
                      </div>

                      <div class="form-group {{ $errors->first('accident_latitude', 'has-error') }}">
                        <label for="accident_latitude" class="col-sm-2 control-label">Latitude *
                        </label>
                        <div class="col-sm-10">
                          {!! Form::text('accident_latitude', $accident->acc_lat, array('class' => 'form-control required', 'placeholder'=>'Name')) !!}
                          {!! $errors->first('accident_latitude', '
                          <span class="help-block">:message
                          </span>') !!}
                        </div>
                      </div>

                      <div class="form-group {{ $errors->first('accident_longitude', 'has-error') }}">
                        <label for="accident_longitude" class="col-sm-2 control-label">Longitude *
                        </label>
                        <div class="col-sm-10">
                          {!! Form::text('accident_longitude', $accident->acc_long, array('class' => 'form-control required', 'placeholder'=>'Longitude')) !!}
                          {!! $errors->first('accident_longitude', '
                          <span class="help-block">:message
                          </span>') !!}
                        </div>
                      </div>

                      {{-- <div class="form-group {{ $errors->first('route_id', 'has-error') }}">
                        <label for="route_id" class="col-sm-2 control-label">Route Id *
                        </label>
                        <div class="col-sm-10">
                              {!! Form::text('route_id', null, array('class' => 'form-control required', 'placeholder'=>'Route Id')) !!}
                          {!! $errors->first('route_id', '
                          <span class="help-block">:message
                          </span>') !!}
                        </div>
                      </div> --}}

                      

                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-4 btn_rtl">
                            <a href="{{ route('admin.accident.index') }}">
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
    <script src="{{ asset('assets/vendors/summernote/summernote.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/add_newblog.js') }}"></script>
    
    {{-- <script>
        // $(document).ready(function(){
        //   $(document).on('change','#station',function(){
        //     var id=$(this).val();
        //     var token = $("input[name='_token']").val();
        //     console.log(id);

        //     if(id){
        //       $.ajax({
        //         url: "{{ route('admin.accident.getBusesStationE') }}",
        //         method: 'GET',
        //         data:{'id':id, _token:token},
        //         dataType: "json",
        //         success:function(data) {
        //           console.log(data);

        //           // $("select[name='bus_number'").html('');
        //           // $("select[name='bus_number'").html(data.options);
        //         }
        //       });
        //     }else{
        //         $('select[name="bus_number"]').empty();
        //     }
        //   });
        // });
    </script> --}}
@stop

