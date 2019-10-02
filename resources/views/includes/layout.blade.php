<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SALCON</title>
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300i,400,500" rel="stylesheet">

    <link rel="stylesheet" href="{{URL::asset('vendor/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="{{URL::asset('vendor/owl-carousel/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('vendor/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('vendor/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/mystyle.css')}}">
<body>
<!-- ================Offcanvus Menu Area =================-->

<div class="side_menu">
    <ul class="list menu_right">
        <li>
            <a href="{{ route('customer') }}">Home</a>
        </li>
        <li>
            <a href="{{ route('about') }}">About</a>
        </li>
        <li>
            <a href="{{ route('project') }}">Projects</a>
        </li>

        <li>
            <a href="{{ route('contacts') }}">Contact</a>
        </li>
    </ul>
</div>
<!--================End Offcanvus Menu Area =================-->

<!--================Canvus Menu Area =================-->
<div class="canvus_menu">
    <div class="container">
        <div class="float-right">
            <div class="toggle_icon" title="Menu Bar">
                <span></span>
            </div>
        </div>
    </div>
</div>
<!--================End Canvus Menu Area =================-->

<header>
    <div class="<?=$class;?>">
        <a class="navbar-brand" href="index.php/web/home">
            <img src="img/logo.png" alt="">
        </a>


        @yield('main_content')



<footer class="footer footer-bg">
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-lg-2 mb-4 mb-lg-0 text-left">
                <h3 class="footer__title">Zanzibar Office</h3>
                <ul class="footer__link">
                    <li><span class="fa fa-phone"></span> +255 24 2231277</li>
                    <li>P.O. Box 3398</li>
                    <li>Zanzibar, Tanzania</li>
                </ul>
            </div>
            <div class="col-sm-4 col-lg-2 mb-4 mb-lg-0 text-left">
                <h3 class="footer__title">Dar es Salaam Office</h3>
                <ul class="footer__link">
                    <li><span class="fa fa-phone"></span> +255 22 2617489</li>
                    <li>P.O. Box 38160</li>
                    <li>Dar es Salaam, Tanzania</li>
                </ul>
            </div>
            <div class="col-sm-4 col-lg-2 mb-4 mb-lg-0 text-left">

            </div>
            <div class="col-sm-4 col-lg-2 mb-4 mb-lg-0 text-left">

            </div>
            <div class="col-sm-8 col-lg-4 mb-4 mb-lg-0 text-left">
                <h3 class="footer__title">Suggestions</h3>
                <p>Did you find what you were looking for ? Tell us</p>
                <form action="" class="form-subscribe">
                    <div class="form-group">
                        <textarea class="form-control" data-height="40px" placeholder="Any Additions, Comments and Observations..."></textarea>
                    </div>
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Your email address" required>
                        <div class="input-group-append">
                            <button class="btn-append" type="submit"><i class="lnr lnr-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="d-sm-flex justify-content-between footer__bottom top-border">
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script>  <a href="/">Salem Construction Limited</a> | Designed and Maintained <i class="fa fa-cogs" aria-hidden="true"></i> by <a href="http://www.comptech.co.tz" target="_blank">Comptech Limited</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            <ul class="social-icons mt-2 mt-sm-0">
                <li><a href="#/"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#/"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#/"><i class="fab fa-dribbble"></i></a></li>
                <li><a href="#/"><i class="fab fa-behance"></i></a></li>
            </ul>
        </div>
    </div>
</footer>



<script src="{{URL::asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<script src="{{URL::asset('vendor/bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{URL::asset('vendor/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{URL::asset('js/custome.js')}}"></script>

<script>
    var testimonialCarousel = $('.testimonialCarousel');
    testimonialCarousel.owlCarousel({
        loop:true,
        margin:80,
        startPosition: 2,
        nav: false,
        responsiveClass:true,
        autoplay: true,
        responsive:{
            0:{
                items:1
            },
            1000:{
                items:2,
                loop:true
            }
        }
    });

    var heroCarousel = $('.heroCarousel');
    heroCarousel.owlCarousel({
        loop:true,
        autoplay: true,
        margin:10,
        nav: false,
        startPosition: 1,
        responsiveClass:true,
        responsive:{
            0:{
                items:1
            }
        }
    });

    var dropToggle = $('.menu_right > li').has('ul').children('a');
    dropToggle.on('click', function() {
        dropToggle.not(this).closest('li').find('ul').slideUp(200);
        $(this).closest('li').children('ul').slideToggle(200);
        return false;
    });

    $( ".toggle_icon" ).on('click', function() {
        $( 'body' ).toggleClass( "open" );
    });

</script>
</body>
</html>