@extends('layouts.main')

@section('title', "- FAQ's")

@section('content')

<div class="supoort_bg_page">
    <div class=" bg_content_contact firstcol">
        <div class="col-md-12 col-sm-12">
         @include('layouts.public_sidebar')
        </div>
    </div>

    <div class="row">
        <div class="bg_content_contact justify-content-between p-3 col-md-12">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="/">Connect Home</a></li><i class="fa fa-angle-right" aria-hidden="true"></i>
                    <li><a href="/support">FAQ's</a></li>
                </ol>
            </div>
            
            <h1><strong>Frequently Asked Questions</strong></h1>
            <p>We are here to help.</p>
            <div class="accordion" id="accordionExample">
              @foreach($supports as $index => $support)
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$index}}" aria-expanded="true" aria-controls="collapseOne">
                      {!! $support->question !!}
                    </button>

                  </h2>

                    <div id="collapse-{{$index}}" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        {!! $support->answer !!}
                      </div>
                    </div>
                  </div>
               @endforeach
              </div>

            <div class="col-lg-12 text-center">
                <div class="support_link">
                    <a href="#" class="unanswered_link">Got unanswered questions?</a>
                    <a href="{{route('contact')}}" class="btn btn-primary">Contact Us</a>
                </div>
            </div>
        </div>

    </div>

</div>



    

@endsection



@section('popup_script')

<script>

    $('#faqlink').addClass('active');

</script>

@endsection