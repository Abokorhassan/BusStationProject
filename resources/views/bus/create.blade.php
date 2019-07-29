@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Add Bus
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
              <a href="#">Add Bus
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
        <h2> Add New Bus
          {{-- <strong> Add New Bus </strong>      --}}
        </h2>
        <hr>
        <div class="row margin_right_left">
          <div class="row margin_right_left">
            <div class="col-md-12">
              <!--main content-->
              <div class="position-center">
                <div class="row">

                  <div class="col-sm-8">
                    <form id="commentForm" action="{{ route('user.bus.store') }}"
                          method="POST" class="form-horizontal">
                      <!-- CSRF Token -->
                      <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                      <div class="form-group {{ $errors->first('model_type', 'has-error') }}">
                        <label for="name" class="col-sm-2 control-label"> 
                          <strong> Model Type *
                          </strong>
                        </label>
                        <div class="col-sm-10">
                          <input id="model_type" name="model_type" type="text"
                                 placeholder="Model Type" class="form-control required"
                                 value="{!! old('model_type') !!}"/>
                          {!! $errors->first('model_type', '
                          <span class="help-block">:message
                          </span>') !!}
                        </div>
                      </div>

                      <div class="form-group {{ $errors->first('bus_number', 'has-error') }}">
                        <label for="bus_number" class="col-sm-2 control-label">
                          <strong>Bus Number *
                          </strong>
                        </label>
                        <div class="col-sm-10">
                          <input id="bus_number" name="bus_number" type="text" placeholder="Bus Number"
                                 class="form-control required" value="{!! old('bus_number') !!}"/>
                          {!! $errors->first('bus_number', '
                          <span class="help-block">:message
                          </span>') !!}
                        </div>
                      </div>
                      
                      <div class="form-group {{ $errors->first('driver_number', 'has-error') }}">
                        <label for="driver_number" class="col-sm-2 control-label">
                          <strong>Driver *
                          </strong>
                        </label>
                        <div class="col-sm-10">
                          <select class="form-control" title="Select Pas..." name="driver_number">                                         
                            <option value="">Select Driver number
                            </option>
                            @foreach ($drivers as $driver)
                            <option value="{{ $driver->id}}" 
                                    @if (old('driver_number')=== "{{$driver->id}}") selected="selected"@endif
                                    >{{ $driver->driver_number}}
                            </option>
                            @endforeach
                          </select>
                          {!! $errors->first('driver_number', '
                          <span class="help-block">:message
                          </span>') !!}
                        </div>   
                      </div>
                      {{-- 
                      <div class="form-group {{ $errors->first('first_name', 'has-error') }}">
                        <label class="col-lg-2 control-label">
                          First Name:
                          <span class='require'>*
                          </span>
                        </label>
                        <div class="col-lg-6">
                          <div class="input-group">
                            <span class="input-group-addon">
                              <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#418bca" data-hc="#418bca">
                              </i>
                            </span>
                            <input type="text" placeholder=" " name="first_name" id="u-name"
                                   class="form-control" value="{!! old('first_name',$user->first_name) !!}">
                          </div>
                          <span class="help-block">{{ $errors->first('first_name', ':message') }}
                          </span>
                        </div>
                      </div>
                      <div class="form-group {{ $errors->first('last_name', 'has-error') }}">
                        <label class="col-lg-2 control-label">
                          Last Name:
                          <span class='require'>*
                          </span>
                        </label>
                        <div class="col-lg-6">
                          <div class="input-group">
                            <span class="input-group-addon">
                              <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#418bca" data-hc="#418bca">
                              </i>
                            </span>
                            <input type="text" placeholder=" " name="last_name" id="u-name"
                                   class="form-control"
                                   value="{!! old('last_name',$user->last_name) !!}">
                          </div>
                          <span class="help-block">{{ $errors->first('last_name', ':message') }}
                          </span>
                        </div>
                      </div>
                      <div class="form-group {{ $errors->first('email', 'has-error') }}">
                        <label class="col-lg-2 control-label">
                          Email:
                          <span class='require'>*
                          </span>
                        </label>
                        <div class="col-lg-6">
                          <div class="input-group">
                            <span class="input-group-addon">
                              <i class="livicon" data-name="mail" data-size="16" data-loop="true" data-c="#418bca" data-hc="#418bca">
                              </i>
                            </span>
                            <input type="text" placeholder=" " id="email" name="email" class="form-control"
                                   value="{!! old('email',$user->email) !!}">
                          </div>
                          <span class="help-block">{{ $errors->first('email', ':message') }}
                          </span>
                        </div>
                      </div>
                      <div class="form-group {{ $errors->first('password', 'has-error') }}">
                        <p class="text-warning col-md-offset-2">
                          <strong>If you don't want to change password... please leave them empty
                          </strong>
                        </p>
                        <label class="col-lg-2 control-label">
                          Password:
                          <span class='require'>*
                          </span>
                        </label>
                        <div class="col-lg-6">
                          <div class="input-group">
                            <span class="input-group-addon">
                              <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#418bca" data-hc="#418bca">
                              </i>
                            </span>
                            <input type="password" name="password" placeholder=" " id="pwd" class="form-control">
                          </div>
                          <span class="help-block">{{ $errors->first('password', ':message') }}
                          </span>
                        </div>
                      </div>
                      <div class="form-group {{ $errors->first('password_confirm', 'has-error') }}">
                        <label class="col-lg-2 control-label">
                          Confirm Password:
                          <span class='require'>*
                          </span>
                        </label>
                        <div class="col-lg-6">
                          <div class="input-group">
                            <span class="input-group-addon">
                              <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#418bca" data-hc="#418bca">
                              </i>
                            </span>
                            <input type="password" name="password_confirm" placeholder=" " id="cpwd" class="form-control">
                          </div>
                          <span class="help-block">{{ $errors->first('password_confirm', ':message') }}
                          </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Gender: 
                        </label>
                        <div class="col-lg-6">
                          <div class="radio">
                            <label>
                              <input type="radio" name="gender" value="male" @if($user->gender === "male") checked="checked" @endif />
                              Male
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="gender" value="female" @if($user->gender === "female") checked="checked" @endif />
                              Female
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="gender" value="other" @if($user->gender === "other") checked="checked" @endif />
                              Other
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group  {{ $errors->first('bio', 'has-error') }}">
                        <label for="" class="col-lg-2 control-label">Bio 
                          <small>(brief intro):
                          </small>
                        </label>
                        <div class="col-lg-6">
                          <textarea name="bio" id="bio" class="form-control resize_vertical"
                                    rows="4">{!! old('bio', $user->bio) !!}
                          </textarea>
                        </div>
                        {!! $errors->first('bio', '
                        <span class="help-block">:message
                        </span>') !!}
                      </div>
                      <div>
                        <h3 class="text-primary" id="title">Contact: 
                        </h3>
                      </div>
                      <div class="form-group {{ $errors->first('address', 'has-error') }}">
                        <label class="col-lg-2 control-label">
                          Address:
                        </label>
                        <div class="col-lg-6">
                          <textarea rows="5" cols="30" class="form-control resize_vertical" id="add1"
                                    name="address">{!! old('address',$user->address) !!}
                          </textarea>
                        </div>
                        <span class="help-block">{{ $errors->first('address', ':message') }}
                        </span>
                      </div>
                      <div class="form-group {{ $errors->first('country', 'has-error') }}">
                        <label class="control-label  col-lg-2">Select Country: 
                        </label>
                        <div class="col-lg-6">
                          {!! Form::select('country', $countries, $user->country,['class' => 'form-control select2', 'id' => 'countries']) !!}
                          <span class="help-block">{{ $errors->first('country', ':message') }}
                          </span>
                        </div>
                      </div>
                      <div class="form-group {{ $errors->first('state', 'has-error') }}">
                        <label class="col-lg-2 control-label" for="state">State:
                        </label>
                        <div class="col-lg-6">
                          <div class="input-group">
                            <span class="input-group-addon">
                              <i class="livicon" data-name="plus-alt" data-size="16" data-loop="true" data-c="#418bca" data-hc="#418bca">
                              </i>
                            </span>
                            <input type="text" placeholder=" " id="state" class="form-control" name="state"
                                   value="{!! old('state',$user->state) !!}"/>
                          </div>
                        </div>
                        <span class="help-block">{{ $errors->first('state', ':message') }}
                        </span>
                      </div>
                      <div class="form-group {{ $errors->first('city', 'has-error') }}">
                        <label class="col-lg-2 control-label" for="city">City:
                        </label>
                        <div class="col-lg-6">
                          <div class="input-group">
                            <span class="input-group-addon">
                              <i class="livicon" data-name="plus-alt" data-size="16" data-loop="true" data-c="#418bca" data-hc="#418bca">
                              </i>
                            </span>
                            <input type="text" placeholder=" " id="city" class="form-control" name="city"
                                   value="{!! old('city',$user->city) !!}"/>
                          </div>
                        </div>
                        <span class="help-block">{{ $errors->first('city', ':message') }}
                        </span>
                      </div>
                      <div class="form-group {{ $errors->first('postal', 'has-error') }}">
                        <label class="col-lg-2 control-label" for="postal">Postal:
                        </label>
                        <div class="col-lg-6">
                          <div class="input-group">
                            <span class="input-group-addon">
                              <i class="livicon" data-name="plus-alt" data-size="16" data-loop="true" data-c="#418bca" data-hc="#418bca">
                              </i>
                            </span>
                            <input type="text" placeholder=" " id="postal" class="form-control"
                                   name="postal" value="{!! old('postal',$user->postal) !!}"/>
                          </div>
                          <span class="help-block">{{ $errors->first('postal', ':message') }}
                          </span>
                        </div>
                      </div>
                      <div class="form-group {{ $errors->first('dob', 'has-error') }}">
                        <label class="col-lg-2 control-label">
                          DOB:
                        </label> --}}
                        {{-- 
                        <div class="col-lg-6">
                          <div class="input-group">
                            <span class="input-group-addon">
                              <i class="livicon" data-name="calendar" data-size="16" data-loop="true" data-c="#418bca" data-hc="#418bca">
                              </i>
                            </span>
                            @if($user->dob === '')
                            {!!  Form::text('dob', null, array('id' => 'datepicker','class' => 'form-control'))  !!}
                            @else
                            {!!  Form::text('dob', old('dob',$user->dob), array('id' => 'datepicker','class' => 'form-control', 'data-date-format'=> 'YYYY-MM-DD'))  !!}
                            @endif
                          </div>
                          <span class="help-block">{{ $errors->first('dob', ':message') }}
                          </span>
                        </div>
                      </div> --}}
                      <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <a href="{{ route('user.bus.index') }}">
                                <button type="button" class="btn btn-danger">
                                  Cancel 
                                </button>
                            </a>
                          <button class="btn btn-primary" type="submit">Save
                          </button>
                        </div>
                      </div>
                    </form>{{--{!!  Form::close()  !!}--}}
                  </div>

                  <div class="col-md-4 right_float ">
                      <h3 class="martop">Recent Buses</h3>
                      <div style="height: 22em; overflow: auto" class="tabbable-panel">
                          <!-- Tabbablw-line Start -->
                          <div  class="tabbable-line ">
                              @foreach ($busLatest as $bus)
                                <ul id="myList" class="list-group">
                                    <li class="list-group-item">{{ $bus->bus_number}}</li>
                                </ul>
                            @endforeach
                              
                                  
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
    <script type="text/javascript">
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
