@extends('layouts.main')
@section('title','Not found page')
@section('content')
<div class="background-home">
    <div class="col-xl-12 col-md-12 col-12">
        <img src="{{asset('/img/not-found-page.png')}}" class="img-fluid" alt="not found content" >
        <a href="{{url('/')}}" class="btn btn-primary round glow mt-2">BACK TO HOME</a>
  </div>
</div>




<!-- not authorized end -->
@endsection
