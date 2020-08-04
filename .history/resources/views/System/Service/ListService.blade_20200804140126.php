@extends('System.Layouts.Master')
@section('title')
	List Service
@endsection
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">SERVICE</h4>
            </div>
        </div>
    </div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="la->id" data-toggle="tab" href="#search" role="tab" aria-controls="home" aria-selected="true">SEARCH</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="la->id" data-toggle="tab" href="#add-service" role="tab" aria-controls="home" aria-selected="true">ADD SERVICE</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show in active" id="search" role="tabpanel" aria-labelledby="2-tab">
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <form action="" method="get"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Id</label>
                                    <div class="col-sm-10">
                                        <input name="id_search" value="{{request()->input('id_search')}}" class="form-control" type="text" id="example-text-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input name="title_search" value="{{request()->input('title_search')}}" class="form-control" type="text" id="example-text-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-info waves-effect waves-light">
                                            Search
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
        <div class="tab-pane fade in" id="add-service" role="tabpanel" aria-labelledby="1-tab">
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <form action="{{ route('system.service.postAddService') }}" method="post"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input name="title" value="{!!old('title')!!}" class="form-control" type="text" id="example-text-input" require>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Images</label>
                                    <div class="col-sm-10">
                                        <div class="input-group mt-2">
                                            <span class="input-group-btn">
                                                <a data-input="thumbnail" data-preview="holder" class="btn btn-primary lfm">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                </a>
                                            </span>
                                            <div class="row">
                                                <div class="col-md-6"><input id="thumbnail" name="image" value="{!!old('image')!!}" class="form-control" type="text"></div>
                                                <div class="col-md-6"><input name="alt_image" value="{!!old('alt_image')!!}" class="form-control" type="text" placeholder="Alt image"></div>
                                            </div>
                                        </div>
                                        <img id="holder" style="margin-top:15px;max-height:100px;">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Introduce</label>
                                    <div class="col-sm-10">
                                    <textarea class="summernote-editor" name="introduce">{!!old('introduce')!!}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-info waves-effect waves-light">
                                            Save
                                        </button>
                                        <button type="reset" class="btn btn-danger waves-effect m-l-5">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-header p-3 m-0 text-center">
					<h5 class="card-title m-0 text-uppercase text-left ml-2">
						LIST SERVICE
					</h5>
				</div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table" id="my-table">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>TITLE</th>
                                <th>IMAGE</th>
                                <th>ALT</th>
                                <th>INTRODUCE</th>
                                <th>STATUS</th>
                                <th class="tabledit-toolbar-colitemn">ACTION</th></tr>
                            </thead>
                            <tbody>
                                @foreach ($service as $item)
                                <tr id="id_{{$item->id}}">
                                    <td><span class="tabledit-span tabledit-identifier">{{ $item->id }}</span></td>
                                    <td><span class="tabledit-span tabledit-identifier">{{ $item->title }}</span></td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span"><img src="{{ $item->image }}" height="50" width="100" alt=""></span><input class="tabledit-input form-control input-sm" type="text" name="col1" value="John" style="display: none;" disabled=""></td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">{{ $item->alt }}</span><input class="tabledit-input form-control input-sm" type="text" name="col1" value="Doe" style="display: none;" disabled=""></td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">{!! $item->introduce !!}     
                                    </span><input class="tabledit-input form-control input-sm" type="text" name="col3" value="john@example.com" style="display: none;" disabled="">
                                    </td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">{{ $item->status }}</span><input class="tabledit-input form-control input-sm" type="text" name="col1" value="John" style="display: none;" disabled=""></td>
                                    <td style="white-space: nowrap; width: 15%;"><div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                    @if($item->level != 1)
                                    <div class="btn-group btn-group-sm" style="float: none;">
                                        <a href="{{ Route('system.service.getEditService',$item->id) }}"><button type="button" data-toggle="modal" data-target="#modalEditUser" data-id="{{$item->id}}" class="btn-edit tabledit-edit-button btn btn-sm btn-light" style="float: none; margin: 5px;"><span class="ti-pencil"></span></button></a>
                                        <button type="button" data-id="{{$item->id}}" class="btn-delete tabledit-delete-button btn btn-sm btn-light" style="float: none; margin: 5px;"><span class="ti-trash text-danger"></span></button></div>
                                    </div>
                                    @endif
                                    </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$service->links()}}
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div>
@endsection
@section('script')
<script src="assets/plugins/summernote/summernote-bs4.min.js"></script>
<script src="vendor/laravel-filemanager/js/lfm.js?v={{ time() }}"></script>
<script src="assets/pages/form-summernote.init.js?v={{ time() }}"></script>
<script src="assets/js/summernote.js?v={{time()}}"></script>
<script>
    $('.lfm').filemanager('image');
    var token = '{{ csrf_token() }}';

    $('.btn-delete').on('click', function(){
        var id = $(this).data('id');
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, deleit!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'GET',
                    url: "{{ route('system.service.getDeleteService')}}",
                    data: {_token: token, id: id},
                    success: function($result){
                        console.log($result);
                        if($result){
                            toastr.success('Delete user successfully!', 'Success!', {timeOut: 3500});
                            $('#id_'+id).hide();
                        }else{
                            toastr.error('Delete user error!', 'Error!', {timeOut: 3500});
                        }
                    },
                });
            }
        })
    })
</script>
@endsection