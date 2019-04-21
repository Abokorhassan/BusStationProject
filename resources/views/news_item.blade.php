@extends('layouts/default')

{{-- Page title --}}
@section('title')
News_Item
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/news.css') }}">
    <link href="{{ asset('assets/vendors/animate/animate.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/blog.css') }}">
    <!--end of page level css-->
@stop

{{-- breadcrumb --}}
@section('top')
    <div class="breadcum">
        <div class="container">
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}"> <i class="livicon icon3 icon4" data-name="home" data-size="18" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i>Dashboard
                    </a>
                </li>
                <li class="hidden-xs">
                    <i class="livicon icon3" data-name="angle-double-right" data-size="18" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c"></i>
                    <a href="#">News Item</a>
                </li>
            </ol>
            <div class="pull-right">
                <i class="livicon icon3" data-name="list-ul" data-size="20" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i> News Item
            </div>
        </div>
    </div>
    @stop


{{-- Page content --}}
@section('content')
    <!-- Container Section Start -->
    <div class="container">
        <div class="row">
            <!-- Jelly-o sesame Section Strat -->
            <div class="col-sm-7 col-md-8 wow zoomIn right_float" data-wow-duration="3.5s">
                <div class="col-md-12">
                    <div class="news_item_image thumbnail">
                        <label>
                            <a href="{{ URL::to('news_item') }}"><h3
                                        class="primary news_headings">{{ $news->title }}</h3></a>
                        </label>
                        @if($news->image)
                            <img src="{{ URL::to('/uploads/news/'.$news->image)  }}" class="img-responsive" alt="Image">
                        @endif
                        <div class="news_item_text_1">
                            <p>
                                {!! $news->content !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                </div>
            </div>
            <div class="col-sm-5 col-md-4 col-full-width-left right_float">
                <!-- Featured Author Section Start -->
                <div class="the-box  no-margin more-padding martop3 wow slideInDown" data-wow-duration="3.5s">
                    <h3>Featured Authors</h3>
                    <br>
                    <div class="row">
                        <div class="col-xs-3 right_float">
                            <p>
                                <a href="#">
                                    <img src="{{ asset('assets/images/authors/avatar.jpg') }}" class="img-responsive img-circle" alt="riot">
                                </a>
                            </p>
                        </div>
                        <!-- /.col-xs-3 -->
                        <div class="col-xs-3 right_float">
                            <p>
                                <a href="#">
                                    <img src="{{ asset('assets/images/authors/avatar1.jpg') }}" class="img-responsive img-circle" alt="riot">
                                </a>
                            </p>
                        </div>
                        <!-- /.col-xs-3 -->
                        <div class="col-xs-3 right_float">
                            <p>
                                <a href="#">
                                    <img src="{{ asset('assets/images/authors/avatar2.jpg') }}" class="img-responsive img-circle" alt="riot">
                                </a>
                            </p>
                        </div>
                        <!-- /.col-xs-3 -->
                        <div class="col-xs-3 right_float">
                            <p>
                                <a href="#">
                                    <img src="{{ asset('assets/images/authors/avatar3.jpg') }}" class="img-responsive img-circle" alt="riot">
                                </a>
                            </p>
                        </div>
                        <!-- /.col-xs-3 -->
                    </div>
                    <!-- /.row -->
                    <button class="btn btn-success btn-block">Browse all author</button>
                </div>
                <!-- //Featured Author Section End -->
                <!-- /.the-box .bg-primary .no-border .text-center .no-margin -->

                <!-- Recent Post Section Start -->
                <div class="the-box wow slideInRight news_padng" data-wow-duration="1.5s">
                    <h3 class="small-heading more-margin-bottom">Recent News</h3>
                    <ul class="media-list">
                        @foreach($recentnews as $item)
                            <li class="media">
                                <div class="media-body">
                                    <div class="media-heading">
                                        <a href="#"><h4 class="primary news_headings">{{ $item->title }}</h4></a>
                                        <h6 class="text-danger">{!! date('d-m-Y', strtotime($item->created_at)) !!}</h6>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Recent Post Section End -->
                
                <div class="the-box wow slideInRight" data-wow-duration="1.5s">
                    <h3>Top Reviews</h3>
                    <div class="tab-pane active" id="tab_default_1">
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="{{ asset('assets/images/image_13.jpg') }}" alt="image">
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="#"><h5 class="media-heading text-primary">Efficiently unleash cross-media information without cross-media value.</h5></a>
                                <h6 class="text-danger">May 13, 2015</h6>
                                <i class="fa fa-star text-primary"></i>
                                <i class="fa fa-star text-primary"></i>
                                <i class="fa fa-star text-primary"></i>
                                <i class="fa fa-star text-primary"></i>
                                <i class="fa fa-star text-primary"></i>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="{{ asset('assets/images/image_14.jpg') }}" alt="image">
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="#"><h5 class="media-heading text-primary">Efficiently unleash cross-media information without cross-media value.</h5>
                                        </a>
                                <h6 class="text-danger">May 12, 2015</h6>
                                <i class="fa fa-star text-primary"></i>
                                <i class="fa fa-star text-primary"></i>
                                <i class="fa fa-star text-primary"></i>
                                <i class="fa fa-star text-primary"></i>
                                <i class="fa fa-star-o text-primary"></i>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="{{ asset('assets/images/image_15.jpg') }}" alt="image">
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="#"><h5 class="media-heading text-primary">Efficiently unleash cross-media information without cross-media value.</h5></a>
                                <h6 class="text-danger">May 11, 2015</h6>
                                <i class="fa fa-star text-primary"></i>
                                <i class="fa fa-star text-primary"></i>
                                <i class="fa fa-star text-primary"></i>
                                <i class="fa fa-star-o text-primary"></i>
                                <i class="fa fa-star-o text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.the-box .no-border -->
            </div>
            <!-- //Jelly-o sesame Section End -->
        </div>
    </div>
    
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('assets/vendors/wow/js/wow.min.js') }}" type="text/javascript"></script>
    <script>
        jQuery(document).ready(function () {
            new WOW().init();
        });
    </script>

@stop
