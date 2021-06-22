@extends('Layouts.BackSite.master')
@section('title',"Categories")

@section('main_content')
<div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <h4>Category List</h4>
                                <div class="add-product">
                                    <a href="{{ route('category.create')}}">Add Category</a>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control dt-tb">
											<option value="">Export Basic</option>
											<option value="all">Export All</option>
											<option value="selected">Export Selected</option>
										</select>
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="id">ID</th>
                                                <th data-field="name">Category Name</th>
                                                <th data-field="name">Description</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($categories as $key=>$category)
                                            <tr>
                                                <td></td>
                                                <td>{{$key +1}}</td>
                                                <td>{{$category->name}}</td>
                                                <td>{{$category->description}}</td>
                                                
                                                <td >
                                                    <a href="{{route('category.edit', $category->id)}}" data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                    
                                                    <button class="pd-setting-ed" type="button"
                                                    onclick="deleteCategory({{$category->id}})">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                    </button>

                                                    <form id="delete-form-{{$category->id}}" action="{{route('category.destroy', $category->id)}}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('cus-js')
    <!-- data table JS
    ============================================ -->
    <script src="{{ asset('assets/backsite/js/data-table/bootstrap-table.js') }}"></script>
    <script src="{{ asset('assets/backsite/js/data-table/tableExport.js') }}"></script>
    <script src="{{ asset('assets/backsite/js/data-table/data-table-active.js') }}"></script>
    <script src="{{ asset('assets/backsite/js/data-table/bootstrap-table-editable.js') }}"></script>
    <script src="{{ asset('assets/backsite/js/data-table/bootstrap-editable.js') }}"></script>
    <script src="{{ asset('assets/backsite/js/data-table/bootstrap-table-resizable.js') }}"></script>
    <script src="{{ asset('assets/backsite/js/data-table/colResizable-1.5.source.js') }}"></script>
    <script src="{{ asset('assets/backsite/js/data-table/bootstrap-table-export.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
  
    
    <script type="text/javascript">
        function deleteCategory(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                
                })

                swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your Data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endsection