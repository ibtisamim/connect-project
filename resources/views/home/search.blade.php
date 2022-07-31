@extends('layouts.main')
@section('title', '- Search results')
@section('content')



<div  id="innercontent">
     <h2 class="searchtitle"><strong>You searched for: </strong>{{$query}}</h2>
     <h4 class="resultcount">{{count($results)}} Results for "{{$query}}"</h4>



     {{--



     <div class="tags">



         <h4 class="resultcount"> Refine your search:</h4>



         



         <ul class="all_tage">



             <li class="tage"><a href="">tag</a></li>



             <li class="tage"><a href="">tag</a></li>



             <li class="tage"><a href="">tag</a></li>



             <li class="tage"><a href="">tag</a></li>



             <li class="tage"><a href="">tag</a></li>



             <li class="tage"><a href="">tag</a></li>



             <li class="tage"><a href="">tag</a></li>



             <li class="tage"><a href="">tag</a></li>



             <li class="tage"><a href="">tag</a></li>



         </ul>



        



     </div> --}}



  @if(count($results) > 0)



   



 <!-- boxes -->

                <div class="row mt-4 d-none d-lg-flex">

                    @foreach($results as $project)

                         @if($project->modeltype == 'project')
                         @include('card')
                         @else
                         @php $bussinessprofile = $project; @endphp
                         @include('business_profile_card')
                         @endif

                    @endforeach



                </div>



                



                



@else



@if($currentlang =="en")



<p class="text-left">No result found</p>



@else



<p class="text-right">



  لا يوجد نتائج مطابقة لعملية البحث



</p>



@endif



@endif



<!-- pagination -->



<div class="col-sm-12"  >



<div class="row" id="pagination">



{{--

{{ $results ->links() }} --}}



</div>



</div>



</div>











@endsection







