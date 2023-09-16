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
                        <h1 class="title">Contact us</h1>
                        <!--BreadCrumbs area-->
                        <ul class="breadcrumbs">
                            <li>
                                <a href="{{ route('index') }}">Home</a><span><i class="icon-right-open"></i></span>
                            </li>
                            <li>
                                <a href="{{ route('contact-us') }}">Contact us</a>
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
                        <div class="section full-width sections_style_0 ">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <!-- One full width row-->
                                    <div class="column one column_map">

                                        <!-- Google map area -->
                                        <div class="google-map-wrapper no_border">
                                            <div class="google-map" id="google-map-area-552067321bc7c" style="width:100%; height:500px;">
                                                &nbsp;
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section" style="padding-top:40px; padding-bottom:0px; background-color:#F5ECE6">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <!-- One full width row-->
                                    <div class="column one column_column">
                                        <div class="column_attr align_center">
                                            <h2 style="margin: 0; color: #6c3719;">Call us +61 (0) 3 8376 6284</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section" style="padding-top:50px; padding-bottom:0px; ">
                            <div class="section_wrapper clearfix">
                                <div class="items_group clearfix">
                                    <!-- One Fourth (1/4) Column -->
                                    <div class="column one-fourth column_contact_box">
                                        <div class="get_in_touch" style="background-image:url({{ asset('hotel/images/get_in_touch.png')}});">
                                            <h3>Get in touch</h3>
                                            <div class="get_in_touch_wrapper">
                                                <ul>
                                                    <li class="address">
                                                        <span class="icon"><i class="icon-location"></i></span><span class="address_wrapper"><strong>Envato</strong>
																<br>
																Level 13, 2 Elizabeth St,
																<br>
																Melbourne, Victoria 3000 Australia</span>
                                                    </li>
                                                    <li class="phone">
                                                        <span class="icon"><i class="icon-phone"></i></span>
                                                        <p>
                                                            <a href="tel:+61(0)791803458">+61 (0) 7 9180 3458</a>
                                                        </p>
                                                    </li>
                                                    <li class="mail">
                                                        <span class="icon"><i class="icon-mail"></i></span>
                                                        <p>
                                                            <a href="mailto:noreply@envato.com">noreply@envato.com</a>
                                                        </p>
                                                    </li>
                                                    <li class="www">
                                                        <span class="icon"><i class="icon-link"></i></span>
                                                        <p>
                                                            <a target="_blank" href="http://envato.com/">http://envato.com/</a>
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- One Second (1/2) Column -->
                                    <div class="column one-second column_column">
                                        <div class="column_attr ">
                                            <h4>Send us a message</h4>
                                            <div id="contactWrapper" >
											<form id="contactform">
												<div class="column one-second">
													<input placeholder="Your name" type="text" name="name" id="name" size="40" aria-required="true" aria-invalid="false" />
												</div>
												<div class="column one-second">
													<input placeholder="Your e-mail" type="email" name="email" id="email" size="40" aria-required="true" aria-invalid="false" />
												</div>
												<div class="column one">
													<input placeholder="Subject" type="text" name="subject" id="subject" size="40" aria-invalid="false" />
												</div>
												<div class="column one">
													<textarea placeholder="Message" name="body" id="body" style="width:100%;" rows="10" aria-invalid="false"></textarea>
												</div>
												<div class="column one">
													<input type="button" value="Send A Message" id="submit" onClick="return check_values();">
												</div>
											</form>
										</div>
                                        </div>
                                    </div>
                                    <!-- One Fourth (1/4) Column -->
                                    <div class="column one-fourth column_column">
                                        <div class="column_attr ">
                                            <h4>You are welcome</h4>
                                            <p>
                                                Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.
                                            </p>
                                            <hr class="no_line hrmargin_b_30" />
                                            <div style="text-align: center;">
                                                <h4>Reception:</h4>
                                                <p class="themecolor" style="font-size: 60px; line-height: 60px; font-family: Patua One;">
                                                    24h
                                                </p>
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

    <script src="http://maps.google.com/maps/api/js?sensor=false&ver=5.9"></script>
	<script src="{{ asset('hotel/js/email.js')}}"></script>

    <script>
        function google_maps_552067321bc7c() {
            var latlng = new google.maps.LatLng(-33.8710, 151.2039);
            var myOptions = {
                zoom: 13,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                styles: [{
                    "featureType": "landscape",
                    "elementType": "labels",
                    "stylers": [{
                        "visibility": "off"
                    }]
                }, {
                    "featureType": "transit",
                    "elementType": "labels",
                    "stylers": [{
                        "visibility": "off"
                    }]
                }, {
                    "featureType": "poi",
                    "elementType": "labels",
                    "stylers": [{
                        "visibility": "off"
                    }]
                }, {
                    "featureType": "water",
                    "elementType": "labels",
                    "stylers": [{
                        "visibility": "off"
                    }]
                }, {
                    "featureType": "road",
                    "elementType": "labels.icon",
                    "stylers": [{
                        "visibility": "off"
                    }]
                }, {
                    "stylers": [{
                        "hue": "#00aaff"
                    }, {
                        "saturation": -100
                    }, {
                        "gamma": 2.15
                    }, {
                        "lightness": 12
                    }]
                }, {
                    "featureType": "road",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "visibility": "on"
                    }, {
                        "lightness": 24
                    }]
                }, {
                    "featureType": "road",
                    "elementType": "geometry",
                    "stylers": [{
                        "lightness": 57
                    }]
                }],
                zoomControl: true,
                mapTypeControl: false,
                streetViewControl: false,
                scrollwheel: false
            };
            var map = new google.maps.Map(document.getElementById("google-map-area-552067321bc7c"), myOptions);
            var marker = new google.maps.Marker({
                position: latlng,
                icon: "{{ asset('hotel/images/home_hotel_pin.png')}}",
                map: map
            });
        }


        jQuery(document).ready(function($) {
            google_maps_552067321bc7c();
        });
    </script>

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
