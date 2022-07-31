<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <title>Connect @yield('title')</title>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  @yield('script')
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/all.min.css')}}" />
  <link rel="stylesheet" href="{{asset('css/select2.min.css')}}"/>
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="{{asset('flags-css/assets/docs.css')}}">
  <link rel="stylesheet" href="{{asset('flags-css/css/flag-icon.css')}}">

</head>
<body id="register-step2">
@include('sweetalert::alert')
@include('layouts.nav-desktop')
@include('layouts.nav-mobile')  


<div class="container" id="main_content">
@yield('content')
</div>



    
    
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('js/select2.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> 
<script src="{{asset('flags-css/assets/docs.js')}}"></script>

    
@yield('popup_script')

<script src="{{asset('js/custom.js')}}"></script>

<!-- start footer to descktop-->
<footer>
    <div class="container">
        <div class="style_footer">
            <div class="row">
                <div class="col-md-2 col-sx-12 link d-none .d-lg-block .d-xl-block d-xxl-block" id="footer_block">
                    <h3>Connect</h3>
                    <a href="{{route('about')}}">About Connect</a>
                    <a href="{{route('contact')}}">Contact Us</a>
                    <p id="lang"><a href="#" class="active">EN</a> | <a href="#">AR</a> </p>
                </div>
                <div class="col-md-2 col-sx-12 link d-none .d-lg-block .d-xl-block d-xxl-block" id="footer_block">
                    <h3>Learn</h3>
                    <a href="/blog">Blog</a>
                    <a href="{{route('support')}}">FAQ</a>
                    <a href="#">Help Center</a>
                </div>
                <div class="col-md-2 col-sx-12 link d-none .d-lg-block .d-xl-block d-xxl-block" id="footer_block">
                    <h3>Legal</h3>
                    <a href="{{route('privacy_policy')}}">Privacy Policy</a>
                    <a href="{{route('term_condition')}}">Terms of Use</a>
                    <a href="#">Return Policy</a>
                </div>
                <div class="col-md-3 col-sx-12"></div>
                <div class="col-md-3 col-offset-3 col-sx-12">
                    <div class="logo">
                        <a href="{{route('index')}}"><img src="{{asset('img/connect-logo.png')}}" class="img-responsive"></a>
                         <p> <a href="mailto:abc@connect.com">abc@connect.com</a></p>
                         <p>+962 77777777</p>
                    </div>
                    <div class="social_media">
                        <a href="#" class="me-2"><i class="fab fa-facebook-f icon-footer"></i></a>
                        <a href="#" class="me-2"><i class="fab fa-instagram icon-footer"></i></a>
                        <a href="#" class="me-2"><i class="fab fa-twitter icon-footer"></i></a>
                        <a href="#" class="me-2"><i class="fab fa-pinterest-p icon-footer"></i></a>
                        <a href="#" class="me-2"><i class="fab fa-youtube icon-footer"></i></a>
                        <a href="#" class="me-2"><i class="fab fa-linkedin-in icon-footer"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="row done_footer">
                <div class="col-md-3 col-sx-12">
                    <p><span style="float:left">Develop By <a href="https://www.josequal.com/" target="_blank">josequal</a></span></p>
                </div>
                <div class="col-md-6 col-sx-12"></div>
                <div class="col-md-3 col-sx-12">
                   <p>© 2021 Connect.com, Inc</p>
                </div>
            </div>
        </div>
</div>
</footer>

</body>

</html>
