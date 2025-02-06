@extends('admin.app')
@section('title', 'Tour Category Title')

@section('tour_category_css')

@endsection
@section('content')
<!-- Tour Category header -->
<div class="page-header d-print-none mt-0">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <h2 class="page-title">{{$tour_category_title}}</h2>
      </div>
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
          <a href="{{route('tourcategory.list')}}" class="btn btn-primary d-none d-sm-inline-block">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-big-left-line"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 15v3.586a1 1 0 0 1 -1.707 .707l-6.586 -6.586a1 1 0 0 1 0 -1.414l6.586 -6.586a1 1 0 0 1 1.707 .707v3.586h6v6h-6z" /><path d="M21 15v-6" /></svg>
              Back
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Tour Category body -->
<div class="page-body">
  <div class="container-xl">
    <div class="card">
      <div class="card-body">
        @if(session('tour_category_store_success'))
          <div class="alert alert-success">{{ session('tour_category_store_success') }}</div>
        @endif
        @if(session('tour_category_store_error'))
          <div class="alert alert-danger">{{ session('tour_category_store_error') }}</div>
        @endif
        <form id="add_tour_category" name="add_tour_category" class="outer-repeater float-none" method="POST" enctype="multipart/form-data" action="{{route('tourcategory.store')}}">
          @csrf
          <div class="card-body p-4">
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="tour_category_title" class="form-label">Title <span class="required">*</span></label>
                  <input class="form-control" id="tour_category_title" name="tour_category_title" type="text" placeholder="Enter Title" value=""/>
                  @error('tour_category_title')
                    <span class="error_msg">{{ $message }}</span>
                  @enderror
                </div>                                           
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="tour_category_slug" class="form-label">Slug <span class="required">*</span></label>
                  <input class="form-control" id="tour_category_slug" name="tour_category_slug" type="text" placeholder="Enter Slug" value=""/>
                  @error('tour_category_slug')
                    <span class="error_msg">{{ $message }}</span>
                  @enderror
                </div>                                           
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="tour_category_subtitle" class="form-label">Subtitle (Optional)</label>
                  <input class="form-control" id="tour_category_subtitle" name="tour_category_subtitle" type="text" placeholder="Enter Subtitle" value=""/>
                  <span class="error_tour_category_subtitle" id="error_tour_category_subtitle"></span>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3"> 
                  <label for="tour_category_template" class="form-label">Parent Tour Category <span class="required">*</span></label>
                  <select class="form-select" name="tour_parent_category_id" id="tour_parent_category_id">
                    <option value="-1">No Parent</option>
                    @if(!empty($tour_categories))
                      @foreach ($tour_categories as $tour_category) 
                        <option value='{{ $tour_category->tour_category_id }}' @if(old('tour_category') == $tour_category->tour_category_title) selected="selected" @endif >{{$tour_category->tour_category_title}}</option>
                      @endforeach
                    @endif
                  </select>
                  @error('status')
                    <span class="error_msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3"> 
                  <label for="tour_category_template" class="form-label">Status <span class="required">*</span></label>
                  <select class="form-select" name="status" id="status">
                    <option value='1'>Active</option>
                    <option value='0'>Inactive</option>
                  </select>
                  @error('status')
                    <span class="error_msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>          
              <div class="col-lg-6">
                <div class="mb-2">
                  <label for="tour_category_excerpt" class="form-label">Excerpt (Optional)</label>
                  <textarea rows="1" class="form-control" id="tour_category_excerpt" name="tour_category_excerpt" placeholder="Excerpt"></textarea>
                  <span class="error_msg" id="error_tour_category_excerpt"></span>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="tour_category_banner" class="form-label">Banner (Optional)</label>
                  <input class="form-control" id="tour_category_banner" name="tour_category_banner" type="file"/>
                  <span class="error_msg" id="error_tour_category_banner"></span>
                </div>
              </div>
            </div>
            <div class="row" style="background-color:#eee;padding:10px;margin:0px">
              <b style="padding-bottom:10px;">Meta</b>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="meta_title" class="form-label">Meta Title (Optional)</label>
                  <textarea class="form-control" name="meta_title" id="meta_title" rows="2">{{ old('tour_category_slug')}}</textarea>
                  <span class="error_msg" id="error_meta_title"></span>
                </div> 
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="meta_keyword" class="form-label">Meta Keyword (Optional)</label>
                  <textarea class="form-control" name="meta_keyword" id="meta_keyword" rows="2"></textarea>
                  <span class="error_msg" id="error_meta_keyword"></span>
                </div> 
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="meta_description" class="form-label">Meta Description (Optional)</label>
                  <textarea class="form-control" name="meta_description" id="meta_description" rows="2"></textarea>
                  <span class="error_msg" id="error_description"></span>
                </div> 
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="other_header_html" class="form-label">Any Other Header HTML/script (Optional)</label>
                  <textarea class="form-control" name="other_header_html" id="other_header_html" rows="2"></textarea>
                  <span class="error_msg" id="error_other_header_html"></span>
                </div> 
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-lg-12">
                <div class="mb-3">
                  <label for="content" class="form-label">Content (Optional)</label>
                  <textarea class="content" id="content" name="content" rows="4" cols="55"></textarea>
                  <span class="error_msg" id="error_content"></span>
                </div>                                           
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 text-center">
                <button type="submit" class="btn btn-primary waves-effect waves-light" id="insert">Save</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
@section('page_script')

<script>
$('#content').summernote({
    placeholder: '',
    tabsize: 2,
    height: 300
  });

</script>
<script>
$(document).ready(function(){
    $("#tour_category_title").keyup(function(e){
       e.preventDefault();
       var title = $("#tour_category_title").val();
       var str = title.replace(/\W+(?!$)/g, '-').toLowerCase();
       str = str.replace(/\W$/, '').toLowerCase();
       $('#tour_category_slug').val(str);
    });

    $("#tour_category_slug").keyup(function(e){
       e.preventDefault();
       var title = $("#tour_category_slug").val();
       var str = title.replace(/\W+(?!$)/g, '-').toLowerCase();
       str = str.replace(/\W$/, '').toLowerCase();
       $('#tour_category_slug').val(str);
    });
});
</script>

@endsection

