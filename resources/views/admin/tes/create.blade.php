@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    {{-- @lang('news/title.add-news') :: @parent --}}
    Add Test
@stop

{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/vendors/summernote/summernote.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/pages/blog.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}">
    <!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <!--section starts-->
        <h1>Add Tests</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="14"
                                                             data-c="#000" data-loop="true"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">Tests</a>
            </li>
            <li class="active">Add Tests</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content paddingleft_right15">
        <!--main content-->
        <div class="row">
            <div class="the-box no-border">
                <!-- errors -->
                {!! Form::open(array('url' => URL::to('admin/tests'), 'method' => 'post', 'class' => 'bf', 'files'=> true)) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="row">
                    <div class="col-sm-8 animate_rtl">
                        <label>First Name</label>
                        <div class="form-group {{ $errors->first('firstname', 'has-error') }}">
                            {!! Form::text('firstname', null, array('class' => 'form-control input-lg','placeholder'=> trans('blog/form.ph-title'))) !!}
                            <span class="help-block">{{ $errors->first('firstname', ':message') }}</span>
                        </div>

                        <label>last Name</label>
                        <div class="form-group {{ $errors->first('lastname', 'has-error') }}">
                            {!! Form::text('lastname', null, array('class' => 'form-control input-lg','placeholder'=> trans('blog/form.ph-title'))) !!}
                            <span class="help-block">{{ $errors->first('lastname', ':message') }}</span>
                        </div>

                        <label>Email</label>
                        <div class="form-group {{ $errors->first('email', 'has-error') }}">
                            {!! Form::text('email', null, array('class' => 'form-control input-lg','placeholder'=> trans('blog/form.ph-title'))) !!}
                            <span class="help-block">{{ $errors->first('email', ':message') }}</span>
                        </div>  
                         <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-success">Submit Test</button>
                            <a href="{!! URL::to('admin/tests/create') !!}"
                               class="btn btn-danger">Discard</a>
                        </div>
                    </div>

                    <!-- /.col-sm-4 --> 
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <!--main content ends-->
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

@stop