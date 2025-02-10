@extends('admin.app')
@section('title', $page_title)

@section('page_css')

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

        @if(session('tour_requiredfields_error'))
          <div class="alert alert-danger">{{ session('tour_requiredfields_error') }}</div>
        @endif
        
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
          <div class="card-body p-4">
            <div class="card">
              <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a href="#tab1" class="nav-link active" data-bs-toggle="tab" aria-selected="true" role="tab">Required Fields</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a href="#tab2" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="2">Optional Fields</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a href="#tab3" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="3">Meta Fields</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a href="#tab4" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="4">Itinerary Details</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a href="#tab5" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="5">Hotels to Stay</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a href="#tab6" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="6">Image Gallery</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a href="#tab7" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="7">Tour Categories</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane fade active show" id="tab1" role="tabpanel">
                    <h4>Required Fields</h4>
                    <div>
                      <form id="form_tour_add_tab_1" name="form_tour_add_tab_1" method="POST" enctype="multipart/form-data" action="{{route('requiredfields.store')}}">
                        @csrf
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label for="tour_title" class="form-label">Title <span class="required">*</span></label>
                              <input class="form-control" id="tour_title" name="tour_title" type="text" placeholder="Enter Title" value="{{ old('tour_title') }}"/>
                            </div>                                           
                          </div>
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label for="tour_slug" class="form-label">Slug <span class="required">*</span></label>
                              <input class="form-control" id="tour_slug" name="tour_slug" type="text" placeholder="Enter Slug" value="{{ old('tour_slug') }}"/>
                            </div>                                           
                          </div>
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label for="tour_code" class="form-label">Tour Code (or Tour ID)  (or Package ID)  <span class="required">*</span></label>
                              <input class="form-control" id="tour_code" name="tour_code" type="text" placeholder="Enter Title" value="{{ old('tour_code') }}"/>
                              <small>With is you can track all activity about a tour.</small>
                            </div>                                           
                          </div>
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label class="form-label"> Price Per Person <span class="required">*</span></label>
                              <table style="width:100%">
                                <tr>
                                  <td width="25%">
                                    <input class="form-control" id="tour_price_per_adult" name="tour_price_per_adult" type="number" min="0" step="0.1" value="{{ old('tour_price_per_adult') }}" />
                                  </td>
                                  <td width="25%">Adult(s)</td>
                                  <td width="25%">
                                    <input class="form-control" id="tour_price_per_child" name="tour_price_per_child" type="number" min="0" step="0.1" value="{{ old('tour_price_per_child') }}" />
                                  </td>
                                  <td width="25%">Child(s)</td>
                                </tr>
                                <tr>
                                  <td width="50%" colspan="2"><small>Min. value is Rs. 1</small></td>
                                  <td width="50%" colspan="2"><small>Min. value is Rs. 0</small></td>
                                </tr>
                              </table>
                            </div>                                           
                          </div>
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label for="tour_category_title" class="form-label">Duration <span class="required">*</span></label>
                              <table style="width:100%">
                                <tr>
                                  <td width="25%">
                                    <input class="form-control" id="tour_duration_days" name="tour_duration_days" type="number" value="{{ old('tour_duration_days') }}" min="1" max="100" step="1"/>
                                  </td>
                                  <td width="25%">Day(s)</td>
                                  <td width="25%">
                                    <input class="form-control" id="tour_duration_night" name="tour_duration_night" type="number" value="{{ old('tour_duration_night') }}" min="1" max="100" step="1"/>
                                  </td>
                                  <td width="25%">Night(s)</td>
                                </tr>
                              </table>
                              <small>Min. value is 1 and max. value is 100</small>
                            </div>                                           
                          </div>
                          <div class="col-lg-6">
                            <div class="mb-3"> 
                              <label for="tour_type" class="form-label">Tour Type <span class="required">*</span></label>
                              <select class="form-select" id="tour_type" name="tour_type[]" multiple placeholder="Select..." autocomplete="off">      
                                @if(!empty($tour_types))
                                  @foreach ($tour_types as $tour_type) 
                                    <option value='{{ $tour_type->tour_type_id }}'>{{$tour_type->tour_type_name}}</option>
                                  @endforeach
                                @endif            
                                <option value="-1">Uncategorized</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label for="tour_start" class="form-label">Start Location <span class="required">*</span></label>
                              <input class="form-control" id="tour_start" name="tour_start" type="text" placeholder="Enter start location"  value="{{$tour_type->tour_start_location }}"/>
                            </div>                                           
                          </div>
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label class="form-label"> Group Size <span class="required">*</span></label>
                              <table style="width:100%">
                                <tr>
                                  <td width="25%">
                                    <input class="form-control" id="tour_group_size_adult" name="tour_group_size_adult" value="{{ old('tour_group_size_adult') }}" type="number" min="1" max="100" step="1"/>
                                  </td>
                                  <td width="25%">Adult(s)</td>
                                  <td width="25%">
                                    <input class="form-control" id="tour_group_size_child" name="tour_group_size_child" value="{{ old('tour_group_size_child') }}" type="number" min="0" max="100" step="1"/>
                                  </td>
                                  <td width="25%">Child(s)</td>
                                </tr>
                                <tr>
                                  <td width="50%" colspan="2"><small>Min. value is 1 and max. value is 100</small></td>
                                  <td width="50%" colspan="2"><small>Min. value is 0 and max. value is 100</small></td>
                                </tr>
                              </table>
                            </div>                                           
                          </div>
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label for="tour_banner" class="form-label">Banner  <span class="required">*</span></label>
                              <input class="form-control" id="tour_banner" name="tour_banner" type="file"/>
                              <span class="error_msg" id="error_tour_banner"></span>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="mb-3"> 
                              <label for="status" class="form-label">Status <span class="required">*</span></label>
                              <select class="form-select" name="status" id="status">
                                <option value='1' @if(old('status') == 1) 'selected="selected"' @endif>Active</option>
                                <option value='0' @if(old('status') == 1) 'selected="selected"' @endif>Inactive</option>
                              </select>
                            </div>
                          </div>
                        </div> 
                        <input type="submit" class="btn btn-primary" value="Save as Draft"/>
                      </form>                      
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tab2" role="tabpanel">
                    <h4>Optional Fields</h4>
                    <div>
                      Please fill Required Fields first   
                    </div>
                  </div>                  
                  <div class="tab-pane fade" id="tab3" role="tabpanel">
                    <h4>Meta Fields</h4>
                    <div>  
                      Please fill Required Fields first   
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tab4" role="tabpanel">
                    <h4>Itinerary</h4>
                    <div>
                      Please fill Required Fields first   
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tab5" role="tabpanel">
                    <h4>Hotels</h4>
                    <div>
                      Please fill Required Fields first   
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tab6" role="tabpanel">
                    <h4>Image Gallery</h4>
                    <div>
                      Please fill Required Fields first
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tab7" role="tabpanel">
                    <h4>Tour Categories</h4>
                    <div>
                      Please fill Required Fields first
                    </div>
                  </div>
                </div>
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
$('#content').summernote({placeholder: '', tabsize: 1, height: 200});
$('#tour_excerpt').summernote({placeholder: '', tabsize: 1, height: 200});
$('#tour_description').summernote({placeholder: '', tabsize: 1, height: 200});
$('#tour_inclusion').summernote({placeholder: '', tabsize: 1, height: 200});
$('#tour_exclusion').summernote({placeholder: '', tabsize: 1, height: 200});
$('#tour_available_offer').summernote({placeholder: '', tabsize: 1, height: 200});
$('#tour_meals').summernote({placeholder: '', tabsize: 1, height: 200});
$('#tour_transfer').summernote({placeholder: '', tabsize: 1, height: 200});
$('#tour_tax').summernote({placeholder: '', tabsize: 1, height: 200});
$('.itinerary_description').summernote({placeholder: '', tabsize: 1, height: 50});
$('.hotel_desc').summernote({placeholder: '', tabsize: 1, height: 100});

</script>
<script>
$(document).ready(function(){
    $("#tour_title").keyup(function(e){
       e.preventDefault();
       var title = $("#tour_title").val();
       var str = title.replace(/\W+(?!$)/g, '-').toLowerCase();
       str = str.replace(/\W$/, '').toLowerCase();
       $('#tour_slug').val(str);
    });

    $("#tour_slug").keyup(function(e){
       e.preventDefault();
       var title = $("#tour_slug").val();
       var str = title.replace(/\W+(?!$)/g, '-').toLowerCase();
       str = str.replace(/\W$/, '').toLowerCase();
       $('#tour_slug').val(str);
    });



  new TomSelect("#tour_type",{
    maxItems: 100,
    placeholder: "Select tour types",
    allowEmptyOption: true,
    create: true
  });
  




  @if(!empty($tour_id))
  new TomSelect("#tags",{ maxItems: 100 });
  new TomSelect("#hotel_id", {allowEmptyOption: true, create: true});
  @endif
});
</script>

@endsection

