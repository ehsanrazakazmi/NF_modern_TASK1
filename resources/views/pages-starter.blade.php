<!-- comment -->
@extends('layouts.master')
@section('title') @lang('translation.newpage')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Users @endslot
@slot('title') Add  @endslot
@endcomponent
@endsection





@section('script')
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
