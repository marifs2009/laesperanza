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
        <h2 class="page-title">{{$page_title}}</h2>
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
        @if(session('tour_requiredfields_success'))
          <div class="alert alert-success">{{ session('tour_requiredfields_success') }}</div>
        @endif
        @if(session('tour_optionalfields_success'))
          <div class="alert alert-success">{{ session('tour_optionalfields_success') }}</div>
        @endif
        @if(session('tour_optionalfields_error'))
          <div class="alert alert-danger">{{ session('tour_optionalfields_error') }}</div>
        @endif


        @if(session('tour_metafields_success'))
          <div class="alert alert-success">{{ session('tour_metafields_success') }}</div>
        @endif
        @if(session('tour_metafields_error'))
          <div class="alert alert-danger">{{ session('tour_metafields_error') }}</div>
        @endif   


        @if(session('tour_categoryfields_success'))
          <div class="alert alert-success">{{ session('tour_categoryfields_success') }}</div>
        @endif
        @if(session('tour_categoryfields_error'))
          <div class="alert alert-danger">{{ session('tour_categoryfields_error') }}</div>
        @endif 

        @if(session('tour_itineraryfields_success'))
          <div class="alert alert-success">{{ session('tour_itineraryfields_success') }}</div>
        @endif
        @if(session('tour_itineraryfields_error'))
          <div class="alert alert-danger">{{ session('tour_itineraryfields_error') }}</div>
        @endif 

        @if(session('tour_hotelfields_success'))
          <div class="alert alert-success">{{ session('tour_hotelfields_success') }}</div>
        @endif
        @if(session('tour_hotelfields_error'))
          <div class="alert alert-danger">{{ session('tour_hotelfields_error') }}</div>
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
                      <form id="form_tour_add_tab_1" name="form_tour_add_tab_1" method="POST" enctype="multipart/form-data" action="{{route('requiredfields.update')}}">
                        @csrf
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label for="tour_title" class="form-label">Title <span class="required">*</span></label>
                              <input class="form-control" id="tour_title" name="tour_title" type="text" placeholder="Enter Title" value="{{ $selected_tour->tour_title }}"/>
                            </div>                                           
                          </div>
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label for="tour_slug" class="form-label">Slug <span class="required">*</span></label>
                              <input class="form-control" id="tour_slug" name="tour_slug" type="text" placeholder="Enter Slug" value="{{ $selected_tour->tour_slug }}"/>
                            </div>                                           
                          </div>
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label for="tour_code" class="form-label">Tour Code (or Tour ID)  (or Package ID)  <span class="required">*</span></label>
                              <input class="form-control" id="tour_code" name="tour_code" type="text" placeholder="Enter Title" value="{{ $selected_tour->tour_code }}"/>
                              <small>With is you can track all activity about a tour.</small>
                            </div>                                           
                          </div>
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label class="form-label"> Price Per Person <span class="required">*</span></label>
                              <table style="width:100%">
                                <tr>
                                  <td width="25%">
                                    <input class="form-control" id="tour_price_per_adult" name="tour_price_per_adult" type="number" min="0" step="0.1" value="{{ $selected_tour->tour_price_per_adult }}" />
                                  </td>
                                  <td width="25%">Adult(s)</td>
                                  <td width="25%">
                                    <input class="form-control" id="tour_price_per_child" name="tour_price_per_child" type="number" min="0" step="0.1" value="{{ $selected_tour->tour_price_per_child }}" />
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
                                    <input class="form-control" id="tour_duration_days" name="tour_duration_days" type="number" value="{{ $selected_tour->tour_duration_day }}" min="1" max="100" step="1"/>
                                  </td>
                                  <td width="25%">Day(s)</td>
                                  <td width="25%">
                                    <input class="form-control" id="tour_duration_night" name="tour_duration_night" type="number" value="{{ $selected_tour->tour_duration_night }}" min="1" max="100" step="1"/>
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
                                    @foreach ($selected_tour_types as $selected_tour_type_id)
                                    <option value='{{ $tour_type->tour_type_id }}'
                                        @if($selected_tour_type_id == $tour_type->tour_type_id)
                                            selected='selected'
                                        @endif
                                        >{{$tour_type->tour_type_name}}</option>
                                    @endforeach
                                  @endforeach
                                @endif            
                                <option value="-1">Uncategorized</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label for="tour_start" class="form-label">Start Location <span class="required">*</span></label>
                              <input class="form-control" id="tour_start" name="tour_start" type="text" placeholder="Enter start location"  value="{{ $selected_tour->tour_start_location }}"/>
                            </div>                                           
                          </div>
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label class="form-label"> Group Size <span class="required">*</span></label>
                              <table style="width:100%">
                                <tr>
                                  <td width="25%">
                                    <input class="form-control" id="tour_group_size_adult" name="tour_group_size_adult" value="{{ $selected_tour->tour_group_size_adult }}" type="number" min="1" max="100" step="1"/>
                                  </td>
                                  <td width="25%">Adult(s)</td>
                                  <td width="25%">
                                    <input class="form-control" id="tour_group_size_child" name="tour_group_size_child" value="{{ $selected_tour->tour_group_size_child }}" type="number" min="0" max="100" step="1"/>
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
                            <table style="width:100%">
                              <tr>
                                <td>
                                  <label for="page_banner" class="form-label">Existing Banner</label>
                                  <img src="{{ asset('storage/' . $selected_tour->tour_banner) }}" style="height:40px;width:auto;">
                                  <input type="hidden" name="old_tour_banner" value="{{ $selected_tour->tour_banner }}">
                                </td>
                                <td>                     
                                  <label for="tour_banner" class="form-label">Page Banner (Optional)</label>
                                  <input class="form-control" id="tour_banner" name="tour_banner" type="file"/>
                                  <span class="error_msg" id="error_tour_banner"></span>                
                                </td>
                              </tr>
                            </table>
                            <p style="font-size: 12px;">Leave blank if you do not change current banner image</p>                            
                          </div>
                          <div class="col-lg-6">
                            <div class="mb-3"> 
                              <label for="status" class="form-label">Status <span class="required">*</span></label>
                              <select class="form-select" name="status" id="status">
                                <option value='1' @if($selected_tour->status == 1) selected="selected" @endif>Active</option>
                                <option value='0' @if($selected_tour->status == 0) selected="selected" @endif>Inactive</option>
                              </select>
                            </div>
                          </div>
                        </div> 
                        <input type="hidden" name="tour_id" value="{{ $selected_tour->tour_id }}">
                        <input type="submit" class="btn btn-primary" value="Save"/>
                      </form>                      
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tab2" role="tabpanel">
                    <h4>Optional Fields</h4>
                    <div>
                      @if(!empty($tour_id))
                      <form id="form_tour_add_tab_2" name="form_tour_add_tab_2" class="outer-repeater float-none" method="POST" enctype="multipart/form-data" action="{{route('optionalfields.update')}}">
                        @csrf
                        <div class="row">  
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label for="tour_subtitle" class="form-label">Subtitle (Optional)</label>
                              <input class="form-control" id="tour_subtitle" name="tour_subtitle" type="text" placeholder="Enter Subtitle" value="{{ $selected_tour->tour_subtitle }}"/>
                              <span class="error_tour_subtitle" id="error_tour_subtitle"></span>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="mb-3"> 
                              <label for="tags" class="form-label">Tags (Optional)</label>
                              <select class="form-select" id="tour_tags" name="tour_tags[]" multiple placeholder="Select..." autocomplete="off">
                                @if(!empty($tags))
                                    @foreach ($tags as $tag) 
                                        @foreach ($selected_tour_tags as $selected_tour_tag_id)
                                        <option 
                                            @if($selected_tour_tag_id == $tag->tag_id)
                                                selected='selected'
                                            @endif 
                                        value='{{ $tag->tag_id }}'>{{$tag->tag_name}}</option>
                                        @endforeach
                                    @endforeach
                                @endif
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="mb-2">
                              <label for="tour_excerpt" class="form-label">Excerpt/Summary (Optional)</label>
                              <small>This text will display in Tour listing</small>
                              <textarea rows="3" class="form-control" id="tour_excerpt" name="tour_excerpt">{{ $selected_tour->tour_excerpt }}</textarea>
                              <span class="error_msg" id="error_tour_excerpt"></span>
                            </div>
                          </div>        
                          <div class="col-lg-6">
                            <div class="mb-2">
                              <label for="tour_description" class="form-label">Detailed Description (Optional)</label>
                              <small>This text will display in Tour detail page.</small>
                              <textarea rows="3" class="form-control" id="tour_description" name="tour_description">{{ $selected_tour->tour_description }}</textarea>
                              <span class="error_msg" id="error_tour_description"></span>
                            </div>
                          </div>        
                          <div class="col-lg-6">
                            <div class="mb-2">
                              <label for="tour_inclusion" class="form-label">Inclusion (Optional)</label>
                              <textarea rows="3" class="form-control" id="tour_inclusion" name="tour_inclusion">{{ $selected_tour->tour_inclusion }}</textarea>
                              <span class="error_msg" id="error_tour_inclusion"></span>
                            </div>
                          </div>        
                          <div class="col-lg-6">
                            <div class="mb-2">
                              <label for="tour_exclusion" class="form-label">Exclusion (Optional)</label>
                              <textarea rows="3" class="form-control" id="tour_exclusion" name="tour_exclusion">{{ $selected_tour->tour_exclusion }}</textarea>
                              <span class="error_msg" id="error_tour_exclusion"></span>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="mb-2">
                              <label for="tour_available_offer" class="form-label">Available Offer (Optional)</label>
                              <textarea rows="3" class="form-control" id="tour_available_offer" name="tour_available_offer" placeholder="Excerpt">{{ $selected_tour->tour_available_offer }}</textarea>
                              <span class="error_msg" id="error_tour_available_offer"></span>
                            </div>
                          </div>        
                          <div class="col-lg-6">
                            <div class="mb-2">
                              <label for="tour_meals" class="form-label">Meals (Optional)</label>
                              <textarea rows="3" class="form-control" id="tour_meals" name="tour_meals">{{ $selected_tour->tour_meals }}</textarea>
                              <span class="error_msg" id="error_tour_meals"></span>
                            </div>
                          </div>    
                          <div class="col-lg-6">
                            <div class="mb-2">
                              <label for="tour_transfer" class="form-label">Transfer (Optional)</label>
                              <textarea rows="3" class="form-control" id="tour_transfer" name="tour_transfer">{{ $selected_tour->tour_transfer }}</textarea>
                              <span class="error_msg" id="error_tour_transfer"></span>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="mb-2">
                              <label for="tour_tax" class="form-label">Tax (Optional)</label>
                              <textarea rows="3" class="form-control" id="tour_tax" name="tour_tax">{{ $selected_tour->tour_tax }}</textarea>
                              <span class="error_msg" id="error_tour_tax"></span>
                            </div>
                          </div>
                          <div class="col-lg-3">
                            <div class="mb-3"> 
                              <label for="tour_add_to_hot_deals" class="form-label">Add to hot deals <span class="required">*</span></label>
                              <select class="form-select" name="tour_add_to_hot_deals" id="tour_add_to_hot_deals">
                                <option value='1' @if($selected_tour->tour_add_to_hot_deals == 1) selected="selected" @endif>Yes</option>
                                <option value='0' @if($selected_tour->tour_add_to_hot_deals == 0) selected="selected" @endif>No</option>
                              </select>
                            </div>
                          </div>
                        </div> 
                        <input type="hidden" name="tour_id" value="{{@$tour_id}}">
                        <input type="submit" class="btn btn-primary" value="Save"/>
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
                      <form id="form_tour_add_tab_3" name="form_tour_add_tab_3" class="outer-repeater float-none" method="POST" enctype="multipart/form-data" action="{{route('metafields.update')}}">
                        @csrf
                        <div class="row" style="background-color:#eee;padding:10px;margin:0px;margin-bottom:10px;">
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label for="meta_title" class="form-label">Meta Title (Optional)</label>
                              <textarea class="form-control" name="meta_title" id="meta_title" rows="2">{{ $selected_tour->meta_title }}</textarea>
                              <span class="error_msg" id="error_meta_title"></span>
                            </div> 
                          </div>
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label for="meta_keyword" class="form-label">Meta Keyword (Optional)</label>
                              <textarea class="form-control" name="meta_keyword" id="meta_keyword" rows="2">{{ $selected_tour->meta_keyword }}</textarea>
                              <span class="error_msg" id="error_meta_keyword"></span>
                            </div> 
                          </div>
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label for="meta_description" class="form-label">Meta Description (Optional)</label>
                              <textarea class="form-control" name="meta_description" id="meta_description" rows="2">{{ $selected_tour->meta_description }}</textarea>
                              <span class="error_msg" id="error_description"></span>
                            </div> 
                          </div>
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label for="other_header_html" class="form-label">Any Other Header HTML/script (Optional)</label>
                              <textarea class="form-control" name="other_header_html" id="other_header_html" rows="2">{{ $selected_tour->other_header_html }}</textarea>
                              <span class="error_msg" id="error_other_header_html"></span>
                            </div> 
                          </div>
                        </div> 
                        <input type="hidden" name="tour_id" value="{{@$tour_id}}"> 
                        <input type="submit" class="btn btn-primary" value="Save"/>
                      </form> 
                      @else
                      Please fill Required Fields first   
                      @endif 
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tab4" role="tabpanel">
                    <div>
                      @if(!empty($tour_id))
                      <form id="form_tour_add_tab_4" name="form_tour_add_tab_4" class="outer-repeater float-none" method="POST" enctype="multipart/form-data" action="{{route('itineraryfields.update')}}">
                        @csrf
                        <div class="col-lg-12">
                            <table style="width:100%; margin-bottom: 10px;">
                                <tr>
                                    <td style="width:50%; text-align: left;">
                                        <h4>Itinerary</h4>
                                    </td>
                                    <td style="width:50%; text-align: right;">
                                        <button type="button" class="btn btn-primary" id="addMoreBtn">+ Add More</button>
                                        <button type="button" class="btn btn-danger" id="removeLastBtn">- Remove Last</button>
                                    </td>
                                </tr>
                            </table>
                            <div>
                                <table style="width:100%" id="itinerary_box">
                                    @if(!empty($itineraries))
                                    @foreach($itineraries as $itinerary)
                                    <tr style="padding:10px;border:1px solid #d4e4d8;">
                                        <td width="100%">
                                            <div class="mb-3">
                                                <input type="text" value="{{$itinerary->itinerary_title}}" class="form-control itinerary_title" name="itinerary_title[]" placeholder="Title" autocomplete="off">
                                            </div>
                                            <div class="mb-3">
                                                <textarea class="form-control itinerary_description" name="itinerary_description[]" placeholder="Description">{{$itinerary->itinerary_description}}</textarea>
                                            </div>                        
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </table>
                            </div>
                        </div>                        
                        <input type="hidden" name="tour_id" value="{{@$tour_id}}">
                        <input type="submit" class="btn btn-primary" value="Save"/>
                      </form>
                      @else
                      Please fill Required Fields first   
                      @endif
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tab5" role="tabpanel">
                    <div>
                      @if(!empty($tour_id))
                      <form id="form_tour_add_tab_5" name="form_tour_add_tab_5" class="outer-repeater float-none" method="POST" enctype="multipart/form-data" action="{{route('hotelfields.update')}}">
                        @csrf
                        <div class="col-lg-12">
                          <table style="width:100%; margin-bottom: 10px;">
                            <tr>
                              <td style="width:50%;text-align: left;">
                                <h4>Hotels to Stay</h4>
                              </td>
                              <td style="width:50%;text-align: right;">
                                <button type="button" class="btn btn-primary" id="addMoreRowBtn">+ Add More</button>
                                <button type="button" class="btn btn-danger" id="removeLastRowBtn">- Remove Last</button>
                              </td>
                            </tr>
                          </table>
                          <fieldset class="form-fieldset">
                            <table style="width:100%" id="hotel_box">
                                @if(!empty($mapped_hotels))
                                @foreach($mapped_hotels as $mapped_hotel)
                                <tr>
                                <td width="100%">
                                  <div class="mb-3">
                                    <select class="form-select" name="hotel_id[]" data-placeholder="Select..."  autocomplete="off">
                                      <option value="-1">No Hotel</option>
                                      @if(!empty($hotels))
                                        @foreach ($hotels as $hotel) 
                                          <option @if($mapped_hotel->hotel_id==$hotel->hotel_id) selected="selected" @endif value='{{ $hotel->hotel_id }}'>{{$hotel->hotel_name}}</option>
                                        @endforeach
                                      @endif
                                    </select>
                                  </div>
                                  <div class="mb-3">
                                    <textarea type="text" class="form-control hotel_desc" name="hotel_description[]" placeholder="Description">{{$mapped_hotel->description}}</textarea>
                                  </div>                        
                                </td>
                              </tr>
                                @endforeach
                                @endif
                            </table>
                          </fieldset>
                        </div>
                        <input type="hidden" name="tour_id" value="{{@$tour_id}}">
                        <input type="submit" class="btn btn-primary" value="Save"/>
                      </form>
                      @else
                      Please fill Required Fields first   
                      @endif
                    </div>
                  </div>
                  <style type="text/css">
                    .img-box{width:100px;height:100px; display: inline-block;float:left; position: relative;overflow: hidden;background-repeat: no-repeat; background-size: cover; background-position: center center;margin-right:5px;border: 2px solid #ccc;}
                    .img-box img {width:100px;height:100px;border:2px solid #ccc; }
                    .img-box .img-box-delete {position: absolute; display: inline-block; width: 22px; height: 22px; background: red; color: white;  right: 5px; top: 5px; text-align: center; padding: 0; margin: 0; border-radius: 13px;}
                    .img-box .img-box-delete:hover {cursor: pointer;background: black;}
                  </style>
                  <div class="tab-pane fade" id="tab6" role="tabpanel">
                    <h4>Image Gallery</h4>
                    <div>
                      @if(!empty($tour_id))
                      <form id="form_tour_add_tab_6" name="form_tour_add_tab_6" class="outer-repeater float-none" method="POST" enctype="multipart/form-data" action="">
                       @csrf
                       <meta name="csrf-token" content="{{ csrf_token() }}">

                        <fieldset class="form-fieldset" id="">
                          <table style="width:100%">
                            <tr>
                              <td width="100%">
                                <div class="mb-3" id="imagePreview">

                                @if(!empty($tour_gallery))
                                @foreach($tour_gallery as $img)
                                  <span title="{{ $img->tour_image_alt }}" class="img-box" id="img-box-{{$img->id}}" style="background-image: url({{ url('/') }}/{{ $img->tour_image_url }});">
                                    <span class="img-box-delete" 
                                    data-id="{{$img->id}}" 
                                    data-tour_id="{{$img->tour_id}}"
                                    data-tour_image_url="{{$img->tour_image_url}}"
                                    >x</span>
                                  </span>
                                @endforeach
                                @endif
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td style="padding-top:10px">
                                <div class="row">
                                  <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label>Choose Image</label>
                                      <input type="file" class="form-control" id="tour_gal_img" name="tour_gal_img"/>
                                      <span class="error_msg" id="error_tour_gal_img"></span>
                                    </div>
                                  </div> 
                                  <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label>Enter Alt Text (Optional)</label>
                                      <input type="text" class="form-control" id="tour_gal_img_alt" name="tour_gal_img_alt"/>
                                    </div>
                                  </div>  
                                  <div class="col-lg-6">
                                    <input type="hidden" name="tour_id" id="g_tour_id" value="{{@$tour_id}}">
                                    <button type="button" id="uploadImage" class="btn btn-primary">+ Add Image</button>
                                  </div>  
                                </div>                        
                              </td>
                            </tr>
                          </table>
                        </fieldset>
                      </form>
                      @else
                      Please fill Required Fields first   
                      @endif
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tab7" role="tabpanel">
                    <h4>Tour Categories</h4>
                    <div>
                      @if(!empty($tour_id))
                      <div class="row">
                          <div class="col-md-6">
                            @if(!empty($selected_tour_categorie))
                            <h4>Selected Tour Categories</h4>
                            <ul>
                                @foreach($selected_tour_categorie as $tour_cat)
                                <li>{{$tour_cat->tour_category_name}}</li>
                                @endforeach
                            </ul>
                            @else
                                No category selected.
                            @endif

                          </div>
                          <div class="col-md-6">
                            <h4>Choose Categories</h4>
                              <form id="form_tour_add_tab_7" name="form_tour_add_tab_7" class="outer-repeater float-none" method="POST" enctype="multipart/form-data" action="{{route('categoryfields.update')}}">
                                @csrf
                                {!! $tree !!}            
                                <input type="hidden" name="tour_id" value="{{@$tour_id}}">
                                <input type="submit" class="btn btn-primary" value="Save"/>
                              </form> 
                          </div>
                      </div> 
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
  new TomSelect("#tour_type",{
    maxItems: 100,
    placeholder: "Select tour types",
    allowEmptyOption: true,
    create: true
  });  
  @if(!empty($tour_id))
  new TomSelect("#tour_tags",{ maxItems: 100 });
  new TomSelect("#hotel_id", {allowEmptyOption: true, create: true});
  @endif
});
</script>
<script>
  // Get the container where the itineraries are added
  const itineraryBox = document.getElementById('itinerary_box');
  
  // Add More button functionality
  document.getElementById('addMoreBtn').addEventListener('click', function() {
    // Create a new row to add
    const newRow = document.createElement('tr');
    
    // Add the new row's content (input fields for title and description)
    newRow.innerHTML = `
      <td style="padding:10px;border:1px solid #d4e4d8;">
        <div class="mb-3">
          <input type="text" class="form-control itinerary_title" name="itinerary_title[]" placeholder="Title" autocomplete="off">
        </div>
        <div class="mb-3">
          <textarea class="form-control itinerary_description" name="itinerary_description[]" placeholder="Description"></textarea>
        </div>
      </td>
    `;
    
    // Append the new row to the itinerary box
    itineraryBox.appendChild(newRow);

    $('.itinerary_description').summernote({placeholder: '', tabsize: 1, height: 50});


  });
  
  // Remove Last button functionality
  document.getElementById('removeLastBtn').addEventListener('click', function() {
    // Get all the rows within the table (excluding the header)
    const rows = itineraryBox.querySelectorAll('table tr');
    
    // If there's more than one row (the first row is the header), remove the last row
    if (rows.length > 1) {
      rows[rows.length - 1].remove();
    }
  });
</script>
<script>
  // Get the container where the itineraries are added
  const hotelBox = document.getElementById('hotel_box');
  
  // Add More button functionality
  document.getElementById('addMoreRowBtn').addEventListener('click', function() {
    // Create a new row to add
    const newRow = document.createElement('tr');
    
    var str = "";
    str += `<td width="100%">
                          <div class="mb-3">
                            <select class="form-select" name="hotel_id[]" data-placeholder="Select..."  autocomplete="off">
                              <option value="-1">No Hotel</option>`
                              @if(!empty($hotels))
                                @foreach ($hotels as $hotel) 
                                  str += `<option value='{{ $hotel->hotel_id }}'>{{$hotel->hotel_name}}</option>`
                                @endforeach
                              @endif
                            str += `</select>`;
                            @error('status')
                              str += `<span class="error_msg">{{ $message }}</span>`;
                            @enderror
                          str += `</div>
                          <div class="mb-3">
                            <textarea type="text" class="form-control hotel_desc" name="hotel_description[]" placeholder="Description"></textarea>
                          </div>                        
                        </td>`;
    newRow.innerHTML = str;
    // Append the new row to the hotel box
    hotelBox.appendChild(newRow);

    $('.hotel_desc').summernote({placeholder: '', tabsize: 1, height: 50});


  });
  
  // Remove Last button functionality
  document.getElementById('removeLastRowBtn').addEventListener('click', function() {
    // Get all the rows within the table (excluding the header)
    const rows = hotelBox.querySelectorAll('table tr');
    
    // If there's more than one row (the first row is the header), remove the last row
    if (rows.length > 1) {
      rows[rows.length - 1].remove();
    }
  });
</script>

<script>
    $(document).ready(function () {
        $('#uploadImage').click(function () {
            var formData = new FormData(document.getElementById('form_tour_add_tab_6'));
            $.ajax({
                url: '{{route('imagefields.update')}}',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    if(response.status == 1){
                        var base = "{{url('/')}}";
                        var str = `
                        <span title="`+response.alt+`" class="img-box" id="img-box-`+response.id+`" style="background-image: url(`+base+`/`+response.url+`">
                            <span class="img-box-delete" 
                            data-id="`+response.id+`" 
                            data-tour_id="`+response.tour_id+`"
                            data-tour_image_url="`+response.url+`"
                            >x</span>
                        </span>`;

                        $('#imagePreview').append(str);
                    } else {
                        alert(response.msg);
                    }
                }
            });
        });
    });



    $(document).on('click', '.img-box-delete', function() {
    var id = $(this).data('id');
    var tour_image_url = $(this).data('tour_image_url');
    //alert(id + "|" + tour_image_url);
    // Ask for confirmation
    if (confirm("Are you sure you want to delete this image?")) {
        // Send AJAX request if the user confirms
        $.ajax({
            url: '{{route('imagefields.delete')}}',  
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: id,
                tour_image_url:tour_image_url
            },
            success: function(response) {
                console.log(response);
                if(response.success) {
                    alert(response.message);
                    $("#img-box-"+id).hide();
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function(xhr) {
                alert('Error: ' + xhr.responseJSON.message);
            }
        });
    }
});
</script>

@endsection
