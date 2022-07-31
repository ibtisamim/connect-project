@extends('layouts.main')
@section('title', '- Home')
@section('content')
@php
$class = 'animate fadeInUp';
@endphp
        <div class="background-home">
                <section class="home-search-box text-center home">
                        <h1 class="fw-lighter title_style" >The largest <span class="title_word_style">architectural</span> projects directory in MENA.</h1>
                </section>
                <!-- boxes -->
                <div class="row  d-lg-flex">
                    @php $start = 0.4 ; @endphp
                    @foreach($projects as $project)
                    @include('card')
                    @php $start = $start + 0.2 ; @endphp
                    
                    @endforeach
                </div>
        </div>

@endsection




