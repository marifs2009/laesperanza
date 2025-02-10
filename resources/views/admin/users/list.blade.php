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
          <a href="{{route('user.add')}}" class="btn btn-primary d-none d-sm-inline-block" >
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
            Add New User
          </a>
        </div>
      </div>
      <table id="datatable-buttons" class="table table-bordered dt-responsive">
        <thead>
          <tr>
            <th style="width:5%;">Sr.No.</th>
            <th style="width:15%;">picture</th>
            <th style="width:25%;">Name</th>
            <th style="width:8%;">Email</th>
            <th style="width:7%;">Status</th>
            <th style="width:12%;">Action</th>
          </tr>
        </thead>
        <tbody>
          @if(!empty($users))
            @foreach($users as $row)
            <tr>
              <td>{{ $loop->index + 1}}</td>
              <td><img style="height:40px;width:auto;" src="{{asset('storage/' . $row->pic)}} "></td>

              <td>{{$row->name}}</td>
              <td>{{$row->email}}</td>
              <td style="text-align:center;">
                @if($row->status == 1)
                  <span class="badge bg-green-lt">Active</span>
                @else 
                  <span class="badge bg-orange-lt">Inactive</span>
                @endif
              </td>
              <td width="10%">
               <button type="button" class="btn" data-view_user_id="{{$row->id}}">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M12 4.5c-7.5 0 -11 7.5 -11 7.5s3.5 7.5 11 7.5s11 -7.5 11 -7.5s-3.5 -7.5 -11 -7.5z"></path>
                      <circle cx="12" cy="12" r="3"></circle>
                  </svg>
                </button>

                <a href="{{ url('/admin/users-edit/' . base64_encode($row->id)) }}" class="btn" data-edit_user_id="{{ $row->id }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                        <path d="M16 5l3 3"></path>
                    </svg>
                </a>


              
                <button type="button" class="btn"  data-delete_user_id="{{$row->id}}" >
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





@endsection
@section('page_script')


@endsection