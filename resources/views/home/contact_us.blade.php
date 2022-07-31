@extends('layouts.main')
@section('title', '- Contact Us')
@section('content')
    <div class="contact_us_bg">
                <div class=" bg_content_contact firstcol">
                    <div class="col-md-12 col-sm-12">
                     @include('layouts.public_sidebar')
                    </div>
                </div>
            <div class="row">
            <div class="row bg_content_contact justify-content-between p-3 col-md-12">
                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="/">Connect Home</a></li><i class="fa fa-angle-right" aria-hidden="true"></i>
                    <li><a href="">Contact Us</a></li>
                </ol>
            </div>
           
                    <div class="content_info_contact">
                         <h1><strong>Get In Touch</strong></h1>
                        <div class="info">
                            {{-- <i class="fas fa-map-marker-alt"></i> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="19" viewBox="0 0 20 24">
  <g id="Icon" transform="translate(1 1)">
    <path id="Path" d="M21,10c0,7-9,13-9,13S3,17,3,10a9,9,0,0,1,18,0Z" transform="translate(-3 -1)" fill="none" stroke="#0009" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    <circle id="Path-2" data-name="Path" cx="3" cy="3" r="3" transform="translate(6 6)" fill="none" stroke="#0009" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
  </g>
</svg>

                            <p>123 Mockup St., New York</p>
                        </div>
                        <div class="info">
                           {{-- <i class="fas fa-phone-alt"></i> --}}
<svg xmlns="http://www.w3.org/2000/svg" width="15" height="21.93" viewBox="0 0 21.89 21.93">
  <g id="Icon" transform="translate(1.001 1)">
    <path id="Path" d="M22,16.92v3a2,2,0,0,1-2.18,2,19.788,19.788,0,0,1-8.63-3.07,19.5,19.5,0,0,1-6-6A19.788,19.788,0,0,1,2.12,4.18,2,2,0,0,1,4.11,2h3a2,2,0,0,1,2,1.72,12.833,12.833,0,0,0,.7,2.81,2,2,0,0,1-.45,2.11L8.09,9.91a16,16,0,0,0,6,6l1.27-1.27a2,2,0,0,1,2.11-.45,12.833,12.833,0,0,0,2.81.7A2,2,0,0,1,22,16.92Z" transform="translate(-2.112 -2)" fill="none" stroke="#0009" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
  </g>
</svg>

                            <p>(+1) 123 456 7890 </p>
                        </div>
                        <div class="info">
                            {{-- <i class="fas fa-mobile-alt"></i> --}}
<svg xmlns="http://www.w3.org/2000/svg" width="13" height="22" viewBox="0 0 16 22">
  <g id="Icon" transform="translate(1 1)">
    <rect id="Rect" width="13" height="20" rx="2" fill="none" stroke="#0009" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
    <line id="Line" transform="translate(7 16)" fill="none" stroke="#0009" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
  </g>
</svg>

                            <p>(+1) 123 456 7891</p>
                        </div>
                        <div class="form_contact">
                            <form action="{{route('contact_save')}}" method="POST">
                              @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                         <input type="text" required name="name" class="form-control" placeholder="Name" style="height: 48px;">
                                      @error('name')
                                        <div class="alert alert-danger">{{$message}}</div>
                                      @enderror
                                    </div>
                                    <div class="col-lg-12">
                                         <input type="email" required name="email" class="form-control" placeholder="Email Address" style="height: 48px;">
                                      @error('email')
                                      <div class="alert alert-danger">{{$message}}</div>
                                      @enderror
                                     </div>
                                     <div class="col-lg-12">
                                         <textarea name="message" required id="message" cols="30" rows="4" placeholder="Write your message here" class="form-control" style='height: 96px;'></textarea>
                                         @error('message')
                                         <div class="alert alert-danger">{{$message}}</div>
                                         @enderror
                                     </div>
                                     <div class="col-lg-12">
                                         <button class="btn btn-primary">Send</button>
                                     </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-xl-7 col-lg-7  col-md-12 col-sm-12">
                    <div class="map_contact">
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3384.0652780713335!2d35.85525781464311!3d31.986245831190573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151ca1a01370e6f3%3A0x4bf0e94b54338524!2sJadwelha!5e0!3m2!1sen!2sjo!4v1636974420537!5m2!1sen!2sjo"  style="border:0;width:100%;height:100%" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
            </div>
       
  
</div>
@endsection

@section('popup_script')
<script>
    $('#contactlink').addClass('active');
</script>
@endsection