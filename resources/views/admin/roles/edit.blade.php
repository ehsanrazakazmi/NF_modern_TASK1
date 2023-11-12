@extends('layouts.master')
@section('title')
    @lang('translation.grid-js')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/libs/gridjs/gridjs.min.css') }}">
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Roles
        @endslot
        @slot('title')
            Edit Roles
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h4 class="card-title mb-0 flex-grow-1">Update Role</h4>
                    <button type="button" class="btn btn-outline-success waves-effect waves-light"><a href="{{ route('admin.roles.index') }}"
                        class="px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Role Index</a></button>
                </div><!-- end card header --> --}}
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0 flex-grow-1">Update Role</h4>
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-outline-success waves-effect waves-light px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Role Index</a>
                </div>
                
                <div class="card-body">

                    <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
                        @csrf
                        @method('PUT')
                    {{-- <div id="table-gridjs"></div> --}}
                    {{-- <button type="button" class="btn btn-outline-success waves-effect waves-light"><a href="{{ route('admin.roles.index') }}"
                        class="px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Role Index</a></button> --}}
                        <div class="form-floating">
                            <input type="text" class="form-control mt-3" id="name" name="name"
                                value="{{$role->name}}">
                            <label for="name">Role Name</label>

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
                    <h4 class="card-title mb-0">Role Permissions</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    {{-- <div id="table-card" class="table-card"></div> --}}
                    
                    <div>
                        <form method="POST" action="{{ route('admin.roles.permissions', $role->id) }}">
                            @csrf
                            <div class="sm:col-span-6">
                                <label for="permission"
                                    class="block text-sm font-medium text-gray-700">Select Permission</label>
                                <select id="permission" name="permission" autocomplete="permission-name"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach ($permissions as $permission)
                                        <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                    @endforeach
                                </select>
                            </div>

            
                            <button type="submit" class="btn btn-success btn-label waves-effect right waves-light rounded-pill mt-2"><i class="ri-check-double-line label-icon align-middle rounded-pill fs-16 ms-2"></i> Assign</button>
                    </div>



                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    
    <!-- end row -->
@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/prismjs/prismjs.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/gridjs/gridjs.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/gridjs.init.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
