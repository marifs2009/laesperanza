@extends('admin.app')
@section('title', $page_title)

@section('page_css')
  
@endsection
@section('content')
<div class="page-header d-print-none mt-0">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <div class="page-pretitle">Manage</div>
                <h2 class="page-title">Tours</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{route('tour.add')}}" class="btn btn-primary d-none d-sm-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                        New Tour
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
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th style="width:5%;" class="text-center">S. No.</th>
                            <th style="width:15%;" class="text-center">Title</th>
                            <th style="width:15%;" class="text-center">Subtitle</th>
                            <th style="width:15%;" class="text-center">Slug</th>
                            <th style="width:8%;" class="text-center">View Tour</th>
                            <th style="width:12%;" class="text-center">Banner</th>
                            <th style="width:8%;" class="text-center">Status</th>
                            <th style="width:12%;" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($tours))
                            @foreach($tours as $tour)
                                <tr>
                                    <td class="text-center">{{ $loop->index + 1}}</td>
                                    <td class="text-center">{!!$tour->tour_title!!}</td>
                                    <td class="text-center">{!!$tour->tour_subtitle!!}</td>
                                    <td class="text-center">{!!$tour->tour_slug!!}</td>
                                    <td class="text-center">
                                        <a href="{{route($tour->tour_slug)}}" target="_new">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-eye-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M11.102 17.957c-3.204 -.307 -5.904 -2.294 -8.102 -5.957c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6a19.5 19.5 0 0 1 -.663 1.032" /><path d="M15 19l2 2l4 -4" /></svg>
                                        </a>
                                    </td>
                                    <td class="text-center"><img src="{{ asset('storage/' . $tour->tour_banner) }}" style="height:40px;width:auto;"></td>
                                    <td class="text-center">{!!$tour->tour_template!!}</td>
                                    <td class="text-center">@if($tour->status == 1) Active @else Inactive @endif</td>

                                    <td class="text-center">
                                        <a type="button" class="btn" href="{{ route('tour.edit', ['tour_id' => $tour->tour_id]) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path><path d="M16 5l3 3"></path></svg>
                                        </a>
                                        <button type="button" class="btn" onclick="slider_delete(5);">
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
</div>
@endsection
@section('page_script')
<script>
function deleteTour(tourId){
    if(tourId!=""){
        Swal.fire({
            icon: "question",
            title: 'Are you sure?',
            text: 'you want to delete this tour!',
            showDenyButton: true,
            confirmButtonText: 'Yes, delete it',
            denyButtonText: 'No, keep it',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "{route('tour.delete')}}",
                        data: {'tourId':tourId},
                        success: function(response)
                        {
                            response=JSON.parse(response);
                            console.log(response);
                            if(response.status==1){
                                    Swal.fire({icon: 'success',title: response.msg}).then((result) => {
                                    window.location.href="{{route('tour.list')}}";                        
                                    });
                            }else{
                                Swal.fire({icon: 'error', title: ' Something went wrong!'});
                            }
                        }
                    })
                } 
                else if (result.isDenied) {
                }
            })
        }
    }
</script>
@endsection
