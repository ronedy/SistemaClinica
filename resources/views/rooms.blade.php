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
                        <h1 class="title">Rooms</h1>
                        <!--BreadCrumbs area-->
                        <ul class="breadcrumbs">
                            <li>
                                <a href="{{ route('index') }}">Home</a><span><i class="icon-right-open"></i></span>
                            </li>
                            <li>
                                <a href="{{ route('rooms') }}">Rooms</a>
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
                        <div class="section" style="padding-top:50px; padding-bottom:0px; ">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <!-- One Sixth (1/6) Column -->
                                    <div class="column one-sixth column_column">
                                        <div class="column_attr "></div>
                                    </div>
                                    <!-- Two Third (2/3) Column -->
                                    <div class="column two-third column_column">
                                        <div class="column_attr ">
                                            <h5>Lorem ipsum dolor sit amet leo sed wisi eget tempus dictum orci. Donec pulvinar felis, ullamcorper in, dapibus vitae, bibendum blandit, quam. Nulla aliquet lorem. In hac habitasse platea dictumst. Praesent rhoncus libero ornare sollicitudin. Nullam laoreet ultricies feugiat, quam ultrices posuere cubilia</h5>
                                            <p class="big">
                                                Aenean libero. Etiam blandit risus commodo et, elementum vel, accumsan fringilla odio. Nam diam. Aliquam eleifend, ligula. Donec id pharetra varius. Quisque in enim. Sed pulvinar nec, molestie ultricies dolor sit amet, varius vitae, placerat nisl ac quam nulla, at consequat auctor ligula. Sed porttitor. Class aptent taciti sociosqu ad litora torquent per inceptos hymenaeos. Phasellus in volutpat a, vestibulum ac, accumsan odio ac nunc. Fusce condimentum dignissim. Morbi eleifend. Nulla et magnis dis parturient montes.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section full-width sections_style_0 ">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <!-- One full width row-->
                                    <div class="column one column_image">
                                        <div class="image_frame no_link scale-with-grid aligncenter no_border">
                                            <div class="image_wrapper"><img class="scale-with-grid" src="{{ asset('hotel/images/home_hotel_room_1.jpg')}}" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section" style="padding-top:60px; padding-bottom:20px; background-color:#fff">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <!-- One full width row-->
                                    <div class="column one column_fancy_heading">
                                        <div class="fancy_heading fancy_heading_icon">
                                            <h2 class="title">Twin Room <span style="font-size: 30px; position: relative; margin-left: 10px; top: -10px;" class="themecolor">50$ / night</span></h2>
                                            <div class="inside">
                                                <p class="big">
                                                    <i class="icon-params-line themecolor"></i> Air Conditioning, <i class="icon-monitor themecolor"></i> Flat-screen TV
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- One Second (1/2) Column -->
                                    <div class="column one-second column_column">
                                        <div class="column_attr ">
                                            <h5>Lorem ipsum dolor sit amet enim. Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Quisque lorem tortor fringilla sed, vestibulum id, eleifend justo vel bibendum.</h5>
                                            <p class="big">
                                                Curabitur et ligula. Ut molestie a, ultricies porta urna. Vestibulum commodo volutpat a, convallis ac, laoreet enim. Phasellus fermentum in, dolor. Pellentesque facilisis. Nulla imperdiet sit amet magna. Vestibulum dapibus, mauris nec malesuada fames ac turpis velit, rhoncus eu, luctus et interdum adipiscing wisi.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- One Fourth (1/4) Column -->
                                    <div class="column one-fourth column_counter">
                                        <div class="counter animate-math counter_vertical">
                                            <div class="icon_wrapper">
                                                <i class="icon-users"></i>
                                            </div>
                                            <div class="desc_wrapper">
                                                <div class="number-wrapper">
                                                    <span class="number" data-to="2">0</span>
                                                </div>
                                                <p class="title">
                                                    Standard occupancy
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- One Fourth (1/4) Column -->
                                    <div class="column one-fourth column_counter">
                                        <div class="counter animate-math counter_vertical">
                                            <div class="icon_wrapper">
                                                <i class="icon-home"></i>
                                            </div>
                                            <div class="desc_wrapper">
                                                <div class="number-wrapper">
                                                    <span class="number" data-to="36">0</span>
                                                </div>
                                                <p class="title">
                                                    Rooms
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section full-width sections_style_0 ">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <!-- One full width row-->
                                    <div class="column one column_hover_color">
                                        <div class="hover_color" style="background:#ed703a;">
                                            <div class="hover_color_bg" style="background:#83594c;">
                                                <a href="#">
                                                    <div class="hover_color_wrapper">
                                                        <h3 style="margin: 10px; color: #fff;">See details</h3>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section full-width sections_style_0 ">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <!-- One full width row-->
                                    <div class="column one column_image">
                                        <div class="image_frame no_link scale-with-grid aligncenter no_border">
                                            <div class="image_wrapper"><img class="scale-with-grid" src="{{ asset('hotel/images/home_hotel_room_2.jpg')}}" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section" style="padding-top:60px; padding-bottom:20px; background-color:#fff">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <!-- One full width row-->
                                    <div class="column one column_fancy_heading">
                                        <div class="fancy_heading fancy_heading_icon">
                                            <h2 class="title">Deluxe Double <span style="font-size: 30px; position: relative; margin-left: 10px; top: -10px;" class="themecolor">70$ / night</span></h2>
                                            <div class="inside">
                                                <p class="big">
                                                    <i class="icon-params-line themecolor"></i> Air Conditioning, <i class="icon-monitor themecolor"></i> Flat-screen TV, <i class="icon-eye themecolor"></i> Balcony with view
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- One Second (1/2) Column -->
                                    <div class="column one-second column_column">
                                        <div class="column_attr ">
                                            <h5>Lorem ipsum dolor sit amet enim. Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Quisque lorem tortor fringilla sed, vestibulum id, eleifend justo vel bibendum.</h5>
                                            <p class="big">
                                                Curabitur et ligula. Ut molestie a, ultricies porta urna. Vestibulum commodo volutpat a, convallis ac, laoreet enim. Phasellus fermentum in, dolor. Pellentesque facilisis. Nulla imperdiet sit amet magna. Vestibulum dapibus, mauris nec malesuada fames ac turpis velit, rhoncus eu, luctus et interdum adipiscing wisi.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- One Fourth (1/4) Column -->
                                    <div class="column one-fourth column_counter">
                                        <div class="counter animate-math counter_vertical">
                                            <div class="icon_wrapper">
                                                <i class="icon-users"></i>
                                            </div>
                                            <div class="desc_wrapper">
                                                <div class="number-wrapper">
                                                    <span class="number" data-to="2">0</span>
                                                </div>
                                                <p class="title">
                                                    Standard occupancy
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- One Fourth (1/4) Column -->
                                    <div class="column one-fourth column_counter">
                                        <div class="counter animate-math counter_vertical">
                                            <div class="icon_wrapper">
                                                <i class="icon-home"></i>
                                            </div>
                                            <div class="desc_wrapper">
                                                <div class="number-wrapper">
                                                    <span class="number" data-to="27">0</span>
                                                </div>
                                                <p class="title">
                                                    Rooms
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section full-width sections_style_0 ">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <!-- One full width row-->
                                    <div class="column one column_hover_color">
                                        <div class="hover_color" style="background:#ed703a;">
                                            <div class="hover_color_bg" style="background:#83594c;">
                                                <a href="#">
                                                    <div class="hover_color_wrapper">
                                                        <h3 style="margin: 10px; color: #fff;">See details</h3>
                                                    </div>
                                                </a>
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
