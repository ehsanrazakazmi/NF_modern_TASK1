@extends('layouts.master')
@section('title')
    @lang('translation.grid-js')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/libs/gridjs/gridjs.min.css') }}">

    <!--datatable responsive css-->

    <!--datatable css-->
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<!--datatable responsive css-->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Permissions
        @endslot
        @slot('title')
            Edit Permissions
        @endslot
    @endcomponent

    @include('partials.session')


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h4 class="card-title mb-0 flex-grow-1">Update Role</h4>
                    <button type="button" class="btn btn-outline-success waves-effect waves-light"><a href="{{ route('admin.roles.index') }}"
                        class="px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Role Index</a></button>
                </div><!-- end card header --> --}}
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0 flex-grow-1">Update Permissions</h4>
                    <a href="{{ route('admin.permissions.index') }}" class="btn btn-outline-success waves-effect waves-light px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Permissions Index</a>
                </div>
                
                <div class="card-body">

                    <form method="POST" action="{{ route('admin.permissions.update', $permission->id) }}">
                        @csrf
                        @method('PUT')
                    {{-- <div id="table-gridjs"></div> --}}
                    {{-- <button type="button" class="btn btn-outline-success waves-effect waves-light"><a href="{{ route('admin.permissions.index') }}"
                        class="px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Role Index</a></button> --}}
                        <div class="form-floating">
                            <input type="text" class="form-control mt-3" id="name" name="name"
                                value="{{$permission->name}}">
                            <label for="name">Permission Name</label>

                            <button type="submit"
                                    class="btn rounded-pill btn-success waves-effect waves-light mt-3">Update</button>
                        </div>
                    </form>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

   <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title mb-0">Add Role</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <form method="POST" action="{{ route('admin.permissions.roles', $permission->id) }}" enctype="multipart/form-data">
                        @csrf    
                        @method('POST')
                        <div class="row">
                            {{-- <div class="form-group col-md-6 mb-3">
                                <label for="roleInput" class="form-label">Role Name<span style="color: red"> *</span></label>
                                <div>
                                    <input type="text" value="{{ $role->name }}" required class="form-control form-control-icon has-validation" id="roleInput" name="roleInput" placeholder="Enter title">
                                </div>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="descriptionInput" class="form-label">Role Description</label>
                                <div>
                                    <input type="text" value="{{ $role->description }}" class="form-control form-control-icon" id="descriptionInput" name="descriptionInput" placeholder="Enter Description">
                                </div>
                            </div> --}}
                            <div class="col-md-6 mb-3 form-group">
                                <label for="role" class="form-label">
                                    Role<span style="color: red"> *</span>
                                </label>
                                <select required class="js-example-basic-multiple" name="role" multiple="multiple"> 
                                    @foreach ($roles as $role)
                                    {{-- <option @if($role->hasPermissionTo($permission->name)) selected @endif>{{ $permission->name }}</option> --}}
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 form-group mb-2">
                                <a style="margin-right:3px;" href="#" class="btn btn-danger btn-sm">Cancel</a>
                                <input type="submit" class="btn btn-success btn-sm">
                            </div>
                        </div>
                    </form>        
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- end row -->

    
    <!-- end row -->
@endsection


@section('script')          
    <!-- libraries for jquery, datatables and other  -->
    <script src="{{ URL::asset('assets/libs/prismjs/prismjs.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/gridjs/gridjs.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/gridjs.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/prismjs/prismjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
    <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
    <script src="{{ URL::asset('assets/js/pages/modal.init.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/list.js/list.js.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/list.pagination.js/list.pagination.js.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/listjs.init.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ URL::asset('assets/js/pages/select2.init.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/datatables.init.js') }}"></script>
@endsection
