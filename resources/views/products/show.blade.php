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
            Products
        @endslot
        @slot('title')
            Show
        @endslot
    @endcomponent



    <!-- yaha se shuru ho raha hai datatable -->



    <div class="row">
        <div class="col-lg-12">
            
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0 flex-grow-1">Edit New Product</h4>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-success waves-effect waves-light px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Go to Roles Index</a>
                </div>


                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong style="font-size: larger;">Name:</strong>
                                <span style="font-weight: bold; font-size: larger;">{{ $product->name }}</span>

                            </div>
                        </div>
                        

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong style="font-size: larger;">Details:</strong>
                                <span style="font-weight: bold; font-size: larger;">{{ $product->detail }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
    </div>

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
