@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Edit Test
    @parent
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
        <h1>@lang('news/title.edit')</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="14"
                                                             data-c="#000" data-loop="true"></i>
                    @lang('general.home')
                </a>
            </li>
            <li>
                <a href="#">@lang('news/title.news')</a>
            </li>
            <li class="active">@lang('news/title.edit')</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content paddingleft_right15">
        <!--main content-->
        <div class="row">
            <div class="the-box no-border">
                {!! Form::model($test, ['url' => URL::to('admin/tests/' . $test->id), 'method' => 'put', 'class' => 'bf', 'files'=> true]) !!}
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group {{ $errors->first('first_name', 'has-error') }}">
                            {!! Form::text('first_name', null, array('class' => 'form-control input-lg', 'placeholder'=>trans('blog/form.ph-title'))) !!}
                            <span class="help-block">{{ $errors->first('first_name', ':message') }}</span>
                        </div>

                        <div class="form-group {{ $errors->first('last_name', 'has-error') }}">
                            {!! Form::text('last_name', null, array('class' => 'form-control input-lg', 'placeholder'=>trans('blog/form.ph-title'))) !!}
                            <span class="help-block">{{ $errors->first('last_name', ':message') }}</span>
                        </div>

                        <div class="form-group {{ $errors->first('email', 'has-error') }}">
                            {!! Form::text('email', null, array('class' => 'form-control input-lg', 'placeholder'=>trans('blog/form.ph-title'))) !!}
                            <span class="help-block">{{ $errors->first('email', ':message') }}</span>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success blog_submit">Update</button>
                            <a href="{{ URL::to('admin/news') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                    <!-- /.col-sm-8 -->

                <!-- /.row -->
                {!! Form::close() !!}
            </div>
        </div>
        <!--main content ends-->
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

