@extends('base')

@section('contenido')
<body class="layout-full-width header-modern sticky-header sticky-white subheader-title-left no-content-padding">
    <!-- Main Theme Wrapper -->
    <div id="Wrapper">
        <!-- Header Wrapper -->
        <div id="Header_wrapper" class="bg-parallax" data-stellar-background-ratio="0.5">
            <!-- Header -->
            <header id="Header">
                @include('barra_navegacion')
            </header>
            <!--Subheader area - only for certain pages -->
            <div id="Subheader">
                <div class="container">
                    <div class="column one">
                        <h1 class="title">Gallery</h1>
                        <!--BreadCrumbs area-->
                        <ul class="breadcrumbs">
                            <li>
                                <a href="{{ route('index') }}">Home</a><span><i class="icon-right-open"></i></span>
                            </li>
                            <li>
                                <a href="{{ route('gallery') }}">Gallery</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content -->
        <div id="Content">
            <div class="content_wrapper clearfix">
                <div class="sections_group">
                    <div class="entry-content">
                        <div class="section" style="padding-top:50px; padding-bottom:20px; background-color:#F7F7F7">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <!-- One full width row-->
                                    <div class="column one column_column">
                                        <div class="column_attr ">

                                            <!-- Image Gallery-->
                                            <div id='gallery-1' class='gallery galleryid-30 gallery-columns-4 gallery-size-thumbnail '>
                                                <!-- Gallery item -->
                                                <dl class='gallery-item'>
                                                    <dt class='gallery-icon landscape'>
															<a href='{{ asset('hotel/images/home_hotel_gallery_1.jpg')}}'><img width="300" height="300" src="{{ asset('hotel/images/home_hotel_gallery_1-300x300.jpg')}}" class="attachment-thumbnail" alt="home_hotel_gallery_1" /></a>
														</dt>
                                                    <dd></dd>
                                                </dl>
                                                <!-- Gallery item -->
                                                <dl class='gallery-item'>
                                                    <dt class='gallery-icon landscape'>
															<a href='{{ asset('hotel/images/home_hotel_gallery_4.jpg')}}'><img width="300" height="300" src="{{ asset('hotel/images/home_hotel_gallery_4-300x300.jpg')}}" class="attachment-thumbnail" alt="home_hotel_gallery_4" /></a>
														</dt>
                                                    <dd></dd>
                                                </dl>
                                                <!-- Gallery item -->
                                                <dl class='gallery-item'>
                                                    <dt class='gallery-icon landscape'>
															<a href='{{ asset('hotel/images/home_hotel_gallery_2.jpg')}}'><img width="300" height="300" src="{{ asset('hotel/images/home_hotel_gallery_2-300x300.jpg')}}" class="attachment-thumbnail" alt="home_hotel_gallery_2" /></a>
														</dt>
                                                    <dd></dd>
                                                </dl>
                                                <!-- Gallery item -->
                                                <dl class='gallery-item'>
                                                    <dt class='gallery-icon landscape'>
															<a href='{{ asset('hotel/images/home_hotel_gallery_5.jpg')}}'><img width="300" height="300" src="{{ asset('hotel/images/home_hotel_gallery_5-300x300.jpg')}}" class="attachment-thumbnail" alt="home_hotel_gallery_5" /></a>
														</dt>
                                                    <dd></dd>
                                                </dl>
                                                <br class="flv_clear_both" />
                                                <!-- Gallery item -->
                                                <dl class='gallery-item'>
                                                    <dt class='gallery-icon landscape'>
															<a href='{{ asset('hotel/images/home_hotel_gallery_6.jpg')}}'><img width="300" height="300" src="{{ asset('hotel/images/home_hotel_gallery_6-300x300.jpg')}}" class="attachment-thumbnail" alt="home_hotel_gallery_6" /></a>
														</dt>
                                                    <dd></dd>
                                                </dl>
                                                <!-- Gallery item -->
                                                <dl class='gallery-item'>
                                                    <dt class='gallery-icon landscape'>
															<a href='{{ asset('hotel/images/home_hotel_gallery_3.jpg')}}'><img width="300" height="300" src="{{ asset('hotel/images/home_hotel_gallery_3-300x300.jpg')}}" class="attachment-thumbnail" alt="home_hotel_gallery_3" /></a>
														</dt>
                                                    <dd></dd>
                                                </dl>
                                                <!-- Gallery item -->
                                                <dl class='gallery-item'>
                                                    <dt class='gallery-icon landscape'>
															<a href='{{ asset('hotel/images/home_hotel_gallery_7.jpg')}}'><img width="300" height="300" src="{{ asset('hotel/images/home_hotel_gallery_7-300x300.jpg')}}" class="attachment-thumbnail" alt="home_hotel_gallery_7" /></a>
														</dt>
                                                    <dd></dd>
                                                </dl>
                                                <br style='clear: both' />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section" style="padding-top:60px; padding-bottom:20px; background-color:#fff">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <!-- One Second (1/2) Column -->
                                    <div class="column one-second column_column">
                                        <div class="column_attr ">
                                            <div style="text-align: center; margin: 20px 50px 0;">
                                                <h2 class="themecolor">Use galleries in any place
													<br>
													you want on website.</h2>
                                                <p>
                                                    <div class="big">
                                                        You can create <span class="tooltip" data-tooltip="Yes, really any!">any galleries</span> you want and put them in any place on page you need. Also galleries can have any rows, columns and items. So let`s create own gallery and do it just like you want.
                                                    </div>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- One Second (1/2) Column -->
                                    <div class="column one-second column_column">
                                        <div class="column_attr ">

                                            <!-- Image Gallery-->
                                            <div id='gallery-2' class='gallery galleryid-30 gallery-columns-3 gallery-size-thumbnail '>
                                                <!-- Gallery item -->
                                                <dl class='gallery-item'>
                                                    <dt class='gallery-icon landscape'>
															<a href='{{ asset('hotel/images/home_hotel_gallery_8.jpg')}}'><img width="300" height="300" src="{{ asset('hotel/images/home_hotel_gallery_8-300x300.jpg')}}" class="attachment-thumbnail" alt="home_hotel_gallery_8" /></a>
														</dt>
                                                    <dd></dd>
                                                </dl>
                                                <!-- Gallery item -->
                                                <dl class='gallery-item'>
                                                    <dt class='gallery-icon landscape'>
															<a href='{{ asset('hotel/images/home_hotel_gallery_9.jpg')}}'><img width="300" height="300" src="{{ asset('hotel/images/home_hotel_gallery_9-300x300.jpg')}}" class="attachment-thumbnail" alt="home_hotel_gallery_9" /></a>
														</dt>
                                                    <dd></dd>
                                                </dl>
                                                <!-- Gallery item -->
                                                <dl class='gallery-item'>
                                                    <dt class='gallery-icon landscape'>
															<a href='{{ asset('hotel/images/home_hotel_gallery_10.jpg')}}'><img width="300" height="300" src="{{ asset('hotel/images/home_hotel_gallery_10-300x300.jpg')}}" class="attachment-thumbnail" alt="home_hotel_gallery_10" /></a>
														</dt>
                                                    <dd></dd>
                                                </dl>
                                                <br class="flv_clear_both" />
                                                <!-- Gallery item -->
                                                <dl class='gallery-item'>
                                                    <dt class='gallery-icon landscape'>
															<a href='{{ asset('hotel/images/home_hotel_gallery_11.jpg')}}'><img width="300" height="300" src="{{ asset('hotel/images/home_hotel_gallery_11-300x300.jpg')}}" class="attachment-thumbnail" alt="home_hotel_gallery_11" /></a>
														</dt>
                                                    <dd></dd>
                                                </dl>
                                                <!-- Gallery item -->
                                                <dl class='gallery-item'>
                                                    <dt class='gallery-icon landscape'>
															<a href='{{ asset('hotel/images/home_hotel_gallery_12.jpg')}}'><img width="300" height="300" src="{{ asset('hotel/images/home_hotel_gallery_12-300x300.jpg')}}" class="attachment-thumbnail" alt="home_hotel_gallery_12" /></a>
														</dt>
                                                    <dd></dd>
                                                </dl>
                                                <!-- Gallery item -->
                                                <dl class='gallery-item'>
                                                    <dt class='gallery-icon landscape'>
															<a href='{{ asset('hotel/images/home_hotel_gallery_13.jpg')}}'><img width="300" height="300" src="{{ asset('hotel/images/home_hotel_gallery_13-300x300.jpg')}}  " class="attachment-thumbnail" alt="home_hotel_gallery_13" /></a>
														</dt>
                                                    <dd></dd>
                                                </dl>
                                                <br class="flv_clear_both" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('footer')
    </div>

    <!-- JS -->
    <script src="{{ asset('hotel/js/jquery-2.1.4.min.js')}}"></script>

    <script src="{{ asset('hotel/js/mfn.menu.js')}}"></script>
    <script src="{{ asset('hotel/js/jquery.plugins.js')}}"></script>
    <script src="{{ asset('hotel/js/jquery.jplayer.min.js')}}"></script>
    <script src="{{ asset('hotel/js/animations/animations.js')}}"></script>
    <script src="{{ asset('hotel/js/scripts.js')}}"></script>

    <script>
        jQuery(window).load(function() {
            var retina = window.devicePixelRatio > 1 ? true : false;
            if (retina) {
                var retinaEl = jQuery("#logo img");
                var retinaLogoW = retinaEl.width();
                var retinaLogoH = retinaEl.height();
                retinaEl.attr("src", "{{ asset('images/retina-hotel.png') }}").width(retinaLogoW).height(retinaLogoH)
            }
        });
    </script>
</body>
@endsection
