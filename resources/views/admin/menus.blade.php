@extends('admin.app')
@section('title', $page_title)

@section('page_css')
  <style>
    .btn .icon { margin: 0; }
    .tox-statusbar__branding {display: none;}
  </style>
  <!-- Place the first <script> tag in your HTML's <head> -->
<script src="https://cdn.tiny.cloud/1/0t2f0s5s90yjv2wemlhe9nr8y6g93g6j7y799xxqvi1hzw03/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
  tinymce.init({
    selector: 'textarea',

    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',

    setup: function (editor) {
        editor.on('change', function () {
            tinymce.triggerSave();
        });
    }
  });
</script>
@endsection
@section('content')
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                  {{ $page_title }}
                </h2>
              </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="row">
            <div class="col-xl-8 col-md-8">
                <table id="datatable-buttons" class="table table-bordered dt-responsive">
                    <thead>
                      <tr>
                        <th style="width:10%;">Order</th>
                        <th style="width:20%;">Label</th>
                        <th style="width:30%;">Link to Page</th>
                        <th style="width:20%;">Parent Menu</th>
                        <th style="width:10%;">Status</th>
                        <th style="width:10%;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(!empty($selected_menu))
                        @foreach($selected_menu as $sel_menu)
                        <tr>
                          <td>{{$sel_menu->menu_order}}</td>
                          <td>{{$sel_menu->menu_label}}</td>
                          <td>
                            @if (empty($sel_menu->menu_link) )
                              #
                            @elseif (is_numeric($sel_menu->menu_link) && $sel_menu->menu_link > 0)
                              {{$sel_menu->page_title}}
                            @else
                              {{$sel_menu->menu_link}}
                            @endif
                          <td>{{ $sel_menu->menu_parent_id }} 
                            @if($sel_menu->menu_parent_id == 0) 
                              No Parent 
                            @else 
                              {{ $sel_menu->menu_parent_id }} 
                            @endif</td>
                          <td class="text-center">
                            @if($sel_menu->status == 1)
                              <span class="badge bg-lime-lt">Active</span>
                            @else 
                              <span class="badge bg-red-lt">Inactive</span>
                            @endif
                          </td>
                          <td> 
                            @php
                                   $encrypt_menu_id=Crypt::encrypt($sel_menu->menu_id);
                              @endphp
                            <a type="button" class="btn" href="{{ route('menu.edit', ['encrypt_menu_id' => $encrypt_menu_id,'menu_type_id'=>$menu_type_id]) }}">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path><path d="M16 5l3 3"></path></svg>
                            </a>


                          <form method="post" id="form_menu_delete" action="{{route('menu.delete')}}">
                              @csrf
                              <input type="hidden" name="menu_type_id" value="{{ $menu_type_id}}">
                            <button type="submit" class="btn" >
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 7l16 0"></path><path d="M10 11l0 6"></path><path d="M14 11l0 6"></path><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path></svg>
                            </button>
                          </form>

:
                          </td>
                        </tr>
                        @endforeach
                      @endif
                    </tbody>
                </table>                
            </div>
            <div class="col-xl-4 col-md-4">
              <div class="card">
                <div class="card-body"> 
                  <!-- Display Success Message -->
                  @if(session('menu_add_success'))
                    <div class="alert alert-success">
                      <strong>Success!</strong> {{ session('menu_add_success') }}
                    </div>
                  @endif
                  <!-- Display Error Message -->
                  @if(session('menu_add_error'))
                    <div class="alert alert-danger">
                      <strong>Error!</strong> {{ session('menu_add_error') }}
                    </div>
                  @endif
                  <!-- Display delete Message -->

                  @if(session('menu_delete_success'))
                  <div class="alert alert-success">
                    <strong>Success!</strong> {{ session('menu_delete_success') }}
                  </div>
                @endif
                <!-- Display Error Message -->
                @if(session('menu_delete_error'))
                  <div class="alert alert-danger">
                    <strong>Error!</strong> {{ session('menu_delete_error') }}
                  </div>
                @endif


                  <form method="post" id="form_menu_save" action="{{route('menus.store')}}">
                    @csrf
                    <h4 class="page-title mb-3 font-size-18">Add New Menu</h4>
                    <div class="col-md-12 mb-3"> 
                        <p>Menu Label <span class="required">*</span></p>
                        <input type="text" name="menu_label" id="menu_label" class="form-control" placeholder="Enter menu Label">
                        <span id="err_menu_label"></span>
                    </div>
                    <div class="col-md-12 mb-3">
                        <p>Link to Page  <span class="required">*</span></p>
                        <select name="page_id" class="form-control">
                          <option value="">Select</option>
                          @if(!empty($pages))
                            @foreach($pages as $p)
                              <option value="{{ $p->page_id}}">{{ $p->page_title}}</option>
                            @endforeach
                          @endif
                        </select>
                        <small>If selected a page then custom link will be ignore during save the menu</small>
                    </div>
                    <div style="text-align: center;">or</div>
                    <p>Link to Custom URL <span class="required">*</span></p>
                    <div class="col-md-12 mb-3">
                        <input type="text" name="custom_link" id="custom_link" class="form-control" placeholder="Enter custom link">
                    </div>

                    <div class="col-md-12 mb-3">
                        <p>Parent Menu (Option)</p>
                        <select name="parent_menu_id" class="form-control">
                          <option value="0">No Parent</option>
                          @if(!empty($parent_menus))
                            @foreach($parent_menus as $pmanu)
                              <option value="{{ $pmanu->menu_id}}">{{ $pmanu->menu_label}}</option>
                            @endforeach
                          @endif
                        </select>
                        <small>If not selected then present menu will become parent</small>
                    </div>


                    <div class="col-md-12 mb-3">
                        <p>Menu Order <span class="required">*</span></p>
                        <input type="number" name="menu_order" id="menu_order" class="form-control" placeholder="Enter order of menu">
                        <span id="err_menu_order"></span>
                    </div>
                    <div class="col-md-12 mb-3">
                        <p>Status <span class="required">*</span></p>                                
                        <select name="status" id="status" class="form-control">
                            <option value="1" name="status" id="status">Active</option>
                            <option value="0" name="status" id="status">Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <input type="hidden" name="menu_type_id" value="{{ $menu_type_id}}">
                        <input class="btn btn-primary" type="submit" class="btn btn-lg btn-block" value="Save"/>
                    </div>
                  </form>    
                  </div>
                </div>                            
            </div>
        </div>
    </div>
</div>




        </div>
@endsection
@section('page_script')


<script>
$( "#form_menu_save" ).submit(function( event ) {
    $("#err_menu_label").hide();
    $("#err_menu_order").hide();
   if($("#menu_label").val() == ""){
        $("#err_menu_label").css('color','red').text("Menu label is required!").show();
        $("#menu_label").focus();
        event.preventDefault();
    }
    else if($("#menu_order").val() == ""){
        $("#err_menu_order").css('color','red').text("Menu order is required!").show();
        $("#menu_order").focus();
        event.preventDefault();
    }
});
  function delete_menu(url){
    Swal.fire({
      title: "Are you sure?",
      text: "you want to delete the selected menu!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#2ab57d",
      cancelButtonColor: "#fd625e",
      confirmButtonText: "Yes, Delete!"
    }).then(function (result) {
      if (result.value) {
        window.location.href=url;
      }
    });
  }
</script>




  <script>
    $("#submit-role").click(function(){ 
      //$("#submit-role").prop('disabled', true);
      var formData=new FormData($('#form-role')[0]);
      var is_form_valid=validation_role();

      if(is_form_valid){
        //$("#submit-role").prop('disabled', false);
        $("#loading-role").show();
        $.ajax({
          url: "{{route('admin.role.store')}}",
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
              //$("#submit-role").prop('disabled', false);
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