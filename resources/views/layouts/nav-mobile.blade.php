@auth
<div class="container-fluid p-0">
<nav class="navbar navbar-expand-lg navbar-light bg-light d-md-none" style="background-color: #fff  !important;">
  <div class="container">
    <a class="navbar-brand" href="/index">
      <img src="{{asset('img/connect-logo.png')}}" width="180">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#searchNav" aria-controls="searchNav" aria-expanded="false" aria-label="Toggle navigation">
      <div class="search_mobile">
        <img src="{{asset('img/search_tools.png')}}" alt="search_tools" class="d-lg-none d-xl-block">
      </div>
    </button>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-icon">
            <i class="fas fa-bars"></i>
        </span>
    </button>

    <div class="collapse navbar-collapse search_nav" id="searchNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <h2>What Are You Searching for?</h2>
        </li>
        <form action="{{ route('search') }}" class="searchform" method="post" name="searchform" >
                            {{ csrf_field() }}
        <div class="form-group mt-5 search-div">
          <i class="fas fa-search icon-search"></i>
          <i class="fas fa-arrow-right icon-arrow"></i>
          <input type="text" name="query" placeholder="Type in something" class="form-control search-input">
        </div>
        </form>
      </ul>
    </div>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('page.show',[15, 'about-connect'])}}">About Connect</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/blog">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('support')}}">FAQ's</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{route('contact')}}">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('page.show',[12, 'privacy-policy'])}}">Privacy Policy</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('page.show',[18, 'terms-conditions'])}}">Terms of Use</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#"><span class="active">EN</span> |<span>AR</span></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</div>
@else

<nav class="navbar navbar-expand-lg navbar-light bg-light d-md-none" style="background-color: #fff  !important;">
  <div class="container">
    <a class="navbar-brand" href="/index">
      <img src="{{asset('img/connect-logo.png')}}" width="180">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#searchNav" aria-controls="searchNav" aria-expanded="false" aria-label="Toggle navigation">
      <div class="search_mobile">
        <img src="{{asset('img/search_tools.png')}}" alt="search_tools" class="d-lg-none d-xl-block">
      </div>
    </button>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-icon">
            <i class="fas fa-bars"></i>
        </span>
    </button>

    <div class="collapse navbar-collapse search_nav" id="searchNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <h2>What Are You Searching for?</h2>
        </li>
        <form action="{{ route('search') }}" class="searchform" method="post" name="searchform" >
                            {{ csrf_field() }}
        <div class="form-group mt-5 search-div">
          <i class="fas fa-search icon-search"></i>
          <i class="fas fa-arrow-right icon-arrow"></i>
          <input type="text" placeholder="Type in something" name="query" class="form-control search-input">
        </div>
        </form>
      </ul>
    </div>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <button class="btn btn-primary sign_up_button" data-bs-toggle="modal" data-bs-target="#registerModal">Sign Up | Log In</button>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('page.show',[15, 'about-connect'])}}">About Connect</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/blog">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('support')}}">FAQ's</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{route('contact')}}">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('page.show',[12, 'privacy-policy'])}}">Privacy Policy</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('page.show',[18, 'terms-conditions'])}}">Terms of Use</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#"><span class="active">EN</span> |<span>AR</span></a>
        </li>
      </ul>
    </div>
  </div>
</nav>


@endauth

@section('notification')

<script>
$(document).ready(function(){
    $('#navbarDropdown').on('show.bs.dropdown', function (){
    var user_id = $(this).find("#read_notifications").data('id');
    $.ajax({
        url : "{{route('change_status_notification')}}",
        type : "POST",
        data  : {'user_id':user_id , '_token' : "{{ csrf_token() }}"},
        success : function(res){
            if(res == 0){
                $('.count_notify').remove();
            }
        },
        error : function(error){
            console.log(error + "worning read notification");
        }
    });
});
});
</script>

@endsection
