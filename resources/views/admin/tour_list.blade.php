@extends('admin.app')
@section('title', 'Page Title')

@section('page_css')

@endsection
@section('content')
<!-- Page header -->
<div class="page-header d-print-none mt-0">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <h2 class="page-title">{{$page_title}}</h2>
      </div>
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
          <a href="{{route('page.list')}}" class="btn btn-primary d-none d-sm-inline-block">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-big-left-line"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 15v3.586a1 1 0 0 1 -1.707 .707l-6.586 -6.586a1 1 0 0 1 0 -1.414l6.586 -6.586a1 1 0 0 1 1.707 .707v3.586h6v6h-6z" /><path d="M21 15v-6" /></svg>
              Back
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page body -->
<div class="page-body">
  <div class="container-xl">
    <div class="card">
      <div class="card-body">
        @if(session('page_store_success'))
          <div class="alert alert-success">{{ session('page_store_success') }}</div>
        @endif
        @if(session('page_store_error'))
          <div class="alert alert-danger">{{ session('page_store_error') }}</div>
        @endif
        <form id="add_page" name="add_page" class="outer-repeater float-none" method="POST" enctype="multipart/form-data" action="{{route('page.store')}}">
          @csrf
          <div class="card-body p-4">
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="page_title" class="form-label">Page Title <span class="required">*</span></label>
                  <input class="form-control" id="page_title" name="page_title" type="text" placeholder="Enter Page Title"  value="{{ old('page_title') }}"/>
                  @error('page_title')
                    <span class="error_msg">{{ $message }}</span>
                  @enderror
                </div>                                           
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="page_slug" class="form-label">Page Slug <span class="required">*</span></label>
                  <input class="form-control" id="page_slug" name="page_slug" type="text" placeholder="Enter Page Slug" value="{{ old('page_slug') }}"/>
                  @error('page_slug')
                    <span class="error_msg">{{ $message }}</span>
                  @enderror
                </div>                                           
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="page_subtitle" class="form-label">Page Subtitle (Optional)</label>
                  <input class="form-control" id="page_subtitle" name="page_subtitle" type="text" placeholder="Enter Page Subtitle" value="{{ old('page_subtitle') }}"/>
                  <span class="error_page_subtitle" id="error_page_subtitle"></span>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3"> 
                  <label for="page_template" class="form-label">Page Category  <span class="required">*</span></label>
                  <select class="form-select" name="page_category" id="page_category">
                    <option value="">Select Category</option>
                    @if(!empty($page_categories))
                      @foreach ($page_categories as $page_category) 
                        <option value='{{ $page_category->id }}' @if(old('page_category') == $page_category->name) selected="selected" @endif >{{$page_category->name}}</option>
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
                  <label for="page_template" class="form-label">Page Template <span class="required">*</span></label>
                  <select class="form-select" name="page_template" id="page_template">
                    <option value="">Select Template</option>
                    @if(!empty($files))
                      @foreach ($files as $file) 
                        <option value='{{ $file }}' @if(old('page_template') == $file) selected="selected" @endif >{{$file}}</option>
                      @endforeach
                    @endif
                  </select>
                  @error('page_template')
                    <span class="error_msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3"> 
                  <label for="page_template" class="form-label">Status <span class="required">*</span></label>
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
                  <label for="page_excerpt" class="form-label">Page Excerpt (Optional)</label>
                  <textarea rows="1" class="form-control" id="page_excerpt" name="page_excerpt" placeholder="Enter page excerpt">{{ old('page_excerpt') }}</textarea>
                  <span class="error_msg" id="error_page_excerpt"></span>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="page_banner" class="form-label">Page Banner (Optional)</label>
                  <input class="form-control" id="page_banner" name="page_banner" type="file"/>
                  <span class="error_msg" id="error_page_banner"></span>
                </div>
              </div>
            </div>
            <div class="row" style="background-color:#eee;padding:10px;margin:0px">
              <b style="padding-bottom:10px;">Page Meta</b>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="meta_title" class="form-label">Meta Title (Optional)</label>
                  <textarea class="form-control" name="meta_title" id="meta_title" rows="2">{{ old('page_slug')}}</textarea>
                  <span class="error_msg" id="error_meta_title"></span>
                </div> 
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="meta_keyword" class="form-label">Meta Keyword (Optional)</label>
                  <textarea class="form-control" name="meta_keyword" id="meta_keyword" rows="2">{{ old('page_slug')}}"</textarea>
                  <span class="error_msg" id="error_meta_keyword"></span>
                </div> 
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="meta_description" class="form-label">Meta Description (Optional)</label>
                  <textarea class="form-control" name="meta_description" id="meta_description" rows="2">{{ old('page_slug') }}</textarea>
                  <span class="error_msg" id="error_description"></span>
                </div> 
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="other_header_html" class="form-label">Any Other Header HTML/script (Optional)</label>
                  <textarea class="form-control" name="other_header_html" id="other_header_html" rows="2">{{ old('page_slug') }}</textarea>
                  <span class="error_msg" id="error_other_header_html"></span>
                </div> 
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-lg-12">
                <div class="mb-3">
                  <label for="content" class="form-label">Content (Optional)</label>
                  <textarea class="content" id="content" name="content" rows="4" cols="55"> {{ old('content') }}</textarea>
                  <span class="error_msg" id="error_content"></span>
                </div>                                           
              </div>
            </div>
            <!-- <div id="SectioContent">
              <div class="row">
                <div class="col-lg-12">
                  <div class="mb-3">
                    <label for="page_section" class="form-label">Section (Optional)</label>
                    <input class="form-control" id="page_section" name="page_section[]" type="text" placeholder="Section Name" />
                    <span class="error_page_section"></span>
                  </div>  
                  <div class="mb-3">
                    <label for="section_content" class="form-label">Section Content (Optional)</label><br>
                    <textarea class="section_content" id="section_content" name="section_content[]" rows="4" cols="80"></textarea>
                    <span class="error_msg" id="error_content"></span>
                  </div> 
                </div>
              </div>
            </div> -->
            <div class="row">
              <!-- <div class="col-lg-6 text-center">
                <input type="button" class="btn btn-info add_section" id="add_section" value="Add Section">
              </div> -->
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

  /*   $("#section_content").summernote({
    placeholder: '',
    tabsize: 2,
    height: 100
  });*/
</script>
<script>
$(document).ready(function(){
    $("#page_title").keyup(function(e){
       e.preventDefault();
       var title = $("#page_title").val();
       var str = title.replace(/\W+(?!$)/g, '-').toLowerCase();
       str = str.replace(/\W$/, '').toLowerCase();
       $('#page_slug').val(str);
    });

    $("#page_slug").keyup(function(e){
       e.preventDefault();
       var title = $("#page_slug").val();
       var str = title.replace(/\W+(?!$)/g, '-').toLowerCase();
       str = str.replace(/\W$/, '').toLowerCase();
       $('#page_slug').val(str);
    });
});

/*
var i=1;
$('body').on('click', '.add_section', function() {   
    var row='\
    <div class="row mt-3 mb-3" style="padding: 10px;background-color: #eee;">\
        <div class="col-lg-10">\
            <div class="mb-3">\
                <label for="example-text-input" class="form-label">Section</label>\
                <input class="form-control" id="page_section" name="page_section[]" type="text" placeholder="Section Name" />\
                    <span class="error_page_section"></span>\
            </div>\
            <div class="mb-3">\
                <label for="example-text-input" class="form-label">Content</label>\
                <br>\
                <textarea class="section_content" id="section_content'+i+'" name="section_content[]" rows="4" cols="80"></textarea>\
                <span class="error_msg" id="error_content"></span>\
            </div>\
        </div>\
        <div class="col-lg-2">\
            <input type="button" class="btn btn-danger delRow" id="" value="Delete Section">\
        </div>\
    </div>';
    $("#SectioContent").append(row);
    $('#section_content'+i).summernote({
        placeholder: '',
        tabsize: 2,
        height: 100
      });
    i++;
});

$('body').on('click', '.delRow', function() {
    $(this).closest('div.row').remove();
}); */
</script>

@endsection

