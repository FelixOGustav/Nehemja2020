<!DOCTYPE html>
<!-- 
****************************************************************************************
*                                                                                      *
*    Bygd av Gustav Råkeberg och Felix Brunnegård med Laravel och twitter bootstrap    *
*                                                                                      *
****************************************************************************************
-->
<html>
<head lang="sv">
    <meta charset="ISO-8859-1">
    <!-- csrf token-->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <link rel="icon" href="{{URL::asset('img/Explore-favicon.png')}}"  type="img/PNG">

    <meta name="author" content="Gustav Råkeberg, Felix Brunnegård">
    <meta name="description" content="Nehemja 2020 är ett scoutläger som arrangeras av equmeniakyrkans församlingar i trakten kring Herrljunga, Vårgårda och Alingsås. Veckan bjuder på skidåkning, Gud-snack, lägerstämning, bibel, gamla och nya vänner, aktiviteter, slappa-tid och mängder med tillfällen att njuta av livet!">
    <meta property="og:url" content="https://nehemja2020.se/app">
    <meta property="og:site_name" content="Nehemja2020">
    <meta property="og:title" content="Nehemja 2020">
    <meta property="og:description" content="Nehemja 2020 är ett sommarläger som arrangeras av equmeniakyrkans församlingar i trakten kring Herrljunga, Vårgårda och Alingsås. Veckan bjuder på skidåkning, Gud-snack, lägerstämning, bibel, gamla och nya vänner, aktiviteter, slappa-tid och mängder med tillfällen att njuta av livet!">

    <meta name="theme-color" content="#606569">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-startup-image" content="{{URL::asset('img/Explore-favicon.png')}}">
    <link rel="apple-touch-icon image_src" href="{{URL::asset('img/Explore-favicon.png')}}">

    <!-- CSS links-->
    <link rel="stylesheet" href="{{URL::asset('css/app.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/fonts.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/navbarcstyle.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/footerstyle.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/mainstyle.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/registerstyle.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/mainSideMenu.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/loadingscreenstyle.css')}}">

    <title>{{config('app.name', 'Nehemja2020')}}</title>
</head>
<body>
    <div class="mainBG"></div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="{{URL::asset('js/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>

    <!-- Loading content -->
    <div class="loadingBG" id="loadingScreen">
            <div class="box">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <h3 class="loadingE">E</h3>
    </div>
    <!-- Loading content  end-->

    {{-- Navbar 
    <div class="navbar navbar-expand-lg navbar-light navbarBG fixed-top navbar-custom">
        <div>
            <a class="navbar-brand"  id="scrollToTopLogo" href="{{$links['navLogoLink'] ?? '/'}}"><img src="{{URL::asset('img/branaslagret.svg')}}" height="40" class="d-inline-block align-top"></a>
        </div>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarBasic" aria-controls="navbarBasic" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarBasic">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link nav-item-custom ElkwoodNavbar navbarItemSpacing" href="{{$links['infoLink'] ?? "/#branaslagretInfo"}}" id="scrollToBranaslagretBtn">Branäslägret?</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-item-custom ElkwoodNavbar navbarItemSpacing" href="{{$links['prisLink'] ?? "/#prisInfo"}}" id="scrollToPrisBtn">Pris <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-item-custom ElkwoodNavbar navbarItemSpacing" href="{{$links['reglerLink'] ?? "/#ReglerInfo"}}" id="scrollToReglerBtn">Regler</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-item-custom ElkwoodNavbar navbarItemSpacing" href="{{$links['faqLink'] ?? "/#faqInfo"}}" id="scrollTofaqBtn">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-item-custom ElkwoodNavbar navbarItemSpacing" href="{{$links['kontaktLink'] ?? "/#KontaktInfo"}}" id="scrollToKontaktBtn">Kontakt</a>
                </li>
            </ul>
        </div>
    </div>
--}}
    <!-- Navbar end -->

    <!-- Main Site Content -->
    <div class="wrapper" style="color: white;">
        <!-- Sidebar -->
        <div id="sidebar" class="hidden" style="overflow-y: auto;">
            <div class="sidebarName">
                <a href="{{$links['navLogoLink'] ?? '/'}}" class="scrollToTop">EXPLORE</a>
            </div>

            <!-- Menu navigation buttons -->
            <ul style="padding: 0px;">
                <li class="sidebarbutton">
                    <a href="{{$links['infoLink'] ?? "/#branaslagretInfo"}}" id="scrollToInfoBtn">
                        <i class="fas fa-home"></i>
                        <span>Info</span>
                    </a>
                </li>

                <li class="sidebarbutton">
                    <a href="{{$links['reglerLink'] ?? "/#ParentsInfo"}}" id="scrollToParentsBtn">
                        <i class="fas fa-user-edit"></i>
                        <span>För Föräldrar</span>
                    </a>
                </li>

                <li class="sidebarbutton">
                    <a href="{{$links['faqLink'] ?? "/#faqInfo"}}" id="scrollTofaqBtn">
                        <i class="fas fa-campground"></i>
                        <span>Frågor & Svar</span>
                    </a>
                </li>

                <li class="sidebarbutton">
                    <a href="{{$links['kontaktLink'] ?? "/#KontaktInfo"}}" id="scrollToKontaktBtn">
                        <i class="fas fa-clock"></i>
                        <span>Kontakt</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Page Content -->
        <div id="content" class="hidden" style="min-height: calc(100vh - 160px); background-color: #EBEBEB">

            <!-- Top bar -->
            <div class="topBar" id="topbar">
                <a id="sidebarshowbtn">
                    <div class="hamburger"><div></div></div>
                </a>
            </div>

            <div class="toplogo" id="scrollToTopLogo" class="scrollToTop">
                <h1>EXPLORE</h1>
                <p>2019</p>
            </div>
            
            <!-- Main site content -->
            <div class="contentcontainer hidden" id="contentcontainer">
                @yield('content')
             </div>
        </div>
    
        <!-- Footer -->

        <div class="footerBG row" style="margin: 0px;" id="footerId">
            <div class="col" style="margin-top: auto; margin-bottom: auto; text-align: center">
                <a href="/contact" class="footerLink scaleFooterTextToMobile">Kontakt ><br><br></a>
                <a href="http://www.equmenia.se/" class="footerLink scaleFooterTextToMobile" style="color: white;" target="blank">Equmenia ></a> 
            </div>

            <div class="col" style="margin-top: auto; margin-bottom: auto; text-align: center">
                <a><h2 style=" font-size: 25;" class="footerLogo scaleFooterLogoToMobile">EXPLORE</h2></a>
                <p class="footerRights scaleFooterRightsToMobile">© Equmenia Väst</p>
            </div>
            <div  class="col" style="margin-top: auto; margin-bottom: auto; text-align: center">
                <a href="/gdpr" class="footerLink scaleFooterTextToMobile">GDPR ><br><br></a>
                <a href="/admin/login" class="footerLink scaleFooterTextToMobile">Admin ></a>
            </div>
        </div>
    </div>
    <!-- Footer end -->
    <button id="scrollToTopBtn" title="Go to top" class="dropShadow"><img src="{{URL::asset('img/arrowUp.png')}}"></button>

    <script src="{{URL::asset('js/scrollToTop.js')}}"></script>
    <script>
        // Smooth scroll functions
        
        // Scroll to top button
        $(function(){
            $("#scrollToTopBtn").click(function(){
                $("html,body").animate({scrollTop:0},"1300");
                return false
            })
        });

        $(function(){
            $("#scrollToTopLogo").click(function(){
                $("html,body").animate({scrollTop:0},"1300");
                return false
            })
        });
        
        // Closes the navbar drop-down in mobile view when a link i pressed
        $('.navbar-nav>li>a').on('click', function(){
            $('.navbar-collapse').collapse('hide');
        });

        $( window ).on( "load", function() {
            $('#loadingScreen').fadeOut();
            $('#mainContent').css('min-height', $( window ).height());
            CheckCoockieConstent();
        });

        function CheckCoockieConstent() {
            if(!Cookies.get('consent')){
                Cookies.set('consent', 'false', { expires: 14 });
            }
            else if(Cookies.get('consent') ==  'true'){
                    $('#cookieConsentDiv').hide();
            }
            return null;
        }

        $(function(){
            $('#agreeCookies').click(function(){
                Cookies.set('consent', 'true', { expires: 14 });
                $('#cookieConsentDiv').hide();
                return null;
            })
        })

        $(document).ready(function () {
            $('#sidebarshowbtn').on('click', toggleHiddenSidebarClass);
        });

        function toggleHiddenSidebarClass() {
            $('#sidebar, #topbar, #contentcontainer').toggleClass('hidden');
        }

        </script>
    </div>
</body>
</html>