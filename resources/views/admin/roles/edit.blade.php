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
            Users
        @endslot
        @slot('title')
            Edit Users
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
                    <h4 class="card-title mb-0 flex-grow-1">Edit New User</h4>
                    <a href="{{ route('users.index') }}" class="btn btn-outline-success waves-effect waves-light px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Go to Users Index</a>
                </div>

                {{-- this is for error messege --}}
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
                <div class="card-body">

                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PATCH')
                    {{-- <div id="table-gridjs"></div> --}}
                    {{-- <button type="button" class="btn btn-outline-success waves-effect waves-light"><a href="{{ route('admin.roles.index') }}"
                        class="px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Role Index</a></button> --}}
                        <div class="form-floating">
                            <input type="text" class="form-control mt-3" id="name" name="name"
                                value="{{$role->name}}">
                            <label for="name">Role Name</label>


                            <input type="text" class="form-control mt-3" id="email-field" name="email-field"
                                value="{{$role->email}}">
                            <label for="email-field">Role Email</label>


                            <input type="text" class="form-control mt-3" id="password" name="password"
                                value="{{$role->password}}">
                            <label for="password">Role password</label>


                            <input type="text" class="form-control mt-3" id="password" name="password"
                                value="{{$role->password}}">
                            <label for="password">Confirm Name</label>

                            <label for="roles[]" class="form-control mt-3">Enter Password</label>
                            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}

                            <button type="submit" class="btn rounded-pill btn-success waves-effect waves-light mt-3">Update</button>
                        </div>
                    </form>
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
