@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Add Rider
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
  <link href="{{ asset('assets/css/parsley.css') }}" rel="stylesheet">
@stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
        <!--section starts-->
        <h1>Rider</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="14"
                                                             data-c="#000" data-loop="true"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">Rider</a>
            </li>
            <li class="active">Add New Rider</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">
                      Add New Rider
                    </h3>
                    <span class="pull-right clickable">
                      <i class="glyphicon glyphicon-chevron-up">
                      </i>
                    </span>
                  </div>
                  <div class="panel-body">
                    <!--main content-->
                    <form id="commentForm" action="{{ route('admin.rider.store') }}"
                        method="POST" class="form-horizontal">
                      <!-- CSRF Token -->
                      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                      <div id="rootwizard">
                        <h2 class="hidden">&nbsp;</h2>

                        <div class="row">
                          <div class="col-sm-8 animate_rt">
                            <div class="form-group {{ $errors->first('rider_number', 'has-error') }}">
                                <label style="margin-top: 0%" for="rider_number" class="col-sm-2 control-label">Rider No. *
                                </label>
                                <div class="col-sm-10">
                                  <input id="rider_number" name="rider_number" placeholder="Ex. Rd_01" type="text" autocomplete="off" 
                                          class="form-control required" value="{!! old('rider_number') !!}"/>
                                  {!! $errors->first('rider_number', '
                                  <span class="help-block">:message
                                  </span>') !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->first('first_name', 'has-error') }}">
                              <label style="margin-top: 0%" for="first_name" class="col-sm-2 control-label">F.Name *
                              </label>
                              <div class="col-sm-10">
                                <input id="first_name" name="first_name" type="text" autocomplete="off" 
                                        placeholder="first name" class="form-control required"
                                        value="{!! old('first_name') !!}"/>
                                {!! $errors->first('first_name', '
                                <span class="help-block">:message
                                </span>') !!}
                              </div>
                            </div>
                            
                            <div class="form-group {{ $errors->first('second_name', 'has-error') }}">
                              <label style="margin-top: 0%" for="second_name" class="col-sm-2 control-label">S.Name *
                              </label>
                              <div class="col-sm-10">
                                <input id="second_name" name="second_name" type="text" autocomplete="off"  placeholder="second name"
                                        class="form-control required" value="{!! old('second_name') !!}"/>
                                {!! $errors->first('second_name', '
                                <span class="help-block">:message
                                </span>') !!}
                              </div>
                            </div>

                            <div class="form-group {{ $errors->first('third_name', 'has-error') }}">
                              <label style="margin-top: 0%" for="third_name" class="col-sm-2 control-label">Th.Name*
                              </label>
                              <div class="col-sm-10">
                                <input  id="third_name" name="third_name" placeholder="third name" type="text" autocomplete="off" 
                                        class="form-control required " value="{!! old('third_name') !!}"/>
                                {!! $errors->first('third_name', '
                                <span class="help-block">:message
                                </span>') !!}
                              </div>
                            </div>
             

                            <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-4 btn_rtl">
                                <a href="{{ route('admin.rider.index') }}">
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
                          <div class="col-sm-4 animate_rt">                           
                            <div class="form-group {{ $errors->first('gender', 'has-error') }}">
                              <label for="gender" class="col-sm-2 control-label">Gender*
                              </label>
                              <div class="col-sm-10">
                                <select class="form-control" title="Select Gender..." name="gender">
                                  <option value="">Select
                                  </option>
                                  <option value="male"
                                          @if(old('gender') === 'male') selected="selected" @endif >Male
                                  </option>
                                  <option value="female"
                                          @if(old('gender') === 'female') selected="selected" @endif >
                                    Female
                                  </option>
                                </select>
                                {!! $errors->first('gender', '
                                      <span class="help-block">:message
                                      </span>') !!}
                              </div>
                            </div>  

                            <div class="form-group {{ $errors->first('ph_number', 'has-error') }}">
                              <label style="margin-top: -2%" for="ph_number" class="col-sm-2 control-label">Phone No. *
                              </label>
                              <div class="col-sm-10">
                                <input id="ph_number" name="ph_number" placeholder="Ex. 063---" type="text"
                                        class="form-control required" value="{!! old('ph_number') !!}"/>
                                {!! $errors->first('ph_number', '
                                <span class="help-block">:message
                                </span>') !!}
                              </div>
                            </div>                      

                            {{-- <div class="form-group {{ $errors->first('bus_number', 'has-error') }}">
                              <label style="margin-top: -2%" for="bus_number" class="col-sm-2 control-label">Bus No.*
                              </label>
                              <div class="col-sm-10">
                                <select class="form-control" title="Select Pas..." name="bus_number">                                         
                                  <option value="">Select bus_number
                                  </option>
                                  @foreach ($buses as $bus)
                                  <option value="{{ $bus->id}}" 
                                    @if (old('bus_number')=== "{{$bus->id}}") selected="selected"@endif
                                    >{{ $bus->bus_number}}
                                  </option>
                                  @endforeach
                                </select>
                                {!! $errors->first('bus_number', '
                                <span class="help-block">:message
                                </span>') !!}
                              </div>   
                            </div>

                            <div class="form-group {{ $errors->first('station', 'has-error') }}">
                              <label for="station" class="col-sm-2 control-label">Station*
                              </label>
                              <div class="col-sm-10">
                                <select class="form-control" title="Select Station..." name="station">                                         
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
                            </div> --}}

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
  <script src="{{ asset('assets/js/parsley.min.js') }}" type="text/javascript"></script>

@stop
