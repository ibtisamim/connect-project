@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}

@section('title','questions')

{{-- vendor styles --}}

@section('vendor-styles')

<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">

@endsection

{{-- page styles --}}

@section('page-styles')

<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-users.css')}}">

@endsection

@section('content')

<!-- users list start -->

<section class="users-list-wrapper">

  <div class="users-list-filter px-1">

 

  </div>

  <div class="users-list-table">

    <div class="card">

      <div class="card-body">

        <div class="col-12 d-flex align-items-center justify-content-end pb-1">
{{--
          <a href="{{route('questions.create')}}" class="btn btn-sm btn-success">Add</a> --}}

        </div>

        <!-- datatable start -->

        <div class="table-responsive">

          <table id="users-list-datatable" class="table">

            <thead>

              <tr>

                <th>id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($items_list as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->title}}</td>
                        <td>{!! $item->description !!}</td>

                        <td>

                        <a href="{{route('questions.edit',$item->id)}}" style="display: inline-block; width: auto;padding: 0; border: 1px solid #ccc; padding: 5px; border-radius: 5px; line-height: 12px;"><i class="bx bx-edit-alt"></i></a>

                     

                        <form action="{{route('questions.destroy',$item)}}" method="POST" style="display: initial; vertical-align: top;">

                        @csrf

                        @method('delete')

                        <button type="button" style="display: inline-block; width: auto;padding: 0; border: 1px solid #ccc; padding: 5px; border-radius: 5px; line-height: 12px;" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this item?") }}') ? this.parentElement.submit() : ''">

                           <i class="bx bx-trash" aria-hidden="true"></i>

                        </button>

                    </form>

                        

                        </td>

                    </tr>

                @endforeach

            </tbody>

          </table>

        </div>

        <!-- datatable ends -->

      </div>

    </div>

  </div>

  <div class="col-sm-12"  >

<div class="row" id="pagination">

{{ $items_list->links() }}

</div>

</div>



</section>

<!-- users list ends -->



@endsection



{{-- vendor scripts --}}

@section('vendor-scripts')

<script src="{{asset('vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>

<script src="{{asset('vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{asset('vendors/js/tables/datatable/dataTables.buttons.min.js')}}"></script>

<script src="{{asset('vendors/js/tables/datatable/buttons.bootstrap4.min.js')}}"></script>

@endsection



{{-- page scripts --}}

@section('page-scripts')

<script src="{{asset('js/scripts/pages/app-users.js')}}"></script>

@endsection

