@php $card_col = 'col-lg-12' ; $class = 'col-md-12 col-lg-12'; @endphp

@if($collection->Projects()->count() > 0)
@foreach($collection->Projects()->get() as $project)
<div>
@include('card')
</div>
@endforeach
@else
<p>Not found projects in this collection.</p>
@endif