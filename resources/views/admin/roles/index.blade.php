@extends('layouts.master')
@section('title')
    @lang('translation.list-js')
@endsection
@section('css')
    <!--datatable css-->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!--datatable responsive css-->
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Tables
        @endslot
        @slot('title')
            Roles
        @endslot
    @endcomponent



    <!-- yaha se shuru ho raha hai datatable -->



    <div class="row">
        <div class="col-lg-12">
            
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0 pt-6"> Roles</h5>
                    <div class="col-md-12 text-end">

                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal"
                        id="create-btn" data-bs-target="#showModal"><i
                        class="ri-add-line align-bottom me-1 mb-3"></i> Add Roles</button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
                                {{-- <th scope="col" style="width: 10px;">
                                    <div class="form-check">
                                        <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                    </div>
                                </th> --}}
                                {{-- <th class="text-center">SR No.</th> --}}
                                <th class="text-center">Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                               
                                <td class="text-center">{{$role->id}}</td>
                                <td class="text-center">{{$role->name}}</td>
                                
                                <td>
                                    <div class="d-flex gap-2 justify-content-center">
                                        <div class="edit">
                                            <button class="btn btn-sm btn-success edit-item-btn"><a href="{{ route('admin.roles.edit', $role->id) }}" class="text-white">Edit</a></button>
                                        </div>
                                        
                                        <div class="remove">
                                                <button class="btn btn-sm btn-danger remove-item-btn"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteRecordModal"></i> Remove</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    






    <!-- yahan par khtm ho raha hai datatable -->







    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <form method="POST" action="{{ route('admin.roles.store') }}">
                    @csrf
                    <div class="modal-body">

                        {{-- <div class="mb-3" id="modal-id" style="display: none;">
                            <label for="id-field" class="form-label">ID</label>
                            <input type="text" id="id-field" class="form-control" placeholder="ID" readonly />
                        </div> --}}

                        <div class="mb-3">
                            <label for="name" class="form-label">Role Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name" required />
                        </div>

                       
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="submit" class="btn btn-success" id="edit-btn">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-2 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                            colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4>Are you Sure ?</h4>
                            <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Record ?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                        <form method="POST" action="{{ route('admin.roles.destroy', $role->id) }}">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="btn w-sm btn-danger mt-5" id="delete-record">Yes, Delete It!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end modal -->
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="{{ URL::asset('assets/js/pages/datatables.init.js') }}"></script>

<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
