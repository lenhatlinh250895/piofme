@extends('Admin.layout.Master')
@section('title')
	Dashbroad
@endsection
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Dashbroad</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-md-12 col-xl-4">
            <div class="card mini-stat">
                <div class="mini-stat-icon text-right">
                    <i class="fa fa-eye"></i>
                </div>
                <div class="p-4">
                    <h6 class="text-uppercase mb-3">Number Visitors</h6>
                    <h4 class="mb-0 text-center">13321</h4>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-xl-4">
            <div class="card mini-stat">
                <div class="mini-stat-icon text-right">
                    <i class="fa fa-user"></i>
                </div>
                <div class="p-4">
                    <h6 class="text-uppercase mb-3">Number Posts</h6>
                    <h4 class="mb-0 text-center"> {{count($countPostPresent)}} posts</h4>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-xl-4">
            <div class="card mini-stat">
                <div class="mini-stat-icon text-right">
                    <i class="fa fa-photo"></i>
                </div>
                <div class="p-4">
                    <h6 class="text-uppercase mb-3">Number Banner</h6>
                    <h4 class="mb-0 text-center">{{count($countBanner)}} photos</h4>
                </div>
            </div>
        </div>                                         
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">List Posts</h4>
                    
                    <div class="table-responsive">
                        <table class="table border-bottom" id="my-table">
                            <thead>
                                <tr>
	                                <th>ID</th>
	                                <th>Image</th>
	                                <th>Name</th>
	                                <th>Description</th>
	                                <th>Category</th>
<!--  	                                <th></th> -->
                                </tr>
                            </thead>
                            <tbody>
	                            @foreach($listNews as $l)
                                <tr id="1">
                                    <td>{{$l->id}}</td>
                                    <td>
	                                    @if($l->images != '')
	                                    <img src="{{asset('').'/'}}{{$l->images}}" height="50">
	                                    @else
	                                    <span class="text-danger">no photo</span>
	                                    @endif
                                    </td>
                                    <td>{{$l->title}}</td>
                                    <td>{{$l->summary_content}}</td>
                                   <td>{{$l->name}}</td>
<!--
                                    <td>
	                                    <a href="" class="btn btn-info btn-xs waves-effect waves-light" target="_blank">Detail </a>
                                    </td>
-->

                            	</tr>
                            	@endforeach
                            </tbody>
                        </table>
                        <div class=" float-right">{{ $listNews->links('Admin.Pagination.Index') }}</div>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

</div>
@endsection