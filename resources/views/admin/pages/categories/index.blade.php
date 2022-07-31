@extends('admin.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Category')
{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/forms/select/select2.min.css')}}">
@endsection
{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-users.css')}}">
@endsection
@section('content')
<!-- users list start -->
<section class="users-list-wrapper">
  <div class="users-list-filter px-1">
                     
    <form action="{{route('categories.index')}}" method="GET" >
    @csrf
    @method('GET')
      <div class="row border rounded py-2 mb-2" id="main_category">
        <div class="col-12 col-sm-6 col-lg-3">
          <label for="users-list-role">Main Category</label>
          <fieldset class="form-group">
            <select class="maincategory_select2"   name="main_category">
            @foreach($main_categories as $cat)
              <option value="{{$cat->id}}">{{$cat->title}}</option>
            @endforeach
            </select>
          </fieldset>
        </div>
      
        <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center">
          <button type="submit" class="btn btn-primary btn-block glow users-list-clear mb-0">Search</button>
        </div>
      </div>
    </form> 
  </div>
  <div class="users-list-table">
    <div class="card">
      <div class="card-body">
        <div class="col-12 d-flex align-items-center justify-content-end pb-1">
          <a href="{{route('categories.create')}}" class="btn btn-sm btn-success">Add Category</a>
        </div>
        <!-- datatable start -->
        <div class="table-responsive">
          <table id="users-list-datatable" class="table">
            <thead>
              <tr>
                <th>id</th>
                <th>Parent</th>
                <th>title</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              
                @foreach ($categories as $category)
                    <tr>
                     
                        <td>{{$category->id}}</td>
                        
                        <td>
                         @if($category->parentId()->first())
                            {{$category->parentId()->first()->title}}
                          @endif                         
                            </td>
                            
                            
                        <td>{{$category->title}}</td>
                        <td>
                        <a href="{{route('categories.edit',$category->id)}}" style="display: inline-block; width: auto;padding: 0; border: 1px solid #ccc; padding: 5px; border-radius: 5px; line-height: 12px;"><i class="bx bx-edit-alt"></i></a>
                     
                        <form action="{{route('categories.destroy',$category->id)}}" method="POST" style="display: initial; vertical-align: top;">
                        @csrf
                        @method('delete')
                        <button type="button" style="display: inline-block; width: auto;padding: 0; border: 1px solid #ccc; padding: 5px; border-radius: 5px; line-height: 12px;" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this email domain?") }}') ? this.parentElement.submit() : ''">
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
{{ $categories->links() }}
</div>
</div>

</section>
<!-- users list ends -->

@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/buttons.bootstrap4.min.js')}}"></script>

@endsection

{{-- page scripts --}}
@section('page-scripts')

<script src="{{asset('js/scripts/pages/app-users.js')}}"></script>
<script src="{{asset('js/scripts/navs/navs.js')}}"></script>
<script src="{{asset('tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('js/tinymce_custom.js')}}"></script>
<script src="{{asset('js/bootstrap-prettyfile.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jpreview.js')}}"></script>

<script>
$(".maincategory_select2").select2({
  dropdownParent: $('#main_category'),
  placeholder: "Select a state",
  selectOnClose: false,
  allowClear: true,
  tags: false
});
</script>

@endsection
