@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Charts
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')


@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <!--section starts-->
        <h1>Simple Charts</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">Laravel Charts</a>
            </li>
            <li class="active">Simple Charts</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-6 animate_rtl">
                <!-- Stack charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="barchart" data-size="16" data-loop="true" data-c="#fff" data-hc="#fff"></i> Bar Chart
                        </h3>
                        <span class="pull-right">
                            <span class="clickable"> <i class="glyphicon glyphicon-chevron-up showhide"></i></span>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                    </div>
                    <div class="panel-body">
                        <div class="app bar_chart">
                            {!! $bar->html() !!}
                        </div>
                        <!-- End Of Main Application -->

                    </div>
                </div>
            </div>
            <div class="col-lg-6 animate_rtl">
                <!-- Stack charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="barchart" data-size="16" data-loop="true" data-c="#fff" data-hc="#fff"></i> Line Chart
                        </h3>
                        <span class="pull-right">
                            <span class="clickable"><i class="glyphicon glyphicon-chevron-up showhide"></i></span>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                    </div>
                    <div class="panel-body">
                        <div class="app linelrv_chart">
                            {!! $line->html() !!}
                        </div>
                        <!-- End Of Main Application -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 animate_rtl">
                <!-- Stack charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="barchart" data-size="16" data-loop="true" data-c="#fff" data-hc="#fff"></i> Area Chart
                        </h3>
                        <span class="pull-right">
                            <span class="clickable"><i class="glyphicon glyphicon-chevron-up showhide"></i></span>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                    </div>
                    <div class="panel-body">
                        <div class="app">
                            {!! $area->html() !!}
                        </div>
                        <!-- End Of Main Application -->
                    </div>
                </div>
            </div>
            <div class="col-lg-6 animate_rtl">
                <!-- Stack charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="barchart" data-size="16" data-loop="true" data-c="#fff" data-hc="#fff"></i> Pie Chart
                        </h3>
                        <span class="pull-right">
                            <span class="clickable"> <i class="glyphicon glyphicon-chevron-up showhide"></i></span>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                    </div>
                    <div class="panel-body">
                        <div class="app pie_chart">
                            {!! $pie->html() !!}
                        </div>
                        <!-- End Of Main Application -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">

            </div>
        </div>

    </section>
    <!-- content -->
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    {!! Charts::scripts() !!}
    {!! $bar->script() !!}
    {!! $line->script() !!}
    {!! $area->script() !!}
    {!! $pie->script() !!}
@stop