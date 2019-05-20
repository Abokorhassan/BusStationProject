@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Edit Bus
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
              <a href="#">Bus
              </a>
            </li>
            <li class="hidden-xs">
              <i class="livicon icon3" data-name="angle-double-right" data-size="18" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c">
              </i>
              <a href="#">Edit Bus
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
        <h2> Edit Bus
          {{-- <strong> Add New Bus </strong>      --}}
        </h2>
        <hr>
        <div class="row margin_right_left">
          <div class="row margin_right_left">
            <div class="col-md-12">
              <!--main content-->
              <div class="position-center">
                <div id="notific">
                  @include('notifications')
                </div>
                <div class="row">
                  <div class="col-sm-8">
                    {!! Form::model($bus, ['url' => URL::to('bus/' . $bus->id), 'method' => 'put',
                      'class' => 'form-horizontal', 'files'=> true]) !!}

                      <!-- CSRF Token -->
                      <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                      <div class="form-group {{ $errors->first('model_type', 'has-error') }}">
                        <label for="model_type" class="col-sm-2 control-label">
                            <strong> Bus Model *
                            </strong>
                        </label>
                        <div class="col-sm-10">
                          {!! Form::text('model_type', null, array('class' => 'form-control required', 'placeholder'=>'Bus Model')) !!}
                          {!! $errors->first('model_type', '
                          <span class="help-block">:message
                          </span>') !!}
                        </div>
                      </div>

                      <div class="form-group {{ $errors->first('bus_number', 'has-error') }}">
                        <label for="bus_number" class="col-sm-2 control-label">
                            <strong>Bus Number * </strong>
                        </label>
                        <div class="col-sm-10">
                          {!! Form::text('bus_number', null, array('class' => 'form-control required', 'placeholder'=>'Bus Number')) !!}
                          {!! $errors->first('bus_number', '
                          <span class="help-block">:message
                          </span>') !!}
                        </div>
                      </div>

                      <div class="form-group {{ $errors->first('Driver_id', 'has-error') }}">
                          <label for="Driver_id" class="col-sm-2 control-label">
                              <strong>Driver Number*
                              </strong>
                          </label>
                          <div class="col-sm-10">
                            {!! Form::select('Driver_id', $opDrivers, null, ['placeholder' => 'Select Station', 'class' => 'form-control required']) !!}
                            {!! $errors->first('Driver_id', '
                            <span class="help-block">:message
                            </span>') !!}
                          </div>
                      </div>

                      <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                          <a class="btn btn-danger" href="{{ route('user.bus.index') }}">
                            @lang('button.cancel')
                          </a>
                          <button class="btn btn-primary" type="submit">Save
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
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function(){
            // $( function() { 
            //     $( "#searchItem" ).autocomplete({
            //         source: 'http://localhost/BSProject/public/bus/search'
            //     });
            // });
            getdata();

            funciton getdata(query = ''){
                $.ajax({
                    url:"http://localhost/BSProject/public/bus/action",
                    method:'GET',
                    data:{query:query},
                    dataType:'json'
                    success:function(data){
                        $('#reocrds').html(data.table_data);
                        $('#total_records').text(data.total_data);
                    }
                })
            }

            $(document).on('keyup', '#search', function(){
                var query = $(this).val();
                getdata(query);
            })
        });
    </script>
@stop
