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
          @csrf
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
                      <form id="form_tour_add_tab_1" name="form_tour_add_tab_1" class="outer-repeater float-none" method="POST" enctype="multipart/form-data" action="{{route('requiredfields.store')}}">
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
                              <label for="tour_type" class="form-label"> Price Per Person <span class="required">*</span></label>
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
                              <label for="tour_category_template" class="form-label">Tour Type <span class="required">*</span></label>
                              <select class="form-select" name="tour_type" id="tour_type" name="tour_type[]" multiple placeholder="Select..." autocomplete="off">   
                                @if(!empty($tour_types))
                                  @foreach ($tour_types as $tour_type) 
                                    <option value='{{ $tour_type->tour_type_id }}' @if(old('tour_type_name') == $tour_type->tour_type_name) selected="selected" @endif >{{$tour_type->tour_type_name}}</option>
                                  @endforeach
                                @endif            
                                <option value="-1">Uncategorized</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label for="tour_start" class="form-label">Start Location <span class="required">*</span></label>
                              <input class="form-control" id="tour_start" name="tour_start" type="text" placeholder="Enter start location"  value="{{ old('tour_start') }}"/>
                            </div>                                           
                          </div>
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label for="tour_type" class="form-label"> Group Size <span class="required">*</span></label>
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
                      @if(!empty($tour_id))
                      <form id="form_tour_add_tab_2" name="form_tour_add_tab_2" class="outer-repeater float-none" method="POST" enctype="multipart/form-data" action="">
                        @csrf
                        <div class="row">  
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label for="tour_subtitle" class="form-label">Subtitle (Optional)</label>
                              <input class="form-control" id="tour_subtitle" name="tour_subtitle" type="text" placeholder="Enter Subtitle" value=""/>
                              <span class="error_tour_category_subtitle" id="error_tour_subtitle"></span>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="mb-3"> 
                              <label for="tags" class="form-label">Tags (Optional)</label>
                              <select class="form-select" name="tags" id="tags" name="tags[]" multiple placeholder="Select..." autocomplete="off">
                                @if(!empty($tags))
                                  @foreach ($tags as $tag) 
                                    <option value='{{ $tag->tag_id }}' @if(old('tag_name') == $tag->tag_name) selected="selected" @endif >{{$tag->tag_name}}</option>
                                  @endforeach
                                @endif
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="mb-2">
                              <label for="tour_excerpt" class="form-label">Excerpt/Summary (Optional)</label>
                              <small>This text will display in Tour listing</small>
                              <textarea rows="3" class="form-control" id="tour_excerpt" name="tour_excerpt"></textarea>
                              <span class="error_msg" id="error_tour_excerpt"></span>
                            </div>
                          </div>        
                          <div class="col-lg-6">
                            <div class="mb-2">
                              <label for="tour_description" class="form-label">Detailed Description (Optional)</label>
                              <small>This text will display in Tour detail page.</small>
                              <textarea rows="3" class="form-control" id="tour_description" name="tour_description"></textarea>
                              <span class="error_msg" id="error_tour_description"></span>
                            </div>
                          </div>        
                          <div class="col-lg-6">
                            <div class="mb-2">
                              <label for="tour_inclusion" class="form-label">Inclusion (Optional)</label>
                              <textarea rows="3" class="form-control" id="tour_inclusion" name="tour_inclusion"></textarea>
                              <span class="error_msg" id="error_tour_inclusion"></span>
                            </div>
                          </div>        
                          <div class="col-lg-6">
                            <div class="mb-2">
                              <label for="tour_exclusion" class="form-label">Exclusion (Optional)</label>
                              <textarea rows="3" class="form-control" id="tour_exclusion" name="tour_exclusion"></textarea>
                              <span class="error_msg" id="error_tour_exclusion"></span>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="mb-2">
                              <label for="tour_available_offer" class="form-label">Available Offer (Optional)</label>
                              <textarea rows="3" class="form-control" id="tour_available_offer" name="tour_available_offer" placeholder="Excerpt"></textarea>
                              <span class="error_msg" id="error_tour_available_offer"></span>
                            </div>
                          </div>        
                          <div class="col-lg-6">
                            <div class="mb-2">
                              <label for="tour_meals" class="form-label">Meals (Optional)</label>
                              <textarea rows="3" class="form-control" id="tour_meals" name="tour_meals"></textarea>
                              <span class="error_msg" id="error_tour_meals"></span>
                            </div>
                          </div>    
                          <div class="col-lg-6">
                            <div class="mb-2">
                              <label for="tour_transfer" class="form-label">Transfer (Optional)</label>
                              <textarea rows="3" class="form-control" id="tour_transfer" name="tour_transfer"></textarea>
                              <span class="error_msg" id="error_tour_transfer"></span>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="mb-2">
                              <label for="tour_tax" class="form-label">Tax (Optional)</label>
                              <textarea rows="3" class="form-control" id="tour_tax" name="tour_tax"></textarea>
                              <span class="error_msg" id="error_tour_tax"></span>
                            </div>
                          </div>
                          <div class="col-lg-3">
                            <div class="mb-3"> 
                              <label for="tour_add_to_hot_deals" class="form-label">Add to hot deals <span class="required">*</span></label>
                              <select class="form-select" name="tour_add_to_hot_deals" id="tour_add_to_hot_deals">
                                <option value='0' selected="selected">No</option>
                                <option value='1'>Yes</option>
                              </select>
                              @error('status')
                                <span class="error_msg">{{ $message }}</span>
                              @enderror
                            </div>
                          </div>
                        </div> 
                        <input type="hidden" name="tour_id" value="{{@$tour_id}}">
                        <input type="submit" class="btn btn-primary" value="Save as Draft"/>
                      </form>
                      @else
                      Please fill Required Fields first   
                      @endif
                    </div>
                  </div>                  
                  <div class="tab-pane fade" id="tab3" role="tabpanel">
                    <h4>Meta Fields</h4>
                    <div>  
                      @if(!empty($tour_id))                   
                      <form id="form_tour_add_tab_3" name="form_tour_add_tab_3" class="outer-repeater float-none" method="POST" enctype="multipart/form-data" action="">
                        @csrf
                        <div class="row" style="background-color:#eee;padding:10px;margin:0px;margin-bottom:10px;">
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label for="meta_title" class="form-label">Meta Title (Optional)</label>
                              <textarea class="form-control" name="meta_title" id="meta_title" rows="2"></textarea>
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
                        <input type="hidden" name="tour_id" value="{{@$tour_id}}"> 
                        <input type="submit" class="btn btn-primary" value="Save as Draft"/>
                      </form> 
                      @else
                      Please fill Required Fields first   
                      @endif 
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tab4" role="tabpanel">
                    <div>
                      @if(!empty($tour_id))
                      <form id="form_tour_add_tab_4" name="form_tour_add_tab_4" class="outer-repeater float-none" method="POST" enctype="multipart/form-data" action="">
                        @csrf
                        <div class="col-lg-12">
                          <table style="width:100%; margin-bottom: 10px;">
                            <tr>
                              <td style="width:50%;text-align: left;">
                                <h4>Itinerary</h4>
                              </td>
                              <td style="width:50%;text-align: right;">
                                <button class="btn btn-primary">+ Add More</button>
                                <button class="btn btn-danger">- Remove Last</button>
                              </td>
                            </tr>
                          </table>
                          <fieldset class="form-fieldset" id="itinerary_box">
                            <table style="width:100%">
                              <tr>
                                <td width="100%">
                                  <div class="mb-3">
                                    <input type="text" class="form-control itinerary_title" id="itinerary_title" id="itinerary_title[]" placeholder="Title" autocomplete="off">
                                  </div>
                                  <div class="mb-3">
                                    <textarea type="text" class="form-control itinerary_description" id="itinerary_description" name="itinerary_description[]" placeholder="Description"></textarea>
                                  </div>                        
                                </td>
                              </tr>
                            </table>
                          </fieldset>
                        </div>
                        <input type="hidden" name="tour_id" value="{{@$tour_id}}">
                        <input type="submit" class="btn btn-primary" value="Save as Draft"/>
                      </form>
                      @else
                      Please fill Required Fields first   
                      @endif
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tab5" role="tabpanel">
                    <div>
                      @if(!empty($tour_id))
                      <form id="form_tour_add_tab_5" name="form_tour_add_tab_5" class="outer-repeater float-none" method="POST" enctype="multipart/form-data" action="">
                        @csrf
                        <div class="col-lg-12">
                          <table style="width:100%; margin-bottom: 10px;">
                            <tr>
                              <td style="width:50%;text-align: left;">
                                <h4>Hotels to Stay</h4>
                              </td>
                              <td style="width:50%;text-align: right;">
                                <button class="btn btn-primary">+ Add More</button>
                                <button class="btn btn-danger">- Remove Last</button>
                              </td>
                            </tr>
                          </table>
                          <fieldset class="form-fieldset" id="itinerary_box">
                            <table style="width:100%">
                              <tr>
                                <td width="100%">
                                  <div class="mb-3">
                                    <select class="form-select" name="hotel_ids[]" id="hotel_id" data-placeholder="Select..."  autocomplete="off">
                                      <option value="-1">No Hotel</option>
                                      @if(!empty($hotels))
                                        @foreach ($hotels as $hotel) 
                                          <option value='{{ $hotel->hotel_id }}'>{{$hotel->hotel_name}}</option>
                                        @endforeach
                                      @endif
                                    </select>
                                    @error('status')
                                      <span class="error_msg">{{ $message }}</span>
                                    @enderror
                                  </div>
                                  <div class="mb-3">
                                    <textarea type="text" class="form-control hotel_desc" name="hotel_description[]" id="hotel_description" placeholder="Description"></textarea>
                                  </div>                        
                                </td>
                              </tr>
                            </table>
                          </fieldset>
                        </div>
                        <input type="hidden" name="tour_id" value="{{@$tour_id}}">
                        <input type="submit" class="btn btn-primary" value="Save as Draft"/>
                      </form>
                      @else
                      Please fill Required Fields first   
                      @endif
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tab6" role="tabpanel">
                    <h4>Image Gallery</h4>
                    <div>
                      @if(!empty($tour_id))
                      <form id="form_tour_add_tab_6" name="form_tour_add_tab_6" class="outer-repeater float-none" method="POST" enctype="multipart/form-data" action="">
                        @csrf

                        <fieldset class="form-fieldset" id="itinerary_box">
                          <table style="width:100%">
                            <tr>
                              <td width="100%">
                                <div class="mb-3">
                                  <style type="text/css">
                                    .img-box{width:100px;height:100px; display: inline-block;float:left; position: relative;overflow: hidden;}
                                    .img-box img {width:100px;height:100px;border:2px solid #ccc;}
                                    .img-box .img-box-close {position: absolute; display: inline-block; width: 22px; height: 22px; background: red; color: white;  right: 5px; top: 5px; text-align: center; padding: 0; margin: 0; border-radius: 13px;}
                                    .img-box .img-box-close:hover {cursor: pointer;background: black;}
                                  </style>
                                  <span class="img-box">
                                    <img src="http://127.0.0.1:8001/storage/img/business_logo_1737843080.png"/>
                                    <span class="img-box-close">x</span>
                                  </span>
                                  <input type="hidden" class="form-control" name="tour_gallery[]" id="" autocomplete="off">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td style="padding-top:10px">
                                <div class="row">
                                  <div class="col-lg-6">
                                    <div class="mb-3">
                                      <input class="form-control" id="tour_category_banner" name="tour_category_banner" type="file"/>
                                      <span class="error_msg" id="error_tour_category_banner"></span>
                                    </div>
                                  </div>  
                                  <div class="col-lg-6">
                                    <button class="btn btn-primary">+ Add Image</button>
                                  </div>  
                                </div>                        
                              </td>
                            </tr>
                          </table>
                        </fieldset>
                        <input type="hidden" name="tour_id" value="{{@$tour_id}}">
                        <input type="submit" class="btn btn-primary" value="Save as Draft"/>
                      </form>
                      @else
                      Please fill Required Fields first   
                      @endif
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tab7" role="tabpanel">
                    <h4>Image Gallery</h4>
                    <div>
                      @if(!empty($tour_id))
                      <form id="form_tour_add_tab_7" name="form_tour_add_tab_7" class="outer-repeater float-none" method="POST" enctype="multipart/form-data" action="">
                        @csrf
                        <label for="tour_category_title" class="form-label">Select Category <span class="required">*</span></label>
                        {!! $tree !!}            
                        <input type="hidden" name="tour_id" value="{{@$tour_id}}">
                        <input type="submit" class="btn btn-primary" value="Save as Draft"/>
                      </form>  
                      @else
                      Please fill Required Fields first   
                      @endif        
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-lg-12 text-center">
                <button type="submit" class="btn btn-secondry waves-effect waves-light" id="insert">Save and Publish</button>
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



  new TomSelect("#tour_type",{ maxItems: 100 });
  new TomSelect("#tags",{ maxItems: 100 });
  new TomSelect("#hotel_id", {allowEmptyOption: true, create: true});
});
</script>

@endsection

