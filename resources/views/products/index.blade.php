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
            Products
        @endslot
    @endcomponent



    <!-- yaha se shuru ho raha hai datatable -->



    <div class="row">
        <div class="col-lg-12">
            
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0 pt-6"> Product Management</h5>
                    <div class="col-md-12 text-end">
                        @can('product-create')
                        <a href="{{ route('products.create') }}" class="btn btn-outline-success waves-effect waves-light px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Create new Product</a>
                        @endcan
                    </div>
                </div>


                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif



                <div class="card-body">
                    <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
                                {{-- <th scope="col" style="width: 10px;">
                                    <div class="form-check">
                                        <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                    </div>
                                </th> --}}
                                <th class="text-center">SR No.</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Details</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)                            
                            <tr>
                               
                                <td class="text-center">{{++$i}}</td>
                                <td class="text-center">{{$product->name}}</td>
                                <td class="text-center">{{$product->detail}}</td>
                                
                                <td>
                                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                    <div class="d-flex gap-2 justify-content-center">
                                        <div class="show">
                                            {{-- <button class="btn btn-sm btn-success edit-item-btn"><a href="{{ route('products.show', $product->id) }}" class="text-white">Show</a></button> --}}
                                            <a class="btn btn-sm btn-success edit-item-btn" href="{{ route('products.show',$product->id) }}">Show</a>
                                        </div>

                                        <div class="edit">
                                            {{-- @can('role-edit')
                                            <button class="btn btn-sm btn-success edit-item-btn"><a href="{{ route('products.edit', $product->id) }}" class="text-white">Edit</a></button>
                                            @endcan --}}
                                            @can('product-edit')
                                            <a class="btn btn-sm btn-success edit-item-btn" href="{{ route('products.edit',$product->id) }}">Edit</a>
                                            @endcan
                                        </div>
                                        
                                        @csrf
                                        @method('DELETE')
                                        @can('product-delete')
                                        <button type="submit" class="btn btn-sm btn-danger remove-item-btn">Delete</button>
                                        @endcan
                                        
                                    </div>
                    
                    
                                        
                                    </form>
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







    
    <!-- Modal -->
    {!! $products->links() !!}

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
