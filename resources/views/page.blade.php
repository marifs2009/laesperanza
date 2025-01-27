@extends('app')
@section('title', $page->page_title)

@section('page_css')
  <style>
    
  </style>
@endsection
@section('content')

@include('templates/'.$template)

@endsection
@section('page_script')
<script>

</script>
@endsection