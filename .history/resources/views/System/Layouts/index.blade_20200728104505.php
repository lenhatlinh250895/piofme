@extends('Admin.layout.Master')
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <div class="dropdown">
                        <button class="btn btn-secondary btn-round dropdown-toggle px-3" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-settings mr-1"></i>Settings
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            {{-- <a class="dropdown-item" href="{{ route('language.index',['vi']) }}">Tiếng Việt</a>
                            <a class="dropdown-item" href="{{ route('language.index',['en']) }}">English</a> --}}
                            {{-- <a class="dropdown-item" href="#">Something else here</a> --}}
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->

</div><!-- container -->
@endsection