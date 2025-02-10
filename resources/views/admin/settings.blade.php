@extends('admin.app')
@section('title', 'Page Title')

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
                  General Settings
                </h2>
              </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="card">
              <div class="row g-0">
                <div class="col-12 col-md-3 border-end">
                  <div class="card-body">
                    <h4 class="subheader">Settings</h4>
                    <div class="list-group list-group-transparent">
                      <a href="javascript:void(0)" id="general_settings" onclick="show_hide_box('general_settings');" class="list-group-item list-group-item-action d-flex align-items-center active">General Settings</a>
                      <a href="javascript:void(0)" id="roles" onclick="show_hide_box('roles');" class="list-group-item list-group-item-action d-flex align-items-center">Role</a>
                      <a href="javascript:void(0)" id="meals" onclick="show_hide_box('meals');" class="list-group-item list-group-item-action d-flex align-items-center">Meals</a>
                      <a href="javascript:void(0)" id="menu_type" onclick="show_hide_box('menu_type');" class="list-group-item list-group-item-action d-flex align-items-center">Menu Types</a>
                      <a href="javascript:void(0)" id="slider_type" onclick="show_hide_box('slider_type');" class="list-group-item list-group-item-action d-flex align-items-center">Slider Types</a>
                      <a href="javascript:void(0)" id="tour_type" onclick="show_hide_box('tour_type');" class="list-group-item list-group-item-action d-flex align-items-center">Tour Types</a>
                      <a href="javascript:void(0)" id="tags" onclick="show_hide_box('tags');" class="list-group-item list-group-item-action d-flex align-items-center">Tags</a>
                      <a href="javascript:void(0)" id="activity" onclick="show_hide_box('activity');" class="list-group-item list-group-item-action d-flex align-items-center">Activities</a>
                      <a href="javascript:void(0)" id="offers" onclick="show_hide_box('offers');" class="list-group-item list-group-item-action d-flex align-items-center">Offers</a>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-9 d-flex flex-column">
                  <div class="card-body box" id="general_settings_box">
                    <h2 class="mb-4">General Setting</h2>
                    <h3 class="card-title">Logo</h3>
                    <form id="form-logo" method="post">
                    @csrf
                    <div class="row align-items-center mb-2">
                      <div class="col-auto">
                        <img style="height:50px;" src ="{{ asset('storage/' . $logo) }}"/>
                      </div>
                      <div class="col-auto">
                        <input type="file" name="logo" class="form-control">
                      </div> 
                      <div class="col-auto">
                        <button type="button" id="update-logo" class="btn btn-primary ms-auto">
                          <span id="loading-logo" style="display:none;"><i class="fa fa-spinner fa-spin"></i>&nbsp;</span> 
                          Update
                        </button>
                      </div>                      
                    </div>
                    </form>
                    <form id="form-general-setting" method="post">
                      @csrf
                    <div class="mb-3 row">
                      <label class="col-3 col-form-label required">Business Name</label>
                      <div class="col">             
                        <input type="text" value="{{ $businessName }}" class="form-control" name="business_name" placeholder="Enter Business name">
                        <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label class="col-3 col-form-label required">Business Location</label>
                      <div class="col">
                        <input type="text" value="{{ $businessLocation }}" class="form-control" name="business_location" placeholder="Enter Business Location">
                        <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                      </div>
                    </div>                    
                    <div class="mb-3 row">
                      <label class="col-3 col-form-label required">Email address</label>
                      <div class="col">
                        <input type="email" value="{{ $businessEmail }}" class="form-control" name="email" placeholder="Enter email">
                        <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label class="col-3 col-form-label required">Contact Number</label>
                      <div class="col">
                        <input type="text" value="{{ $businessContact }}" class="form-control" name="contact_number" placeholder="Contact Number">
                        <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label class="col-3 col-form-label required">Copyright Text</label>
                      <div class="col">
                        <input type="text" value="{{ $copyright }}" class="form-control" name="copyright_text" placeholder="Enter Copyright Text">
                        <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label class="col-3 col-form-label required">Admin Email</label>
                      <div class="col">
                        <input type="text" value="{{ $adminEmail }}" class="form-control" name="admin_email" placeholder="Enter Admin Email">
                        <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label class="col-3 col-form-label required">WhatsApp Number</label>
                      <div class="col">
                        <input type="text" value="{{ $whatsApp }}" class="form-control" name="whatsapp_number" placeholder="Enter WhatsApp Number">
                        <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label class="col-3 col-form-label required">Currency Symbol</label>
                      <div class="col">
                        <input type="text" value="{{ $currency_symbol }}" class="form-control" name="currency_symbol" placeholder="Enter Currency Symbol">
                        <!-- <small class="form-hint">We'll never share your email with anyone else.</small> -->
                      </div>
                    </div>                    
                    <div class="card-footer bg-transparent mt-auto">
                      <div class="btn-list justify-content-end">
                        <button type="button" id="submit-general-setting" class="btn btn-primary">
                          <span id="loading-general-setting" style="display:none;"><i class="fa fa-spinner fa-spin"></i>&nbsp;</span> 
                             Update
                        </button>
                      </div>
                    </div>
                    </form>
                  </div>
<!--  //////////////////////////////////////////////////////////// -->
                  <div class="card-body box" id="roles_box" style="display:none;">
                    <h2 class="mb-4">User Roles</h2>
                    <!-- <h3 class="card-title">Add User Roles</h3> -->
                    <form id="form-role" method="post">
                      @csrf                      
                      <div class="row align-items-center mt-2 mb-2">
                        <div class="col-auto">
                          Add new role
                        </div> 
                        <div class="col-auto">
                          <input type="text" name="role" class="form-control" placeholder="Add new role">
                        </div> 
                        <div class="col-auto">
                          <button id="submit-role" type="button" class="btn btn-primary ms-auto">
                            <span id="loading-role" style="display:none;"><i class="fa fa-spinner fa-spin"></i>&nbsp;</span> Add
                          </button>                          
                        </div>                      
                      </div>
                    </form>
                    <div class="col-12">
                      <div class="card">
                        <div class="table-responsive">

                          @if(session('role_delete_success'))
                           <div class="alert alert-success">
                             <strong>Success!</strong> {{ session('role_delete_success') }}
                           </div>
                          @endif

                          @if(session('role_delete_error'))
                          <div class="alert alert-success">
                            <strong>! Error</strong>{{session('role_delete_error')}}
                          </div>
                          @endif

                          @if(session('role_update_success'))
                          <div class="alert alert-success">
                            <strong>!Success</strong>{{session('role_update_success')}}
                          </div>
                          @endif
                          @if(session('role_update_error'))
                          <div class="alert alert-error">
                            <strong>!Error</strong>{{session('role_updated_error')}}
                          </div>
                          @endif

                          <table class="table table-vcenter card-table table-striped">
                            <thead>
                              <tr>
                                <th>Sr. No.</th>
                                <th>Role</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            @if (!empty($allRoles))
                            @foreach ($allRoles as $role)
                              <tr>
                                <td width="10%">{{ $loop->index + 1 }}</td>
                                <td width="70%">{{ $role->name }}</td>
                                <td width="20%">
                                  <button type="submit" class="btn" data-bs-toggle="modal" data-bs-target="#modal-edit-role-{{ $role->id }}">
                                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                  </button>
                                  <div class="modal modal-blur fade" id="modal-edit-role-{{ $role->id }}" tabindex="-1" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title">Roles</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form id="form-update-role" method="post" action={{route('admin.role.update')}}>
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $role->id}}" >
                                          <div class="modal-body">
                                            <h5 class="modal-title">Edit role</h5>
                                              <div class="col-auto">
                                                <input type="text" value="{{ $role->name }}" name="role" class="form-control" placeholder="Update role">
                                              </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary"   data-bs-dismiss="modal">Save</button>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                  <form id="form-delete-role" method="post" action="{{route('admin.role.delete')}}" value="{{$role->id}}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $role->id}}" >
                                  <button type="submit" class="btn">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                  </button>
                                  </form>
                                </td>
                              </tr>
                              @endforeach

                              @endif
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--  //////////////////////////////////////////////////////////// -->
 
                  <div class="card-body box" id="meals_box" style="display:none;">
                    <h2 class="mb-4">Meals</h2>
                    <!-- <h3 class="card-title">Add Meals</h3> -->
                    <form id="form-meals" method="post">
                    @csrf
                      <div class="col-12 mt-2 mb-2">
                        <div>Meal Name </div> 
                        <input type="text" name="meal_type_name" class="form-control" placeholder="Add new meal">
                      </div>
                      <div class="col-12 mt-2 mb-2">
                        <div>Description</div> 
                        <textarea name="meal_type_description" id="meal_type_description" class="form-control" placeholder="Add Meal Detail"></textarea>
                      </div>
                      <div class="col-12 mt-2 mb-5 text-center">
                        <button id="submit-meals" type="button" class="btn btn-primary ms-auto">
                        <span id="loading-meals" style="display:none;"><i class="fa fa-spinner fa-spin"></i>&nbsp;</span> Add</button>
                      </div>                      
                    </form>
                    <div class="col-12">
                      <div class="card">
                        <div class="table-responsive">

                          @if(session('meal_delete_success'))
                          <div class="alert alert-success">
                            <strong>!Success</strong>{{session('meal_delete_success')}}
                          </div>
                          @endif
                          @if(session('meal_delete_error'))
                          <div class="alert alert-success">
                            <strong>!Error</strong>{{session('meal_delete_eroor')}}
                          </div>
                          @endif

                          @if(session('meal_update_success'))
                          <div class="alert alert-success">
                            <strong>!Success</strong>{{session('meal_update_success')}}
                          </div>
                          @endif
                          @if(session('meal_update_error'))
                          <div class="alert alert-success">
                            <strong>!Error</strong>{{session('meal_update_error')}}
                          </div>
                          @endif

                          <table class="table table-vcenter card-table table-striped">
                            <thead>
                              <tr>
                                <th width="10%">Sr. No.</th>
                                <th width="20%">Meals</th>
                                <th width="50%">Description</th>
                                <th width="25%">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            @if (!empty($allmeals))
                              @foreach ($allmeals as $meal)
                              <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $meal->meal_type_name }}</td>
                                <td>{!! $meal->meal_type_description !!}</td>
                                <td>
                                  <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modal-simple">
                                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                  </button>
                                  <div class="modal modal-blur fade" id="modal-simple" tabindex="-1" style="display: none;" aria-hidden="true"  role="document">
                                    <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title">Meals</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form id="form-edit-meal" method="post" action="{{route('admin.meals.update')}}">
                                        @csrf
                                        <input type="hidden" name="meal_type_id" value="{{ $meal->meal_type_id}}" >
                                          <div class="modal-body">
                                            <h5 class="modal-title">Edit Meal</h5>
                                            <div class="col-12 mt-2 mb-2">
                                              <div>Meal Name </div> 
                                              <input type="text" name="meal_type_name" class="form-control" placeholder="Add new meal" value="{{ $meal->meal_type_name }}">
                                            </div>
                                            <div class="col-12 mt-2 mb-2">
                                              <div>Description</div> 
                                              <textarea name="meal_type_description" id="meal_type_description" class="form-control" placeholder="Add Meal Detail">{{ $meal->meal_type_description }}</textarea>
                                            </div>
                                         </div>
                                          <div class="modal-footer">
                                            <button id="submit-meals" type="submit" class="btn btn-primary ms-auto">
                                            <span id="loading-meals" style="display:none;"><i class="fa fa-spinner fa-spin"></i>&nbsp;</span> Update</button>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                  <form id="form-delete-meals" method="post" action="{{route('admin.meals.delete')}}" value="{{$meal->meal_type_id}}">
                                    @csrf
                                    <input type="hidden" name="meal_type_id" value="{{ $meal->meal_type_id}}" >
                                  <button type="submit" class="btn">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                  </button>
                                  </form>
                                </td>
                              </tr>                              
                              @endforeach
                              @endif
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--  //////////////////////////////////////////////////////////// -->
 
                  <div class="card-body box" id="menu_type_box" style="display:none;">
                    <h2 class="mb-4">Menu Types</h2>
                    <!-- <h3 class="card-title">Add Menus</h3> -->
                    <form id="form-menu-type" method="post">
                    @csrf
                      <div class="col-12 mt-2 mb-2">
                        <div>Menu Name </div> 
                        <input type="text" name="menu_type_name" class="form-control" placeholder="Add new menu">
                      </div>
                      <div class="col-12 mt-2 mb-2">
                        <div>Description</div> 
                        <textarea name="menu_type_description" id="menu_type_description" class="form-control" placeholder="Add Menu Detail"></textarea>
                      </div>
                      <div class="col-12 mt-2 mb-5 text-center">
                        <button id="submit-menu-type" type="button" class="btn btn-primary ms-auto">
                        <span id="loading-menu-type" style="display:none;"><i class="fa fa-spinner fa-spin"></i>&nbsp;</span> Add</button>
                      </div>                      
                    </form>
                    <div class="col-12">
                      <div class="card">
                        <div class="table-responsive">

                          @if(session('menutype_delete_success'))
                          <div class="alert alert-success">
                            <strong>!Success</strong>{{session('menutype deleted successfully')}}
                          </div>
                          @endif

                          @if(session('menutype_delete_error'))
                          <div class="alert alert-error">
                            <strong>!Error</strong>{{session('menutype_delete_error')}}
                          </div>
                          @endif


                          @if(session('menu_type_update_success'))
                          <div class="alert alert-success">
                            <strong>!success</strong>{{session('menu_type_update_success')}}
                          </div>
                          @endif
                          @if(session('menu_type_update_error'))
                          <div class="alert alert-error">
                            <strong>!success</strong>{{session('menu_type_update_error')}}
                          </div>
                          @endif



                          <table class="table table-vcenter card-table table-striped">
                            <thead>
                              <tr>
                                <th width="10%">Sr. No.</th>
                                <th width="20%">Menu Type</th>
                                <th width="50%">Description</th>
                                <th width="25%">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            @if (!empty($allMenuTypes))
                              @foreach ($allMenuTypes as $menu_type)
                              <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $menu_type->menu_type_name }}</td>
                                <td>{!! $menu_type->menu_type_description !!}</td>
                                <td>
                                  <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modal-simple-{{ $menu_type->menu_type_id }}">
                                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                  </button>
                                  <div class="modal modal-blur fade" id="modal-simple-{{ $menu_type->menu_type_id }}" tabindex="-1" style="display: none;" aria-hidden="true"  role="document">
                                    <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title">Menu Type</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form id="form-edit-menu-type" method="post" action="{{route('admin.menutype.update')}}">
                                        @csrf
                                        <input type="hidden" name="menu_type_id" value="{{ $menu_type->menu_type_id}}" >
                                          <div class="modal-body">
                                            <h5 class="modal-title">Edit Menu Type</h5>
                                            <div class="col-12 mt-2 mb-2">
                                              <div>Menu Type Name </div> 
                                              <input type="text" name="menu_type_name" class="form-control" placeholder="Add new menu type" value="{{ $menu_type->menu_type_name }}">
                                            </div>
                                            <div class="col-12 mt-2 mb-2">
                                              <div>Description</div> 
                                              <textarea name="menu_type_description" id="menu_type_description" class="form-control" placeholder="Add menu type detail">{{ $menu_type->menu_type_description }}</textarea>
                                            </div>     
                                          </div>
                                          <div class="modal-footer">
                                            <button id="submit-menu-type1" type="submit" class="btn btn-primary ms-auto">
                                            <span id="loading-menu-type" style="display:none;"><i class="fa fa-spinner fa-spin"></i>&nbsp;</span> Update</button>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                  <form id="form-delete-menu_type" method="post" action="{{route('admin.menutype.delete')}}" value="{{$menu_type->menu_type_id}}">
                                    @csrf
                                    <input type="hidden" name="menu_type_id" value="{{ $menu_type->menu_type_id}}" >
                                  <button type="submit" class="btn">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                  </button>
                                  </form>
                                </td>
                              </tr>                              
                              @endforeach
                              @endif
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!--  //////////////////////////////////////////////////////////// -->
 
                  <div class="card-body box" id="slider_type_box" style="display:none;">
                    <h2 class="mb-4">Slider Types</h2>
                    <!-- <h3 class="card-title">Add Sliders</h3> -->
                    <form id="form-slider-type" method="post">
                    @csrf
                      <div class="col-12 mt-2 mb-2">
                        <div>Slider Name </div> 
                        <input type="text" name="slider_type_name" class="form-control" placeholder="Add new slider">
                      </div>
                      <div class="col-12 mt-2 mb-2">
                        <div>Description</div> 
                        <textarea name="slider_type_description" id="slider_type_description" class="form-control" placeholder="Add Slider Detail"></textarea>
                      </div>
                      <div class="col-12 mt-2 mb-5 text-center">
                        <button id="submit-slider-type" type="button" class="btn btn-primary ms-auto">
                        <span id="loading-slider-type" style="display:none;"><i class="fa fa-spinner fa-spin"></i>&nbsp;</span> Add</button>
                      </div>                      
                    </form>
                    <div class="col-12">
                      <div class="card">
                        <div class="table-responsive">
                          @if(session('sliderTypes_delete_success'))
                          <div class="alert alert-success">
                            <strong>! Success</strong>{{session('sliderTypes_delete_success')}}
                          </div>
                          @endif
                          @if(session('sliderType_delete_error'))
                          <div class="alert alert-error">
                            <strong>! Error</strong>{{session('sliderType_delete_error')}}
                          </div>
                          @endif

                          @if(session('sliderTypes_update_success'))
                          <div class="alert alert-success">
                            <strong>! Success</strong>{{session('sliderTypes_update_success')}}
                          </div>
                          @endif

                          @if(session('sliderType_update_error'))
                          <div class="alert alert-error">
                            <strong>! Error</strong>{{session('sliderType_update_error')}}
                          </div>
                          @endif



                          <table class="table table-vcenter card-table table-striped">
                            <thead>
                              <tr>
                                <th width="10%">Sr. No.</th>
                                <th width="20%">Slider Type</th>
                                <th width="50%">Description</th>
                                <th width="25%">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            @if (!empty($allSliderTypes))
                              @foreach ($allSliderTypes as $slider_type)
                              <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $slider_type->slider_type_name }}</td>
                                <td>{!! $slider_type->slider_type_description !!}</td>
                                <td>
                                  <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modal-simple-{{ $slider_type->slider_type_id }}">
                                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                  </button>
                                  <div class="modal modal-blur fade" id="modal-simple-{{ $slider_type->slider_type_id }}" tabindex="-1" style="display: none;" aria-hidden="true"  role="document">
                                    <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title">Slider Type</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form id="form-edit-slider-type" method="post" action="{{route('admin.slidertype.update')}}">
                                        @csrf
                                        <input type="hidden" name="slider_type_id" value={{$slider_type->slider_type_id}}>
                                          <div class="modal-body">
                                            <h5 class="modal-title">Edit Slider Type</h5>
                                            <div class="col-12 mt-2 mb-2">
                                              <div>Slider Type Name </div> 
                                              <input type="text" name="slider_type_name" class="form-control" placeholder="Add new slider type" value="{{ $slider_type->slider_type_name }}">
                                            </div>
                                            <div class="col-12 mt-2 mb-2">
                                              <div>Description</div> 
                                              <textarea name="slider_type_description" id="slider_type_description" class="form-control" placeholder="Add slider type detail">{{ $slider_type->slider_type_description }}</textarea>
                                            </div>     
                                          </div>
                                          <div class="modal-footer">
                                            <button id="submit-slider-type1" type="submit" class="btn btn-primary ms-auto">
                                            <span id="loading-slider-type" style="display:none;"><i class="fa fa-spinner fa-spin"></i>&nbsp;</span> Update</button>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                  <form id="form-delete-slider_type" method="post" action="{{route('admin.slidertype.delete')}}" value="{{$slider_type->slider_type_id}}">
                                    @csrf
                                    <input type="hidden" name="slider_type_id" value="{{ $slider_type->slider_type_id}}" >
                                  <button type="submit" class="btn">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                  </button>
                                  </form>
                                </td>
                              </tr>                              
                              @endforeach
                              @endif
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>                  


                  <!--  //////////////////////////////////////////////////////////// -->
 
                  <div class="card-body box" id="tour_type_box" style="display:none;">
                    <h2 class="mb-4">Tour Types</h2>
                    <!-- <h3 class="card-title">Add Tours</h3> -->
                    <form id="form-tour-type" method="post">
                    @csrf
                      <div class="col-12 mt-2 mb-2">
                        <div>Tour Name </div> 
                        <input type="text" name="tour_type_name" class="form-control" placeholder="Add new tour">
                      </div>
                      <div class="col-12 mt-2 mb-2">
                        <div>Description</div> 
                        <textarea name="tour_type_description" id="tour_type_description" class="form-control" placeholder="Add Tour Detail"></textarea>
                      </div>
                      <div class="col-12 mt-2 mb-5 text-center">
                        <button id="submit-tour-type" type="button" class="btn btn-primary ms-auto">
                        <span id="loading-tour-type" style="display:none;"><i class="fa fa-spinner fa-spin"></i>&nbsp;</span> Add</button>
                      </div>                      
                    </form>
                    <div class="col-12">
                      <div class="card">
                        <div class="table-responsive">

                          @if(session('tourTypes_delete_success'))
                          <div class="alert alert-success">
                            <strong>! Success</strong>{{session('tourTypes_delete_success')}}
                          </div>
                          @endif
                          @if(session('tourTypes_delete_error'))
                          <div class="alert alert-error">
                            <strong>! Error</strong>{{session('tourTypes_delete_error')}}
                          </div>
                          @endif

                          @if(session('tourType_update_success'))
                          <div class="alert alert-success">
                            <strong>! Success</strong>{{session('tourTypes_update_success')}}
                          </div>
                          @endif
                          @if(session('tourTypes_update_error'))
                          <div class="alert alert-error">
                            <strong>! Error</strong>{{session('tourTypes_update_error')}}
                          </div>
                          @endif

                          <table class="table table-vcenter card-table table-striped">
                            <thead>
                              <tr>
                                <th width="10%">Sr. No.</th>
                                <th width="20%">Tour Type</th>
                                <th width="50%">Description</th>
                                <th width="25%">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            @if(!empty($allTourTypes))
                              @foreach ($allTourTypes as $tour_type)
                              <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $tour_type->tour_type_name }}</td>
                                <td>{!! $tour_type->tour_type_description !!}</td>
                                <td>
                                  <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modal-simple-{{$tour_type->tour_type_id}}">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                  </button>
                                  <div class="modal modal-blur fade" id="modal-simple-{{$tour_type->tour_type_id}}" tabindex="-1" style="display: none;" aria-hidden="true"  role="document">
                                    <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title">Tour Type</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form id="form-edit-tour-type" method="post" action="{{route('admin.tourType.update')}}">
                                        @csrf
                                        <input type="hidden" name="tour_type_id" value="{{$tour_type->tour_type_id}}">
                                          <div class="modal-body">
                                            <h5 class="modal-title">Edit Tour Type</h5>
                                            <div class="col-12 mt-2 mb-2">
                                              <div>Tour Type Name </div> 
                                              <input type="text" name="tour_type_name" class="form-control" placeholder="Add new tour type" value="{{ $tour_type->tour_type_name }}">
                                            </div>
                                            <div class="col-12 mt-2 mb-2">
                                              <div>Description</div> 
                                              <textarea name="tour_type_description" id="tour_type_description" class="form-control" placeholder="Add tour type detail">{{ $tour_type->tour_type_description }}</textarea>
                                            </div>      
                                          </div>
                                          <div class="modal-footer">
                                            <button id="submit-tour-type1" type="submit" class="btn btn-primary ms-auto">
                                            <span id="loading-tour-type" style="display:none;"><i class="fa fa-spinner fa-spin"></i>&nbsp;</span> Update</button>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                  <form id="form-delete-tour_type" method="post" action="{{route('admin.tourtype.delete')}}" value="{{$tour_type->tour_type_id}}">
                                    @csrf
                                    <input type="hidden" name="tour_type_id" value="{{ $tour_type->tour_type_id}}" >
                                  <button type="submit" class="btn">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                  </button>
                                  </form>
                                </td>
                              </tr>                              
                              @endforeach
                              @endif
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>              
<!--  //////////////////////////////////////////////////////////// -->
 

                  <div class="card-body box" id="tags_box" style="display:none;">
                    <h2 class="mb-4">Tag</h2>
                    <!-- <h3 class="card-title">Add User Tag</h3> -->
                    <form id="form-tags" method="post">
                    @csrf
                      <div class="row align-items-center mt-2 mb-2">
                        <div class="col-auto">
                          Add new tag
                        </div> 
                        <div class="col-auto">
                          <input type="text" name="tag" class="form-control" placeholder="Add new tag">
                        </div> 
                        <div class="col-auto">
                          <button id="submit-tags" type="button" class="btn btn-primary ms-auto">
                          <span id="loading-tags" style="display:none;"><i class="fa fa-spinner fa-spin"></i>&nbsp;</span> Add
                          Add</button>
                        </div>                      
                      </div>
                    </form>
                    <div class="col-12">
                      <div class="card">
                        <div class="table-responsive">
                          @if(session('tags_delete_success'))
                          <div class="alert alert-success">
                            <strong>! Success</strong>{{session('tags_delete_success')}}
                          </div>
                          @endif
                          @if(session('tags_delete_error'))
                          <div class="alert alert-error">
                            <strong>! Error</strong>{{session('tags_delete_error')}}
                          </div>
                          @endif

                          @if(session('tags_update_success'))
                          <div class="alert alert-success">
                            <strong>! Success</strong>{{session('tags_update_success')}}
                          </div>
                          @endif
                          @if(session('tags_update_error'))
                          <div class="alert alert-error">
                            <strong>! Error</strong>{{session('tags_update_error')}}
                          </div>
                          @endif
                          
                          <table class="table table-vcenter card-table table-striped">
                            <thead>
                              <tr>
                                <th>Sr. No.</th>
                                <th>Tag</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            @if (!empty($allTags))
                              @foreach ($allTags as $tag)
                              <tr>
                                <td width="10%">{{ $loop->index + 1 }}</td>
                                <td width="70%">{{ $tag->tag_name }}</td>
                                <td width="20%">
                                  <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modal-simple-{{$tag->tag_id}}">
                                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                  </button>
                                  <div class="modal modal-blur fade" id="modal-simple-{{$tag->tag_id}}" tabindex="-1" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title">Edit Tag</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form id="form-logo" method="post" enctype="multipart/form-data" action="{{route('admin.tags.update')}}">
                                          @csrf
                                          <input type="hidden" name="tag_id" id="" value={{$tag->tag_id}}>
                                          <div class="modal-body">
                                            <h5 class="modal-title">Edit Tag</h5>
                                              <div class="col-auto">
                                                <input type="text" name="tag_name" value={{$tag->tag_name}} class="form-control" placeholder="Add new tag">
                                              </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Update</button>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                  <form id="form-delete-tag_type" method="post" action="{{route('admin.tags.delete')}}" value="{{$tag->tag_id}}">
                                    @csrf
                                    <input type="hidden" name="tag_id" value="{{ $tag->tag_id}}">
                                  <button type="submit" class="btn">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                  </button>
                                  </form>
                                </td>
                              </tr>
                              @endforeach
                              @endif
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card-body box" id="activity_box" style="display:none;">
                    <form id="" method="post" action="{{route('admin.activity.store')}}">
                      @csrf
                      <div class="row align-items-center mt-2 mb-2">
                        <div class="col-12 mt-2 mb-2">
                        <div>Activity Name</div> 
                        <input type="text" name="activity_name" id="activity_name" class="form-control" placeholder="Add new activity">
                      </div>
                      <div class="col-12 mt-2 mb-2">
                        <div>Activity Description</div> 
                        <textarea name="activity_description" id="activity_description" class="form-control" placeholder="Add activity description"></textarea>
                      </div>
                      <div class="col-12 mt-2 mb-2">
                        <button id="submit-activity" type="submit" class="btn btn-primary ms-auto">
                        <span id="loading-activity" style="display:none;"><i class="fa fa-spinner fa-spin"></i>&nbsp;</span> Add
                        Add</button>        
                      </div>
                    </form>
                    <div class="col-12">
                      <div class="card">
                        <div class="table-responsive">
                          @if(session('activity_add_success'))
                          <div class="alert alert-success">
                            <strong>! Success</strong>{{session('activity_add_success')}}
                          </div>
                          @endif

                          @if(session('activity_add_error'))
                          <div class="alert alert-error">
                            <strong>! Error </strong>{{session('activity_add_error')}}
                          </div>
                          @endif

                          @if(session('activity_delete_success'))
                          <div class="alert alert-success">
                            <strong>! Success</strong>{{session('activity_delete_success')}}
                          </div>
                          @endif

                          @if(session('activity_delete_error'))
                          <div class="alert alert-error">
                            <strong>! Error </strong>{{session('activity_delete_error')}}
                          </div>
                          @endif

                          <div class="table-responsive">
                            @if(session('activity_update_success'))
                            <div class="alert alert-success">
                              <strong>! Success</strong>{{session('activity_update_success')}}
                            </div>
                            @endif
  
                            @if(session('activity_update_error'))
                            <div class="alert alert-error">
                              <strong>! Error </strong>{{session('activity_update_error')}}
                            </div>
                            @endif
                          <table class="table table-vcenter card-table table-striped">
                            <thead>
                              <tr>
                                <th>Sr. No.</th>
                                <th>Activity</th>
                                <th>Description</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            @if (!empty($allActivity))
                              @foreach ($allActivity as $activity)
                              <tr>
                                <td width="10%">{{ $loop->index + 1 }}</td>
                                <td width="20%">{{ $activity->activity_name }}</td>
                                <td width="50%">{{ $activity->activity_description }}</td>
                                <td width="20%">
                                  <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modal-simple-{{$activity->activity_id}}">
                                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                  </button>
                                  <div class="modal modal-blur fade" id="modal-simple-{{$activity->activity_id}}" tabindex="-1" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" >
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title">activity</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form id="form-logo" method="post" enctype="multipart/form-data" action="{{route('admin.activity.update')}}">
                                          @csrf
                                          <input type="hidden" name="activity_id" id="" value={{$activity->activity_id}}>
                                          <div class="modal-body">
                                            <h5 class="modal-title">Add new activity</h5>
                                              <div class="col-auto">
                                                <input type="text" name="activity_name" value={{$activity->activity_name}}  class="form-control" placeholder="Add new activity">
                                              </div>
                                              <div class="col-auto">
                                                <div>Activity Description</div> 
                                                <textarea name="activity_description" id="activity_description" value={{$activity->activity_description}} class="form-control" placeholder="Add activity description"></textarea>
                                              </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                  <form id="form-delete-activity" method="post" action="{{route('admin.activity.delete')}}" value="{{$activity->activity_id}}">
                                    @csrf
                                    <input type="hidden" name="activity_id" value="{{ $activity->activity_id}}">
                                  <button type="submit" class="btn">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                  </button>
                                  </form>
                                </td>
                              </tr>
                              @endforeach
                              @endif
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card-body box" id="offers_box" style="display:none;">
                    <h2 class="mb-4">Offers</h2>
                    <!-- <h3 class="card-title">Add Offers</h3> -->

                    <form id="form-offer" method="post">
                    @csrf
                      <div class="row align-items-center mt-2 mb-2">
                        <div class="col-12 mt-2 mb-2">
                        <div>Offer Name</div> 
                        <input type="text" name="offer_name" id="offer_name" class="form-control" placeholder="Add new meal">
                      </div>
                      <div class="col-12 mt-2 mb-2">
                        <div>Description</div> 
                        <textarea name="offer_description" id="offer_description" class="form-control" placeholder="Add offer description"></textarea>
                      </div>
                      <div class="col-12 mt-2 mb-2">
                        <button id="submit-offer" type="button" class="btn btn-primary ms-auto">
                        <span id="loading-offer" style="display:none;"><i class="fa fa-spinner fa-spin"></i>&nbsp;</span> Add
                        Add</button>        
                      </div>
                    </form>
                    <div class="col-12">
                      <div class="card">
                        <div class="table-responsive">
                          <table class="table table-vcenter card-table table-striped">
                            <thead>
                              <tr>
                                <th width="10%">Sr. No.</th>
                                <th width="20%">Offer Name</th>
                                <th width="50%">Offer Description</th>
                                <th width="20%">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            @if (!empty($allOffers))
                              @foreach ($allOffers as $offers)
                              <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $offers->offer_name }}</td>
                                <td>{{ $offers->offer_description }}</td>
                                <td>
                                  <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modal-simple">
                                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                  </button>
                                  <div class="modal modal-blur fade" id="modal-simple" tabindex="-1" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" >
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title">offers</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form id="form-logo" method="post">
                                        @csrf
                                          <div class="modal-body">
                                            <h5 class="modal-title">Add new offer</h5>
                                              <div class="col-auto">
                                                <input type="text" name="offer" class="form-control" placeholder="Add new offer">
                                              </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                              <span id="loading-logo" style="display:none;"><i class="fa fa-spinner fa-spin"></i>&nbsp;</span> Add
                                            </button>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                  <button type="button" class="btn">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
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
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection
@section('page_script')
  <script>
    function show_hide_box(box_id) {
      $(".box").hide();
      $(".list-group-item").removeClass("active");
      $("#"+box_id).addClass("active");
      $("#"+box_id + "_box").show();
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
  <script>
    $("#submit-meals").click(function(){ 
      //$("#submit-meals").prop('disabled', true);
      var formData=new FormData($('#form-meals')[0]);
      var is_form_valid=validation_meals();

      if(is_form_valid){
        //$("#submit-meals").prop('disabled', false);
        $("#loading-meals").show();
        $.ajax({
          url: "{{route('admin.meals.store')}}",
          type: 'POST',
          dataType: 'json',
          data: formData,
          cache : false,
          processData: false,
          contentType: false,
          success: function(response)
          {
            $("#loading-meals").hide();
            //response=JSON.parse(response);
            console.log(response);
            if(response.status == 1){
              //alert(response.msg);
              //$("#submit-meals").prop('disabled', false);
              Swal.fire({icon: "success", title: 'Success', text: response.msg, showCancelButton: false
              }).then((confirmed) => {
                window.location.reload();
              });
            } else {
              //$("#submit-meals").prop('disabled', false);
              Swal.fire({icon: "error", title: 'Erorr', text: response.msg, showCancelButton: false
              }).then((confirmed) => {
                return false;
              });
            }
          }
        });
      } else {
        $("#loading-meals").hide();
        //$("#submit-meals").prop('disabled', false);
      }
    });

    function validation_meals(){
      is_form_valid = true;
      // var Meals = $('#Meals').val();
      // if(Meals==''){
      //   $('#Meals').focus();
      //   $('#error_Meals').html('Please enter Meals');
      //   $('html,body').animate({scrollTop: $("#Meals").offset().top - 190},'slow');
      //   is_form_valid=false;
      //   return false;
      // } else {
      //   $('#error_Meals').html('');
      // }
      if(!is_form_valid){return false;}
      else{return true;}
    }
</script>
  <script>
    $("#submit-menu-type").click(function(){ 
      //$("#submit-menu-type").prop('disabled', true);
      var formData=new FormData($('#form-menu-type')[0]);
      var is_form_valid=validation_menutype();

      if(is_form_valid){
        //$("#submit-menu-type").prop('disabled', false);
        $("#loading-menu-type").show();
        $.ajax({
          url: "{{route('admin.menutype.store')}}",
          type: 'POST',
          dataType: 'json',
          data: formData,
          cache : false,
          processData: false,
          contentType: false,
          success: function(response)
          {
            $("#loading-menu-type").hide();
            //response=JSON.parse(response);
            console.log(response);
            if(response.status == 1){
              //alert(response.msg);
              //$("#submit-menu-type").prop('disabled', false);
              Swal.fire({icon: "success", title: 'Success', text: response.msg, showCancelButton: false
              }).then((confirmed) => {
                window.location.reload();
              });
            } else {
              //$("#submit-menu-type").prop('disabled', false);
              Swal.fire({icon: "error", title: 'Erorr', text: response.msg, showCancelButton: false
              }).then((confirmed) => {
                return false;
              });
            }
          }
        });
      } else {
        $("#loading-menu-type").hide();
        //$("#submit-menu-type").prop('disabled', false);
      }
    });

    function validation_menutype(){
      is_form_valid = true;
      // var menu-type = $('#menu-type').val();
      // if(menu-type==''){
      //   $('#menu-type').focus();
      //   $('#error_menu-type').html('Please enter menu-type');
      //   $('html,body').animate({scrollTop: $("#menu-type").offset().top - 190},'slow');
      //   is_form_valid=false;
      //   return false;
      // } else {
      //   $('#error_menu-type').html('');
      // }
      if(!is_form_valid){return false;}
      else{return true;}
    }
</script>


  <script>
    $("#submit-slider-type").click(function(){ 
      //$("#submit-slider-type").prop('disabled', true);
      var formData=new FormData($('#form-slider-type')[0]);
      var is_form_valid=validation_slidertype();

      if(is_form_valid){
        //$("#submit-slider-type").prop('disabled', false);
        $("#loading-slider-type").show();
        $.ajax({
          url: "{{route('admin.slidertype.store')}}",
          type: 'POST',
          dataType: 'json',
          data: formData,
          cache : false,
          processData: false,
          contentType: false,
          success: function(response)
          {
            $("#loading-slider-type").hide();
            //response=JSON.parse(response);
            console.log(response);
            if(response.status == 1){
              //alert(response.msg);
              //$("#submit-slider-type").prop('disabled', false);
              Swal.fire({icon: "success", title: 'Success', text: response.msg, showCancelButton: false
              }).then((confirmed) => {
                window.location.reload();
              });
            } else {
              //$("#submit-slider-type").prop('disabled', false);
              Swal.fire({icon: "error", title: 'Erorr', text: response.msg, showCancelButton: false
              }).then((confirmed) => {
                return false;
              });
            }
          }
        });
      } else {
        $("#loading-slider-type").hide();
        //$("#submit-slider-type").prop('disabled', false);
      }
    });

    function validation_slidertype(){
      is_form_valid = true;
      // var slider-type = $('#slider-type').val();
      // if(slider-type==''){
      //   $('#slider-type').focus();
      //   $('#error_slider-type').html('Please enter slider-type');
      //   $('html,body').animate({scrollTop: $("#slider-type").offset().top - 190},'slow');
      //   is_form_valid=false;
      //   return false;
      // } else {
      //   $('#error_slider-type').html('');
      // }
      if(!is_form_valid){return false;}
      else{return true;}
    }
</script>



  <script>
    $("#submit-tour-type").click(function(){ 
      //$("#submit-tour-type").prop('disabled', true);
      var formData=new FormData($('#form-tour-type')[0]);
      var is_form_valid=validation_tourtype();

      if(is_form_valid){
        //$("#submit-tour-type").prop('disabled', false);
        $("#loading-tour-type").show();
        $.ajax({
          url: "{{route('admin.tourtype.store')}}",
          type: 'POST',
          dataType: 'json',
          data: formData,
          cache : false,
          processData: false,
          contentType: false,
          success: function(response)
          {
            $("#loading-tour-type").hide();
            //response=JSON.parse(response);
            console.log(response);
            if(response.status == 1){
              //alert(response.msg);
              //$("#submit-tour-type").prop('disabled', false);
              Swal.fire({icon: "success", title: 'Success', text: response.msg, showCancelButton: false
              }).then((confirmed) => {
                window.location.reload();
              });
            } else {
              //$("#submit-tour-type").prop('disabled', false);
              Swal.fire({icon: "error", title: 'Erorr', text: response.msg, showCancelButton: false
              }).then((confirmed) => {
                return false;
              });
            }
          }
        });
      } else {
        $("#loading-tour-type").hide();
        //$("#submit-tour-type").prop('disabled', false);
      }
    });

    function validation_tourtype(){
      is_form_valid = true;
      // var tour-type = $('#tour-type').val();
      // if(tour-type==''){
      //   $('#tour-type').focus();
      //   $('#error_tour-type').html('Please enter tour-type');
      //   $('html,body').animate({scrollTop: $("#tour-type").offset().top - 190},'slow');
      //   is_form_valid=false;
      //   return false;
      // } else {
      //   $('#error_tour-type').html('');
      // }
      if(!is_form_valid){return false;}
      else{return true;}
    }
</script>



  <script>
    $("#submit-tags").click(function(){ 
      //$("#submit-tags").prop('disabled', true);
      var formData=new FormData($('#form-tags')[0]);
      var is_form_valid=validation_tags();

      if(is_form_valid){
        //$("#submit-tags").prop('disabled', false);
        $("#loading-tags").show();
        $.ajax({
          url: "{{route('admin.tags.store')}}",
          type: 'POST',
          dataType: 'json',
          data: formData,
          cache : false,
          processData: false,
          contentType: false,
          success: function(response)
          {
            $("#loading-tags").hide();
            //response=JSON.parse(response);
            console.log(response);
            if(response.status == 1){
              //alert(response.msg);
             // $("#submit-tags").prop('disabled', false);
              Swal.fire({icon: "success", title: 'Success', text: response.msg, showCancelButton: false
              }).then((confirmed) => {
                window.location.reload();
              });
            } else {
              //$("#submit-tags").prop('disabled', false);
              Swal.fire({icon: "error", title: 'Erorr', text: response.msg, showCancelButton: false
              }).then((confirmed) => {
                return false;
              });
            }
          }
        });
      } else {
        $("#loading-tags").hide();
        //$("#submit-tags").prop('disabled', false);
      }
    });

    function validation_tags(){
      is_form_valid = true;
      // var tag = $('#tag').val();
      // if(tag==''){
      //   $('#tag').focus();
      //   $('#error_tag').html('Please enter tag');
      //   $('html,body').animate({scrollTop: $("#tag").offset().top - 190},'slow');
      //   is_form_valid=false;
      //   return false;
      // } else {
      //   $('#error_tag').html('');
      // }
      if(!is_form_valid){return false;}
      else{return true;}
    }
</script>
  <script>
    $("#submit-activity").click(function(){ 
      //$("#submit-activity").prop('disabled', true);
      var formData=new FormData($('#form-activity')[0]);
      var is_form_valid=validation_activity();

      if(is_form_valid){
        //$("#submit-activity").prop('disabled', false);
        $("#loading-activity").show();
        $.ajax({
          url: "{{route('admin.activity.store')}}",
          type: 'POST',
          dataType: 'json',
          data: formData,
          cache : false,
          processData: false,
          contentType: false,
          success: function(response)
          {
            $("#loading-activity").hide();
            //response=JSON.parse(response);
            console.log(response);
            if(response.status == 1){
              //alert(response.msg);
             // $("#submit-activity").prop('disabled', false);
              Swal.fire({icon: "success", title: 'Success', text: response.msg, showCancelButton: false
              }).then((confirmed) => {
                window.location.reload();
              });
            } else {
              //$("#submit-activity").prop('disabled', false);
              Swal.fire({icon: "error", title: 'Erorr', text: response.msg, showCancelButton: false
              }).then((confirmed) => {
                return false;
              });
            }
          }
        });
      } else {
        $("#loading-activity").hide();
        //$("#submit-activity").prop('disabled', false);
      }
    });

    function validation_activity(){
      is_form_valid = true;
      // var activity = $('#activity').val();
      // if(activity==''){
      //   $('#activity').focus();
      //   $('#error_activity').html('Please enter activity');
      //   $('html,body').animate({scrollTop: $("#activity").offset().top - 190},'slow');
      //   is_form_valid=false;
      //   return false;
      // } else {
      //   $('#error_activity').html('');
      // }
      if(!is_form_valid){return false;}
      else{return true;}
    }
</script>
  <script>
    $("#submit-offer").click(function(){ 
      //$("#submit-offer").prop('disabled', true);
      var formData=new FormData($('#form-offer')[0]);
      var is_form_valid=validation_offer();

      if(is_form_valid){
        //$("#submit-offer").prop('disabled', false);
        $("#loading-offer").show();
        $.ajax({
          url: "{{route('admin.offer.store')}}",
          type: 'POST',
          dataType: 'json',
          data: formData,
          cache : false,
          processData: false,
          contentType: false,
          success: function(response)
          {
            $("#loading-offer").hide();
            //response=JSON.parse(response);
            console.log(response);
            if(response.status == 1){
              //alert(response.msg);
             // $("#submit-offer").prop('disabled', false);
              Swal.fire({icon: "success", title: 'Success', text: response.msg, showCancelButton: false
              }).then((confirmed) => {
                window.location.reload();
              });
            } else {
              //$("#submit-offer").prop('disabled', false);
              Swal.fire({icon: "error", title: 'Erorr', text: response.msg, showCancelButton: false
              }).then((confirmed) => {
                return false;
              });
            }
          }
        });
      } else {
        $("#loading-offer").hide();
        //$("#submit-offer").prop('disabled', false);
      }
    });

    function validation_offer(){
      is_form_valid = true;
      // var offer = $('#offer').val();
      // if(offer==''){
      //   $('#offer').focus();
      //   $('#error_offer').html('Please enter offer');
      //   $('html,body').animate({scrollTop: $("#offer").offset().top - 190},'slow');
      //   is_form_valid=false;
      //   return false;
      // } else {
      //   $('#error_offer').html('');
      // }
      if(!is_form_valid){return false;}
      else{return true;}
    }
</script>

<script>
    $("#update-logo").click(function(){ 
      //$("#update-logo").prop('disabled', true);
      var formData=new FormData($('#form-logo')[0]);
      var is_form_valid=validation_logo();

      if(is_form_valid){
        //$("#update-logo").prop('disabled', false);
        $("#loading-logo").show();
        $.ajax({
          url: "{{route('admin.logo.update')}}",
          mimeType: "multipart/form-data",
          type: 'POST',
          data: formData,
          dataType: 'json',
          cache : false,
          processData: false,
          contentType: false,
          success: function(response)
          {
            $("#loading-logo").hide();
            //response=JSON.parse(response);
            console.log(response);
            if(response.status == 1){
              //alert(response.msg);
             // $("#update-logo").prop('disabled', false);
              Swal.fire({icon: "success", title: 'Success', text: response.msg, showCancelButton: false
              }).then((confirmed) => {
                window.location.reload();
              });
            } else {
              //$("#update-logo").prop('disabled', false);
              Swal.fire({icon: "error", title: 'Erorr', text: response.msg, showCancelButton: false
              }).then((confirmed) => {
                return false;
              });
            }
          }
        });
      } else {
        $("#loading-logo").hide();
        //$("#update-logo").prop('disabled', false);
      }
    });

    function validation_logo(){
      is_form_valid = true;
      // var offer = $('#logo').val();
      // if(logo==''){
      //   $('#logo').focus();
      //   $('#error_logo').html('Please enter logo');
      //   $('html,body').animate({scrollTop: $("#logo").offset().top - 190},'slow');
      //   is_form_valid=false;
      //   return false;
      // } else {
      //   $('#error_logo').html('');
      // }
      if(!is_form_valid){return false;}
      else{return true;}
    }
</script>

<script>
    $("#submit-general-setting").click(function(){
      //$("#submit-general-setting").prop('disabled', true);
      var formData=new FormData($('#form-general-setting')[0]);
      var is_form_valid=validation_general_setting();

      if(is_form_valid){
        //$("#submit-general-setting").prop('disabled', false);
        $("#loading-general-setting").show();
        $.ajax({
          url: "{{route('admin.generalsetting.update')}}",
          type: 'POST',
          dataType: 'json',
          data: formData,
          cache : false,
          processData: false,
          contentType: false,
          success: function(response)
          {
            $("#loading-general-setting").hide();
            //response=JSON.parse(response);
            console.log(response);
            if(response.status == 1){
              //alert(response.msg);
              // $("#submit-general-setting").prop('disabled', false);
              Swal.fire({icon: "success", title: 'Success', html: response.msg, showCancelButton: false
              }).then((confirmed) => {
                window.location.reload();
              });
            } else {
              //$("#submit-general-setting").prop('disabled', false);
              Swal.fire({icon: "error", title: 'Erorr', text: response.msg, showCancelButton: false
              }).then((confirmed) => {
                return false;
              });
            }
          }
        });
      } else {
        $("#loading-general-setting").hide();
        //$("#submit-general-setting").prop('disabled', false);
      }
    });

    function validation_general_setting(){
      is_form_valid = true;
      // var general_setting = $('#general_setting').val();
      // if(general_setting==''){
      //   $('#general_setting').focus();
      //   $('#error_general_setting').html('Please enter general_setting');
      //   $('html,body').animate({scrollTop: $("#general_setting").offset().top - 190},'slow');
      //   is_form_valid=false;
      //   return false;
      // } else {
      //   $('#error_general_setting').html('');
      // }
      if(!is_form_valid){return false;}
      else{return true;}
    }
</script>
@endsection