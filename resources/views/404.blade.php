@extends('app')
@section('title', "404")

@section('page_css')
  <style>
    
  </style>
@endsection
@section('content')

<!--Error Areas -->
    <section id="error_main" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="error_content text-center pt-5">
                        <img src="assets/img/common/error.png" alt="img">
                        <h2>Error 404 : page not found</h2>
                        <a href="{{route('/')}}" class="btn btn_theme btn_md">Back to home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('page_script')
<script>

</script>
@endsection
