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
        <h2 class="page-title">{{ $page_title }}</h2>
      </div>
          
            @if(session('success'))
                <div class="alert alert-success"><strong>Success!</strong> {{session('success')}}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger"><strong>Error!</strong> {{session('error')}}</div>
            @endif
      
        <form class="card" action="{{route('user.update')}}" method="POST"  enctype="multipart/form-data" >
            @csrf
            <div class="card-body">
                <h3 class="card-title">Update User</h3>
                <div class="row row-cards">
                   <input type="hidden" name="hidden_user_id" value="{{$user->id}}">
                   <input type="hidden" name="hidden_adrs_id" value="{{$user_add->adrs_id }}">
                   <input type="hidden" name="hidden_uod_id" value="{{$user_other_detail->uod_id }}">
                <div class="col-sm-6 col-md-4">
                    <div class="mb-3">
                        <label class="form-label">User Role</label>
                        <select class="form-control form-select" name="role" id="role">
                        @if (!empty($role))
                            @foreach ($role as $row)
                                <option value="{{ $row->id }}" {{ optional($user)->role == $row->id ? 'selected' : '' }}>
                                    {{ $row->name }}
                                </option>
                            @endforeach
                        @endif

                        </select>
                        @error('role')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror     
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text"  name="name" id="name" class="form-control" placeholder="Username" value="{{ $user->name ?? '' }}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email"  name="email" id="email" class="form-control" placeholder="Email" value="{{ $user->email ?? '' }}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="mb-3">
                    <label class="form-label">DOB</label>
                    <input type="date"  name="dob" id="dob" class="form-control text-uppercase" placeholder="DOB" value="{{ $user->dob ?? '' }}">
                    @error('dob')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror    
                </div>
                </div>
                 
                <div class="col-sm-6 col-md-4">
                    <div class="mb-3">
                    <label class="form-label">Picture</label>
                    <input type="file"  name="picture" id="picture" class="form-control"   >
                    <input type="hidden"  name="hidden_picture" id="hidden_picture" class="form-control"  value="{{ $user->pic ?? '' }}"   >
                    @error('picture')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror     
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="mb-3">
                    <label class="form-label">Address Type</label>
                    <select class="form-control form-select"  name="address_type" id="address_type" >
                        <option {{ optional($user_add)->adrs_type == 'home' ? 'selected' : '' }}  value="home">Home</option>
                        <option  {{ optional($user_add)->adrs_type == 'office' ? 'selected' : '' }}  value="office">Office</option>
                    </select>
                  
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="mb-3">
                    <label class="form-label">House No</label>
                    <input type="text"  name="house_no" id="house_no" class="form-control" placeholder="House No"  value="{{ $user_add->hno ?? '' }}">
                    @error('house_no')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror     
                   </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="mb-3">
                    <label class="form-label">Address Line 1</label>
                    <input type="text"  name="address_line_1" id="address_line_1" class="form-control" placeholder="Address Line 1"  value="{{ $user_add->line1 ?? '' }}">
                    @error('address_line_1')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror    
                </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="mb-3">
                    <label class="form-label">Address Line 2</label>
                    <input type="text"  name="address_line_2" id="address_line_2" class="form-control" placeholder="Address Line 2"  value="{{ $user_add->line2 ?? '' }}">
                  
                </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="mb-3">
                    <label class="form-label">Landmark</label>
                    <input type="text"  name="landmark" id="landmark" class="form-control" placeholder="Landmark"  value="{{ $user_add->landmark ?? '' }}">
                    @error('landmark')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror      
                </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="mb-3">
                    <label class="form-label">City</label>
                    <input type="text"  name="city" id="city" class="form-control" placeholder="City"  value="{{ $user_add->city ?? '' }}">
                    @error('city')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror      
                </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="mb-3">
                    <label class="form-label">State</label>
                    <input type="text"  name="state" id="state" class="form-control" placeholder="State"  value="{{ $user_add->state ?? '' }}">
                    @error('state')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror       
                </div>
                </div>
               
                <div class="col-sm-6 col-md-4">
                    <div class="mb-3">
                    <label class="form-label">Country</label>
                    <select class="form-control form-select" name="country" id="country" >
                        <option {{ optional($user_add)->country == 1 ? 'selected' : '' }} value="1">India</option>
                        <option {{ optional($user_add)->country == 2 ? 'selected' : '' }} value="2">USA</option>
                    </select>
                    @error('country')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror   
                    </div>
                </div>
                
                <div class="col-sm-6 col-md-4">
                    <div class="mb-3">
                    <label class="form-label">Postal Code</label>
                    <input type="test"  name="pincode" id="pincode" class="form-control" placeholder="ZIP Code" value="{{ $user_add->pin ?? '' }}" >
                    @error('pincode')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror   
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="mb-3">
                    <label class="form-label">Address proof</label>
                    <input type="file"  name="address_proof" id="address_proof" class="form-control"   >
                    <input type="hidden"  name="hidden_address_proof" id="hidden_address_proof" class="form-control" value="{{ $user_other_detail->address_proof ?? '' }}"   >
                    @error('address_proof')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror     
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="mb-3">
                    <label class="form-label">ID proof</label>
                    <input type="file"  name="id_proof" id="id_proof" class="form-control"   >
                    <input type="hidden"  name="hidden_id_proof" id="hidden_id_proof" class="form-control" value="{{ $user_other_detail->id_proof ?? '' }}"   >
                    @error('id_proof')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror     
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="mb-3">
                    <label class="form-label">Passport Number</label>
                    <input type="text"  name="passport_number" id="passport_number" class="form-control" placeholder="password number" value="{{ $user_other_detail->passport_number ?? '' }}">
                    @error('passport_number')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror   
                   </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="mb-3">
                    <label class="form-label">Passport Expiry Date</label>
                    <input type="date"  name="passport_expiry_date" id="passport_expiry_date" class="form-control text-uppercase" placeholder="password expiry date" value="{{ $user_other_detail->passport_exp_on ?? '' }}">
                    @error('passport_expiry_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror      
                </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-control form-select" name="status" id="status" >
                        <option {{ optional($user)->status == 1 ? 'selected' : '' }} value="1">Active</option>
                        <option {{ optional($user)->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
                    </select>
                    
                    </div>
                </div>

            </div>
            </div>
            <div class="card-footer text-end mt-2">
                <button type="submit" class="btn btn-primary">Update User</button>
            </div>
        </form>
        
    </div>
  </div>
</div>





@endsection
@section('page_script')


@endsection