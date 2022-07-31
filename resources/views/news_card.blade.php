<div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 {{$class}} animate fadeInUp" style='-webkit-animation-delay: {{$start}}s; -moz-animation-delay: {{$start}}s; animation-delay: {{$start}}s; ' id="businesscard">

<a href="{{$item['url']}}" target="_blank">
<div class="single_category home_page_card" style="min-height: 100%; max-height: 100%;">
@if($item['media_group'])
@php $covercard = $item['media_group']; @endphp
@else
@php $covercard = '/img/project-cover-placeholder-8.png'; @endphp
@endif
<div class="image_category" style="background-image:url('{{$covercard}}'); min-height: 150px; max-height: 150px;"></div>
        <div class="businessprofile info_category" style="position: relative;">
            <h2 class="card-feed-title"> 
                {{ \Illuminate\Support\Str::limit($item['title'], 21 , $end='...') }} </h2>
            <p class="text-center" style="padding: 10px;"> {{ \Illuminate\Support\Str::limit($item['content'], 100 , $end='...') }}</p>
           {{-- <div class="all_tage text-center d-md-flex">
              <div class="tage">
                <span> {{ $item['category'] }} </span>
              </div>
            </div>

            <div class="follow">
            <a href="{{$channel_link}}" target="_blank" class="sign_in_popup"  id="followbtn">Follow</a>
          </div>

          <div class="share" style="float:right">
                 <a href="#" class="sign_in_popup" data-bs-toggle="modal" data-bs-target="#registerModal" id="sharebtn">Share</a>

          </div>
          --}}
        </div>
        </div>
        </a>
</div>