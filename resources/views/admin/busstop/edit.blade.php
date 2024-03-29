@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Edit Bus Stop
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
      <h1>Bus Stop</h1>
      <ol class="breadcrumb">
          <li>
              <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="14"
                                                            data-c="#000" data-loop="true"></i>
                  Dashboard
              </a>
          </li>
          <li>
              <a href="#">Bus Stop</a>
          </li>
          <li class="active">Edit Bus Stop</li>
      </ol>
  </section>
  <!--section ends-->

  <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">
                Edit Bus Stop
              </h3>
              <span class="pull-right clickable">
                <i class="glyphicon glyphicon-chevron-up">
                </i>
              </span>
            </div>
            <div class="panel-body">
              <!--main content-->
              {!! Form::model($busstop, ['url' => URL::to('admin/busstop/' . $busstop->id), 'method' => 'put', 'class' => 'form-horizontal', 'files'=> true]) !!}

                  <!-- CSRF Token -->
                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                      <div id="rootwizard">
                        <h2 class="hidden">&nbsp;</h2>

                        <div class="form-group {{ $errors->first('name', 'has-error') }}">
                          <label for="name" class="col-sm-2 control-label">Name *
                          </label>
                          <div class="col-sm-10">
                            {!! Form::text('name', $busstop->name, array('class' => 'form-control required', 'placeholder'=>'Name')) !!}
                            {!! $errors->first('name', '
                            <span class="help-block">:message
                            </span>') !!}
                          </div>
                        </div>

                        <div class="form-group {{ $errors->first('latitude', 'has-error') }}">
                          <label for="latitude" class="col-sm-2 control-label">Latitude *
                          </label>
                          <div class="col-sm-10">
                                {!! Form::text('latitude',$busstop->lat, array('class' => 'form-control required', 'placeholder'=>'Latitude')) !!}
                            {!! $errors->first('latitude', '
                            <span class="help-block">:message
                            </span>') !!}
                          </div>
                        </div>

                        <div class="form-group {{ $errors->first('longitude', 'has-error') }}">
                          <label for="longitude" class="col-sm-2 control-label">Longitude *
                          </label>
                          <div class="col-sm-10">
                                {!! Form::text('longitude', $busstop->long, array('class' => 'form-control required', 'placeholder'=>'Longitude')) !!}
                            {!! $errors->first('longitude', '
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

                        <div class="form-group {{ $errors->first('station_id', 'has-error') }}">
                          <label for="station_id" class="col-sm-2 control-label">Station *
                          </label>
                          <div class="col-sm-10">
                                {!! Form::select('station_id', $opStations, null, ['placeholder' => 'Select Station', 'class' => 'form-control required']) !!}
                            {!! $errors->first('station_id', '
                            <span class="help-block">:message
                            </span>') !!}
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-4 btn_rtl">
                            <a href="{{ route('admin.busstop.index') }}">
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
@stop

