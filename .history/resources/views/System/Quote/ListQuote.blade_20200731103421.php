@extends('System.Layouts.Master')
@section('title')
	List Quote
@endsection
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">QUOTE</h4>
            </div>
        </div>
    </div>
    <div class="row">
		<div class="col-12">
			<div class="card m-b-30">
				<div class="card-header p-3 m-0 text-center">
					<h5 class="card-title m-0 text-uppercase text-left ml-2">
						ADD QUOTE
					</h5>
				</div>
				<div class="card-body">
					<form action="{{ route('system.quote.postAddQuote') }}" method="post"  enctype="multipart/form-data">
						@csrf
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input name="name" value="{!!old('name')!!}" class="form-control" type="text" id="example-text-input" require>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input name="price" value="{!!old('price')!!}" class="form-control" type="number" id="example-text-input" require>
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
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-header p-3 m-0 text-center">
					<h5 class="card-title m-0 text-uppercase text-left ml-2">
						LIST QUOTE
					</h5>
				</div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table" id="my-table">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>PRICE</th>
                                <th>STATUS</th>
                                <th class="tabledit-toolbar-colitemn">ACTION</th></tr>
                            </thead>
                            <tbody>
                                @foreach ($quote as $item)
                                <tr id="id_{{$item->id}}">
                                    <td><span class="tabledit-span tabledit-identifier">{{ $item->id }}</span><input class="tabledit-input tabledit-identifier" type="hidden" name="id" value="1" disabled=""></td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">{!! $item->name !!}</span></td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">{{ $item->price }}</span></td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">{{ $item->status }}</span></td>
                                    <td style="white-space: nowrap; width: 15%;"><div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                    @if($item->level != 1)
                                    <div class="btn-group btn-group-sm" style="float: none;">
                                        <a href="{{ Route('system.quote.getEditQuote',$item->id) }}"><button type="button" data-toggle="modal" data-target="#modalEditUser" data-id="{{$item->id}}" class="btn-edit tabledit-edit-button btn btn-sm btn-light" style="float: none; margin: 5px;"><span class="ti-pencil"></span></button></a>
                                        <button type="button" data-id="{{$item->id}}" class="btn-delete tabledit-delete-button btn btn-sm btn-light" style="float: none; margin: 5px;"><span class="ti-trash text-danger"></span></button></div>
                                    </div>
                                    @endif
                                    </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$quote->links()}}
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