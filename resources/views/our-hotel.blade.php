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
                        <h1 class="title">Our hotel</h1>
                        <!--BreadCrumbs area-->
                        <ul class="breadcrumbs">
                            <li>
                                <a href="{{ route('index') }}">Home</a><span><i class="icon-right-open"></i></span>
                            </li>
                            <li>
                                <a href="{{ route('our-hotel') }}">Our hotel</a>
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
                                    <!-- One full width row-->
                                    <div class="column one column_fancy_heading">
                                        <div class="fancy_heading fancy_heading_icon">
                                            <h2 class="title">About us</h2>
                                        </div>
                                    </div>
                                    <!-- One Third (1/3) Column -->
                                    <div class="column one-third column_column">
                                        <div class="column_attr ">
                                            <h3 class="themecolor">Our company</h3>
                                            <p>
                                                <div class="big">
                                                    We are BeantownThemes and we love what we do. We are located in <span class="tooltip" data-tooltip="Mon-Fri 8:00am-6:00pm (GMT +1)">Europe</span> and reply always within 24 hours.
                                                </div>
                                            </p>
                                            <p>
                                                Donec ullamcorper nulla non metus auctor fringilla. Sed posuere consectetur est at lobortis. <span class="tooltip" data-tooltip="Mor porta ac consecteturbi leo risus porta">Morbi leo risus</span> , porta ac consect etur, vestibulum at eros. Donec ullamcorper nulla non metus.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- One Third (1/3) Column -->
                                    <div class="column one-third column_column">
                                        <div class="column_attr ">
                                            <h3 class="themecolor">Mission</h3>
                                            <p>
                                                <div class="big">
                                                    Our mission is very clear - provide best and fully tested products and solutions for our customers
                                                </div>
                                            </p>
                                            <p>
                                                Donec ullamcorper nulla non metus auctor fringilla. Sed posuere consectetur est at lobortis. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Donec ullamcorper nulla non metus.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- One Third (1/3) Column -->
                                    <div class="column one-third column_column">
                                        <div class="column_attr ">
                                            <h3 class="themecolor">Passion</h3>
                                            <p>
                                                <div class="big">
                                                    We love working with WordPress. Themes based on this web software gives unlimited possibilities.
                                                </div>
                                            </p>
                                            <p>
                                                Donec ullamcorper nulla non metus auctor fringilla. Sed posuere consectetur est at lobortis. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Donec ullamcorper nulla non metus.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- Page devider -->
                                    <!-- One full width row-->
                                    <div class="column one column_divider">
                                        <hr class="hrmargin_b_40" />
                                    </div>
                                    <!-- One full width row-->
                                    <div class="column one column_column">
                                        <div class="column_attr ">
                                            <h2 style="text-align: center; margin-bottom: 0;">We provide awesomness!</h2>
                                        </div>
                                    </div>
                                    <!-- One full width row-->
                                    <div class="column one column_slider">
                                        <div class="content_slider ">
                                            <ul class="content_slider_ul">
                                                <li class="content_slider_li_1"><img width="890" height="470" src="{{ asset('hotel/images/home_hotel_gallery_7-890x470.jpg')}}" class="scale-with-grid wp-post-image" alt="home_hotel_gallery_7" />
                                                </li>
                                                <li class="content_slider_li_2"><img width="890" height="470" src="{{ asset('hotel/images/home_hotel_gallery_4-890x470.jpg')}}" class="scale-with-grid wp-post-image" alt="home_hotel_gallery_4" />
                                                </li>
                                                <li class="content_slider_li_3"><img width="890" height="470" src="{{ asset('hotel/images/home_hotel_gallery_4-890x470.jpg')}}" class="scale-with-grid wp-post-image" alt="home_hotel_gallery_4" />
                                                </li>
                                            </ul><a class="button button_js slider_prev" href="#"><span class="button_icon"><i class="icon-left-open-big"></i></span></a><a class="button button_js slider_next" href="#"><span class="button_icon"><i class="icon-right-open-big"></i></span></a>
                                            <div class="slider_pagination"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section highlight-left " style="padding-top:0px; padding-bottom:0px; background-color:#F5ECE6">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <!-- One Second (1/2) Column -->
                                    <div class="column one-second column_column">
                                        <div class="column_attr align_center">
                                            <div class="dark" style="padding: 50px 7% 0;">
                                                <h2>Client testimonials</h2>
                                                <p class="big">
                                                    Vestibulum quis nulla tortor. Donec diam leo, bibendum a risus et, interdum iaculis ligula. Donec ultricies elit ultricies est sollicitudin, et dignissim metus.
                                                </p>
                                                <a class="button button_left button_js" href="#"><span class="button_icon"><i class="icon-link" ></i></span><span class="button_label">See more</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- One Second (1/2) Column -->
                                    <div class="column one-second column_column">
                                        <div class="column_attr ">
                                            <div style="padding: 50px 7% 0;">
                                                <div class="blockquote">
                                                    <blockquote>
                                                        Sed elementum ante et lectus sagittis rhoncus! Sed eu mollis metus, et luctus eros. Duis ut dolor eleifend, scelerisque sapien vel, convallis sem. Etiam nullam.
                                                    </blockquote>
                                                    <p class="author">
                                                        <i class="icon-user"></i><span>Alice Boyd</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section sections_style_4">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <!-- One Fourth (1/4) Column -->
                                    <div class="column one-fourth column_quick_fact">
                                        <!-- Counter area-->
                                        <div class="quick_fact animate-math">
                                            <div class="number" data-to="58">
                                                0
                                            </div>
                                            <h3 class="title">rooms</h3>
                                            <hr class="hr_narrow" />
                                            <div class="desc">
                                                Donec vestibulum justo a diam ultricies pel lentesque. Quisque mattis diam vel lac.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- One Fourth (1/4) Column -->
                                    <div class="column one-fourth column_quick_fact">
                                        <!-- Counter area-->
                                        <div class="quick_fact animate-math">
                                            <div class="number" data-to="7">
                                                0
                                            </div>
                                            <h3 class="title">conference rooms</h3>
                                            <hr class="hr_narrow" />
                                            <div class="desc">
                                                Donec vestibulum justo a diam ultricies pel lentesque. Quisque mattis diam vel lac.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- One Fourth (1/4) Column -->
                                    <div class="column one-fourth column_quick_fact">
                                        <!-- Counter area-->
                                        <div class="quick_fact animate-math">
                                            <div class="number" data-to="286">
                                                0
                                            </div>
                                            <h3 class="title">guests</h3>
                                            <hr class="hr_narrow" />
                                            <div class="desc">
                                                Donec vestibulum justo a diam ultricies pel lentesque. Quisque mattis diam vel lac.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- One Fourth (1/4) Column -->
                                    <div class="column one-fourth column_quick_fact">
                                        <!-- Counter area-->
                                        <div class="quick_fact animate-math">
                                            <div class="number" data-to="34">
                                                0
                                            </div>
                                            <h3 class="title">years of experience</h3>
                                            <hr class="hr_narrow" />
                                            <div class="desc">
                                                Donec vestibulum justo a diam ultricies pel lentesque. Quisque mattis diam vel lac.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page devider -->
                                    <!-- One full width row-->
                                    <div class="column one column_divider">
                                        <hr class="no_line hrmargin_b_25" />
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
                retinaEl.attr("src", "{{ asset('hotel/images/retina-hotel.png') }}").width(retinaLogoW).height(retinaLogoH)
            }
        });
    </script>
</body>
@endsection
