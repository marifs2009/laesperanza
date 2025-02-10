@extends('admin.app')
@section('title', $page_title)

@section('page_css')
  <style>
    .btn .icon { margin: 0; }
    .tox-statusbar__branding {display: none;}
    .container-xl {max-width: 1340px!important;}
  </style>
@endsection
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <div class="page-pretitle">Master</div>
        <h2 class="page-title">{{ $page_title }}</h2>
      </div>
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
          <a href="#" class="btn btn-primary d-none d-sm-inline-block"  data-bs-toggle="modal" data-bs-target="#add-new-slider">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
            Add New Slide
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page body -->
<div class="page-body">
  <div class="row">
    <div class="col-xl-12 col-md-12">
      <span id="err_msg"></span>
      @if(session('slider_add_success'))
        <div class="alert alert-success"><strong>Success!</strong> {{session('slider_add_success')}}</div>
      @endif
      @if(session('slider_add_error'))
        <div class="alert alert-danger"><strong>Error!</strong> {{session('slider_add_error')}}</div>
      @endif
      
      @if(session('slider_deleted_success'))
        <div class="alert alert-success"><strong>Success!</strong> {{session('slider_deleted_success')}}</div>
      @endif
      @if(session('slider_deleted_error'))
        <div class="alert alert-danger"><strong>Error!</strong> {{session('slider_deleted_error')}}</div>
      @endif   
      
      @if(session('slider_edit_success'))
        <div class="alert alert-success"><strong>Success!</strong> {{session('slider_edit_success')}}</div>
      @endif
      @if(session('slider_edit_error'))
        <div class="alert alert-danger"><strong>Error!</strong> {{session('slider_edit_error')}}</div>
      @endif    


      <table id="datatable-buttons" class="table table-bordered dt-responsive">
        <thead>
          <tr>
            <th style="width:4%;">Order</th>
            <th style="width:5%;">Image</th>
            <th style="width:22%;">Alt Text</th>
            <th style="width:10%;">Title</th>
            <th style="width:10%;">Sub-title</th>
            <th style="width:10%;">Button Label</th>
            <th style="width:22%;">Button Link</th>
            <th style="width:5%;">Status</th>
            <th style="width:12%;">Action</th>
          </tr>
        </thead>
        <tbody>
          @if(!empty($selected_slider))
            @foreach($selected_slider as $sel_slider)
            <tr>
              <td>{{$sel_slider->slider_order}}</td>
              <td><img style="height:40px;width:auto;" src="{{ asset('storage/' . $sel_slider->slider_picture ) }}"></td>
              <td>{{$sel_slider->slider_title}}</td>
              <td>{{$sel_slider->slider_picture_alt}}</td>
              <td>{{$sel_slider->slider_subtitle}}</td>
              <td>{{$sel_slider->slider_button_caption}}</td>
              <td>{{$sel_slider->slider_button_link}}</td>
              <td style="text-align:center;">
                @if($sel_slider->status == 1)
                  <span class="badge bg-green-lt">Active</span>
                @else 
                  <span class="badge bg-orange-lt">Inactive</span>
                @endif
                <!-- <label class="form-check form-switch">
                  <input class="form-check-input" style="margin-left:-27px;margin-top:10px" type="checkbox" @if($sel_slider->status == 1) checked="checked" @endif data-bs-toggle="tooltip" data-bs-placement="top" title="Click here to Active and Inactive this slide">
                </label> -->
              </td>
              <td width="10%">
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#edit-slide-{{$sel_slider->slider_id}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path><path d="M16 5l3 3"></path></svg>
                </button>
                <div class="modal modal-blur fade" id="edit-slide-{{$sel_slider->slider_id}}" tabindex="-1" style="display: none;" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Edit Selected Slide</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                      <form method="post" enctype="multipart/form-data" id="form-slider-edit-{{$sel_slider->slider_id}}" action="{{route('slider.edit')}}">
                        @csrf
                        <div class="col-md-12 mb-3"> 
                          <p>Slide Title <span class="required">*</span></p>
                          <input type="text" name="slider_title" id="slider_title_{{$sel_slider->slider_id}}" class="form-control" placeholder="Enter slider Label" value="{{$sel_slider->slider_title}}">
                          <span id="err_slider_title_{{$sel_slider->slider_id}}"></span>
                        </div>
                        <div class="col-md-12 mb-3">
                          <p>Enter Sub-title (Optional)</p>
                          <input type="text" name="slider_subtitle" id="slider_subtitle_{{$sel_slider->slider_id }}" class="form-control" placeholder="Enter Sub-title" value="{{$sel_slider->slider_subtitle}}">
                        </div>
                        <div class="col-md-12 mb-3">
                          <p>Button Caption (Optional)</p>
                          <input type="text" name="slider_button_caption" id="slider_button_caption_{{$sel_slider->slider_id }}" class="form-control" placeholder="Enter button caption" value="{{$sel_slider->slider_button_caption}}">
                        </div>
                        <div class="col-md-12 mb-3">
                          <p>Button Link (Optional)</p>
                          <input type="text" name="slider_button_link" id="slider_button_link_{{$sel_slider->slider_id }}" class="form-control" placeholder="Enter button link" value="{{$sel_slider->slider_button_link}}">
                        </div>
                        <div class="col-md-12 mb-3">
                          <p>Slide Order <span class="required">*</span></p>
                          <input type="number" name="slider_order" id="slider_order_{{$sel_slider->slider_id }}" class="form-control" placeholder="Enter order of slider" value="{{$sel_slider->slider_order}}">
                          <span id="err_slider_order_{{$sel_slider->slider_id }}"></span>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="row">
                            <div class="col-md-3">
                              <p>Existing Picture</p>
                              <img style="height:40px;width:auto;" src="{{ asset('storage/' . $sel_slider->slider_picture ) }}">
                              <input type="hidden" name="old_slider_picture" id="old_slider_picture" value="{{ $sel_slider->slider_picture }}">
                            </div>
                            <div class="col-md-9">
                              <p>New Picture <span class="required">*</span></p>
                              <input type="file" name="slider_picture" id="slider_picture_{{$sel_slider->slider_id }}" class="form-control" placeholder="Select Picture">
                              <small>Left blank if don't want to change</small>
                              <span id="err_slider_picture_{{$sel_slider->slider_id }}"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <p>Picture Alt (Optional)</p>
                          <textarea name="slider_picture_alt" id="slider_picture_alt_{{$sel_slider->slider_id }}" class="form-control" placeholder="Enter Alt Text">{{$sel_slider->slider_picture_alt}}</textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                          <p>Status <span class="required">*</span></p>                                
                          <select name="status" id="status" class="form-control">
                            <option value="1" 
                              @if($sel_slider->status == 1)
                                selected="selected"
                              @endif
                            name="status" id="status_active">Active</option>
                            <option value="0" 
                              @if($sel_slider->status == 0)
                                selected="selected"
                              @endif
                            name="status" id="status_inactive">Inactive</option>
                          </select>
                        </div>
                        <div class="col-md-12">
                          <input type="hidden" name="slider_type_id" value="{{ $slider_type_id }}">
                          <input type="hidden" name="slider_id" value="{{$sel_slider->slider_id }}">

                          <input type="button" data-slider_id="{{$sel_slider->slider_id}}" class="btn btn-primary btn-lg btn-block edit_slider" value="Save"/>
                        </div>
                      </form>  
                    </div>
                    </div>
                  </div>
                </div>
                <button type="button" class="btn" onclick="slider_delete({{$sel_slider->slider_id}});">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 7l16 0"></path><path d="M10 11l0 6"></path><path d="M14 11l0 6"></path><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path></svg>
                </button>
              </td>
            </tr>
            @endforeach
          @endif
        </tbody>
      </table>                
    </div>
  </div>
</div>



<!---  Add new slider popup -->
<div class="modal modal-blur fade" id="add-new-slider" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New Slide</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" enctype="multipart/form-data" id="form_slider_save" action="{{route('sliders.store')}}">
        @csrf
        <div class="col-md-12 mb-3"> 
          <p>Slide Title <span class="required">*</span></p>
          <input type="text" name="slider_title" id="slider_title" class="form-control" placeholder="Enter slider Label">
          <span id="err_slider_title"></span>
        </div>
        <div class="col-md-12 mb-3">
          <p>Enter Sub-title (Optional)</p>
          <input type="text" name="slider_subtitle" id="slider_subtitle" class="form-control" placeholder="Enter Sub-title">
        </div>
        <div class="col-md-12 mb-3">
          <p>Button Caption (Optional)</p>
          <input type="text" name="slider_button_caption" id="slider_button_caption" class="form-control" placeholder="Enter button caption">
        </div>
        <div class="col-md-12 mb-3">
          <p>Button Link (Optional)</p>
          <input type="text" name="slider_button_link" id="slider_button_link" class="form-control" placeholder="Enter button link">
        </div>
        <div class="col-md-12 mb-3">
          <p>Slide Order <span class="required">*</span></p>
          <input type="number" name="slider_order" id="slider_order" class="form-control" placeholder="Enter order of slider">
          <span id="err_slider_order"></span>
        </div>
        <div class="col-md-12 mb-3">
          <p>Slide Picture <span class="required">*</span></p>
          <input type="file" name="slider_picture" id="slider_picture" class="form-control" placeholder="Select Picture">
          <span id="err_slider_picture"></span>
        </div>
        <div class="col-md-12 mb-3">
          <p>Picture Alt (Optional)</p>
          <textarea name="slider_picture_alt" id="slider_picture_alt" class="form-control" placeholder="Enter Alt Text"></textarea>
        </div>
        <div class="col-md-12 mb-3">
          <p>Status <span class="required">*</span></p>                                
          <select name="status" id="status" class="form-control">
            <option value="1" name="status" id="status_active" selected="selected">Active</option>
            <option value="0" name="status" id="status_inactive">Inactive</option>
          </select>
        </div>
        <div class="col-md-12">
          <input type="hidden" name="slider_type_id" value="{{ $slider_type_id }}">
          <input class="btn btn-primary" type="submit" value="Save"/>
        </div>
      </form>  
      </div>
    </div>
  </div>
</div>

@endsection
@section('page_script')


<script>
  $("#form_slider_save").submit(function( event ) {
    $("#err_slider_title").hide();
    $("#err_slider_order").hide();
    $("#err_slider_picture").hide();
    $("#err_status").hide();
    if($("#slider_title").val() == ""){
      $("#err_slider_title").css('color','red').text("Slider title is required!").show();
      $("#slider_title").focus();
      event.preventDefault();
    }
    else if($("#slider_order").val() == ""){
      $("#err_slider_order").css('color','red').text("Slider order is required!").show();
      $("#slider_order").focus();
      event.preventDefault();
    }
    else if($("#slider_picture").val() == ""){
      $("#err_slider_picture").css('color','red').text("Slider picture is required!").show();
      $("#slider_picture").focus();
      event.preventDefault();
    }
  });
</script>

<script>
  function slider_delete(slider_id){
    Swal.fire({
      title: "Are you sure?",
      text: "you want to delete the selected slider.",
      showCancelButton: true,
      confirmButtonColor: "#2ab57d",
      cancelButtonColor: "#fd625e",
      confirmButtonText: "Yes, Delete!"
    }).then(function (result) {
      if (result.value) {

        var formData = new FormData();
        formData.append('slider_id', slider_id);
        formData.append('_token', '{{ csrf_token() }}');

        $.ajax({
          url: "{{route('slider.delete')}}",
          type: 'POST',
          dataType: 'json',
          data: formData,
          cache : false,
          processData: false,
          contentType: false,
          success: function(response)
          {
            $("#loading-role").hide();
            //response=JSON.parse(response);
            console.log(response);
            if(response.status == 1){       
              Swal.fire({icon: "success", title: 'Success', text: response.msg, showCancelButton: false
              }).then((confirmed) => {
                window.location.reload();
              });
            } else {
              Swal.fire({icon: "error", title: 'Erorr', text: response.msg, showCancelButton: false
              }).then((confirmed) => {
                return false;
              });
            }
          }
        });
      }
    });
  }
</script>

<script>
  $(".edit_slider").click(function(){
    var slider_id = $(this).data("slider_id");
    var formData = new FormData($('#form-slider-edit-'+slider_id)[0]);
    var is_form_valid = validation_role();

    if(is_form_valid){
      //$("#submit-role").prop('disabled', false);
      $("#loading-role").show();
      $.ajax({
        url: "{{route('slider.edit')}}",
        type: 'POST',
        dataType: 'json',
        data: formData,
        cache : false,
        processData: false,
        contentType: false,
        success: function(response)
        {
          $("#loading-role").hide();
          //response=JSON.parse(response);
          console.log(response);
          if(response.status == 1){       
            // $("#submit-role").prop('disabled', false);
            Swal.fire({icon: "success", title: 'Success', text: response.msg, showCancelButton: false
            }).then((confirmed) => {
              window.location.reload();
            });
          } else {
            // $("#submit-role").prop('disabled', false);
            Swal.fire({icon: "error", title: 'Erorr', text: response.msg, showCancelButton: false
            }).then((confirmed) => {
              return false;
            });
          }
        }
      });
    } else {
      $("#loading-role").hide();
      //$("#submit-role").prop('disabled', false);
    }
  });

  function validation_role(){
    is_form_valid = true;
    // var role = $('#role').val();
    // if(role==''){
    //   $('#role').focus();
    //   $('#error_role').html('Please enter role');
    //   $('html,body').animate({scrollTop: $("#role").offset().top - 190},'slow');
    //   is_form_valid=false;
    //   return false;
    // } else {
    //   $('#error_role').html('');
    // }
    if(!is_form_valid){return false;}
    else{return true;}
  }
</script>
@endsection