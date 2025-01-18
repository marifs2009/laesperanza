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
          <a href="#" class="btn btn-primary d-none d-sm-inline-block"  data-bs-toggle="modal" data-bs-target="#add-new-hotel">
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
      @if(session('hotel_add_success'))
        <div class="alert alert-success"><strong>Success!</strong> {{session('hotel_add_success')}}</div>
      @endif
      @if(session('hotel_add_error'))
        <div class="alert alert-danger"><strong>Error!</strong> {{session('hotel_add_error')}}</div>
      @endif
      
      @if(session('hotel_deleted_success'))
        <div class="alert alert-success"><strong>Success!</strong> {{session('hotel_deleted_success')}}</div>
      @endif
      @if(session('hotel_deleted_error'))
        <div class="alert alert-danger"><strong>Error!</strong> {{session('hotel_deleted_error')}}</div>
      @endif   
      
      @if(session('hotel_edit_success'))
        <div class="alert alert-success"><strong>Success!</strong> {{session('hotel_edit_success')}}</div>
      @endif
      @if(session('hotel_edit_error'))
        <div class="alert alert-danger"><strong>Error!</strong> {{session('hotel_edit_error')}}</div>
      @endif    


      <table id="datatable-buttons" class="table table-bordered dt-responsive">
        <thead>
          <tr>
            <th style="width:5%;">Sr.No.</th>
            <th style="width:8%;">Image</th>
            <th style="width:25%;">Name</th>
            <th style="width:15%;">Location</th>
            <th style="width:8%;">Type</th>
            <th style="width:20%;">Description</th>
            <th style="width:7%;">Status</th>
            <th style="width:12%;">Action</th>
          </tr>
        </thead>
        <tbody>
          @if(!empty($hotels))
            @foreach($hotels as $hotel)
            <tr>
              <td>{{ $loop->index + 1}}</td>
              <td><img style="height:40px;width:auto;" src="{{ asset('storage/' . $hotel->hotel_picture ) }}"></td>
              <td>{{$hotel->hotel_name}}</td>
              <td>{{$hotel->hotel_location}}</td>
              <td>{{$hotel->hotel_type}}</td>
              <td>{{$hotel->hotel_description}}</td>
              <td style="text-align:center;">
                @if($hotel->status == 1)
                  <span class="badge bg-green-lt">Active</span>
                @else 
                  <span class="badge bg-orange-lt">Inactive</span>
                @endif
              </td>
              <td width="10%">
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#edit-slide-{{$hotel->hotel_id}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path><path d="M16 5l3 3"></path></svg>
                </button>
                <div class="modal modal-blur fade" id="edit-slide-{{$hotel->hotel_id}}" tabindex="-1" style="display: none;" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Edit Selected Slide</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                      <form method="post" enctype="multipart/form-data" id="form-hotel-edit-{{$hotel->hotel_id}}" action="{{route('hotel.edit')}}">
                        @csrf
                        <div class="col-md-12 mb-3"> 
                          <p>Hotel Name <span class="required">*</span></p>
                          <input type="text" name="hotel_name" id="hotel_name" class="form-control" placeholder="Enter hotel name" value="{{$hotel->hotel_name}}">
                          <span id="err_hotel_title"></span>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="row">
                            <div class="col-md-3">
                              <p>Existing Picture</p>
                              <img style="height:40px;width:auto;" src="{{ asset('storage/' . $hotel->hotel_picture ) }}">
                              <input type="hidden" name="old_hotel_picture" id="old_hotel_picture" value="{{ $hotel->hotel_picture }}">
                            </div>
                            <div class="col-md-9">
                              <p>New Picture <span class="required">*</span></p>
                              <input type="file" name="hotel_picture" id="hotel_picture" class="form-control" placeholder="Select Picture">
                              <small>Left blank if don't want to change</small>
                              <span id="err_hotel_picture"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <p>Location <span class="required">*</span></p>
                          <input type="text" name="hotel_location" id="hotel_location" class="form-control" placeholder="Enter Sub-title" value="{{$hotel->hotel_location}}">
                        </div>
                        <div class="col-md-12 mb-3">
                          <p>Hotel Type <span class="required">*</span></p>
                          <input type="text" name="hotel_type" id="hotel_type" class="form-control" placeholder="Enter type" value="{{$hotel->hotel_type}}">
                        </div>
                        <div class="col-md-12 mb-3">
                          <p>Other Details <span class="required">*</span></p>
                          <textarea name="hotel_description" id="hotel_description" class="form-control" placeholder="Enter other details">{{$hotel->hotel_description}}</textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                          <p>Status <span class="required">*</span></p>                                
                          <select name="status" id="status" class="form-control">
                            <option value="1" 
                              @if($hotel->status == 1)
                                selected="selected"
                              @endif
                            name="status" id="status_active">Active</option>
                            <option value="0" 
                              @if($hotel->status == 0)
                                selected="selected"
                              @endif
                            name="status" id="status_inactive">Inactive</option>
                          </select>
                        </div>
                        <div class="col-md-12">
                          <input type="hidden" name="hotel_id" value="{{$hotel->hotel_id }}">
                          <input type="button" data-hotel_id="{{$hotel->hotel_id}}" class="btn btn-primary btn-lg btn-block edit_hotel" value="Save"/>
                        </div>
                      </form>  
                    </div>
                    </div>
                  </div>
                </div>
                <button type="button" class="btn" onclick="hotel_delete({{$hotel->hotel_id}});">
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



<!---  Add new hotel popup -->
<div class="modal modal-blur fade" id="add-new-hotel" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New Slide</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" enctype="multipart/form-data" id="form_hotel_save" action="{{route('hotels.store')}}">
        @csrf
        <div class="col-md-12 mb-3"> 
          <p>Hotel Name <span class="required">*</span></p>
          <input type="text" name="hotel_name" id="hotel_name" class="form-control" placeholder="Enter hotel name">
          <span id="err_hotel_title"></span>
        </div>
        <div class="col-md-12 mb-3">
          <p>Hotel Picture <span class="required">*</span></p>
          <input type="file" name="hotel_picture" id="hotel_picture" class="form-control" placeholder="Select Picture">
          <span id="err_hotel_picture"></span>
        </div>
        <div class="col-md-12 mb-3"> 
          <p>Hotel Location <span class="required">*</span></p>
          <input type="text" name="hotel_location" id="hotel_location" class="form-control" placeholder="Enter hotel location">
          <span id="err_hotel_title"></span>
        </div>
        <div class="col-md-12 mb-3"> 
          <p>Hotel Type <span class="required">*</span></p>
          <input type="text" name="hotel_type" id="hotel_type" class="form-control" placeholder="Enter hotel location">
          <span id="err_hotel_title"></span>
        </div>
        <div class="col-md-12 mb-3">
          <p>Detail Description</p>
          <textarea name="hotel_description" id="hotel_description" class="form-control" placeholder="Enter hotel description"></textarea>
        </div>
        <div class="col-md-12 mb-3">
          <p>Status <span class="required">*</span></p>                                
          <select name="status" id="status" class="form-control">
            <option value="1" name="status" id="status_active" selected="selected">Active</option>
            <option value="0" name="status" id="status_inactive">Inactive</option>
          </select>
        </div>
        <div class="col-md-12">
          <input class="btn btn-primary" type="submit" class="btn btn-lg btn-block" value="Save"/>
        </div>
      </form>  
      </div>
    </div>
  </div>
</div>

@endsection
@section('page_script')


<script>
  $("#form_hotel_save").submit(function( event ) {
    $("#err_hotel_name").hide();
    $("#err_hotel_location").hide();
    $("#err_hotel_type").hide();
    $("#err_hotel_description").hide();
    $("#err_hotel_picture").hide();

    if($("#hotel_name").val() == ""){
      $("#err_hotel_name").css('color','red').text("hotel name required!").show();
      $("#hotel_name").focus();
      event.preventDefault();
    }
    else if($("#hotel_location").val() == ""){
      $("#err_hotel_location").css('color','red').text("hotel location is required!").show();
      $("#hotel_location").focus();
      event.preventDefault();
    }
    else if($("#hotel_type").val() == ""){
      $("#err_hotel_type").css('color','red').text("hotel type is required!").show();
      $("#hotel_type").focus();
      event.preventDefault();
    }
    else if($("#err_hotel_description").val() == ""){
      $("#err_hotel_description").css('color','red').text("hotel description is required!").show();
      $("#err_hotel_description").focus();
      event.preventDefault();
    }
    else if($("#hotel_picture").val() == ""){
      $("#err_hotel_picture").css('color','red').text("hotel picture is required!").show();
      $("#hotel_picture").focus();
      event.preventDefault();
    }
  });
</script>

<script>
  function hotel_delete(hotel_id){
    Swal.fire({
      title: "Are you sure?",
      text: "you want to delete the selected hotel.",
      showCancelButton: true,
      confirmButtonColor: "#2ab57d",
      cancelButtonColor: "#fd625e",
      confirmButtonText: "Yes, Delete!"
    }).then(function (result) {
      if (result.value) {

        var formData = new FormData();
        formData.append('hotel_id', hotel_id);
        formData.append('_token', '{{ csrf_token() }}');

        $.ajax({
          url: "{{route('hotel.delete')}}",
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
  $(".edit_hotel").click(function(){
    var hotel_id = $(this).data("hotel_id");
    var formData = new FormData($('#form-hotel-edit-'+hotel_id)[0]);
    var is_form_valid = validation_role();

    if(is_form_valid){
      //$("#submit-role").prop('disabled', false);
      $("#loading-role").show();
      $.ajax({
        url: "{{route('hotel.edit')}}",
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