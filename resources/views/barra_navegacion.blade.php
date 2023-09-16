<!-- Header Top -  Info Area -->
<div id="Action_bar">
    <div class="container">
        <div class="column one">
            <!-- Header - contact info area-->
            <ul class="contact_details">
                <li class="slogan">
                    Have any questions?
                </li>
                <li class="phone">
                    <i class="icon-phone"></i><a href="tel:+61383766284">+61 383 766 284</a>
                </li>
                <li class="mail">
                    <i class="icon-mail-line"></i><a href="mailto:noreply@envato.com">noreply@envato.com</a>
                </li>
                @auth
                <li>
                    <i class="icon-mail-line"></i><a href="{{ route('home') }}">Panel administrativo</a>
                </li>
                @endauth
                @guest
                <li>
                    <i class="icon-mail-line"></i><a href="{{ route('acceder') }}">Acceder</a>
                </li>
                @endguest
                <li>
                    <i class="icon-mail-line"></i><a href="{{ route('registrar') }}">Registrar</a>
                </li>
            </ul>
            <!--Social info area-->
            <ul class="social"">
                <li class="facebook">
                    <a href="#" title="Facebook"><i class="icon-facebook"></i></a>
                </li>
                <li class="googleplus">
                    <a href="#" title="Google+"><i class="icon-gplus"></i></a>
                </li>
                <li class="twitter">
                    <a href="#" title="Twitter"><i class="icon-twitter"></i></a>
                </li>
                <li class="vimeo">
                    <a href="#" title="Vimeo"><i class="icon-vimeo"></i></a>
                </li>
                <li class="youtube">
                    <a href="#" title="YouTube"><i class="icon-play"></i></a>
                </li>
                <li class="flickr">
                    <a href="#" title="Flickr"><i class="icon-flickr"></i></a>
                </li>
                <li class="linkedin">
                    <a href="#" title="LinkedIn"><i class="icon-linkedin"></i></a>
                </li>
                <li class="pinterest">
                    <a href="#" title="Pinterest"><i class="icon-pinterest"></i></a>
                </li>
                <li class="dribbble">
                    <a href="#" title="Dribbble"><i class="icon-dribbble"></i></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Header -  Logo and Menu area -->
<div id="Top_bar">
    <div class="container">
        <div class="column one">
            <div class="top_bar_left clearfix">
                <!-- Logo-->
                <div class="logo">
                    <h1><a id="logo" href="{{ route('index') }}" title="BeHotel - BeTheme"><img class="scale-with-grid" src="{{ asset('hotel/images/hotel.png')}}" alt="BeHotel - BeTheme" /></a></h1>
                </div>
                <!-- Main menu-->
                <div class="menu_wrapper">
                    <nav id="menu">
                        <ul id="menu-main-menu" class="menu">
                            <li class="{{ \Request::route()->getName() == 'index' ? 'current_page_item' : '' }}">
                                <a href="{{ route('index') }}"><span>Home</span></a>
                            </li>
                            <li class="{{ \Request::route()->getName() == 'our-hotel' ? 'current_page_item' : '' }}">
                                <a href="{{ route('our-hotel') }}"><span>Our hotel</span></a>
                            </li>
                            <li class="{{ \Request::route()->getName() == 'rooms' ? 'current_page_item' : '' }}">
                                <a href="{{ route('rooms') }}"><span>Rooms</span></a>
                            </li>
                            <li class="{{ \Request::route()->getName() == 'gallery' ? 'current_page_item' : '' }}">
                                <a href="{{ route('gallery') }}"><span>Gallery</span></a>
                            </li>
                            <li class="{{ \Request::route()->getName() == 'contact-us' ? 'current_page_item' : '' }}">
                                <a href="{{ route('contact-us') }}"><span>Contact us</span></a>
                            </li>
                        </ul>
                    </nav><a class="responsive-menu-toggle" href="#"><i class="icon-menu"></i></a>
                </div>
                <!-- Header Searchform area-->
                <div class="search_wrapper">
                    <form method="get" id="searchform" action="#">
                        <i class="icon_search icon-search"></i><a href="#" class="icon_close"><i class="icon-cancel"></i></a>
                        <input type="text" class="field" name="s" id="s" placeholder="Enter your search" />
                        <input type="submit" class="submit flv_disp_none" value="" />
                    </form>
                </div>
            </div>
            <div class="top_bar_right">
                <div class="top_bar_right_wrapper">
                    <a id="search_button" href="#"><i class="icon-search"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
