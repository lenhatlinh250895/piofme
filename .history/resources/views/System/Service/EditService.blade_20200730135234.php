@extends('System.Layouts.Master')
@section('title')
	Edit Service
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
    <div class="row">
		<div class="col-12">
			<div class="card m-b-30">
				<div class="card-header p-3 m-0 text-center">
					<h5 class="card-title m-0 text-uppercase text-left ml-2">
						EDIT SERVICE
					</h5>
				</div>
				<div class="card-body">
					<form action="{{ route('system.service.postEditService') }}" method="post"  enctype="multipart/form-data">
						@csrf
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input name="title" value="{{$service->title}}" class="form-control" type="text" id="example-text-input" require>
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
                                        <div class="col-md-6"><input id="thumbnail" name="image" value="{{$service->image}}" class="form-control" type="text"></div>
                                        <div class="col-md-6"><input name="alt_image" value="{{$service->alt}}" class="form-control" type="text" placeholder="Alt image"></div>
                                    </div>
								</div>
							</div>
						</div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Introduce</label>
                            <div class="col-sm-10">
                            <textarea class="summernote-editor" name="introduce">{{$service->introduce}}</textarea>
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
						LIST SERVICE
					</h5>
				</div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table" id="my-table">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>IMAGE</th>
                                <th>ALT</th>
                                <th>INTRODUCE</th>
                                <th>STATUS</th>
                                <th class="tabledit-toolbar-colitemn">ACTION</th></tr>
                            </thead>
                            <tbody>
                                @foreach ($service as $item)
                                <tr id="id_{{$item->id}}">
                                    <td><span class="tabledit-span tabledit-identifier">{{ $item->id }}</span><input class="tabledit-input tabledit-identifier" type="hidden" name="id" value="1" disabled=""></td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span"><img src="{{ $item->image }}" height="50" width="100" alt=""></span><input class="tabledit-input form-control input-sm" type="text" name="col1" value="John" style="display: none;" disabled=""></td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">{{ $item->alt }}</span><input class="tabledit-input form-control input-sm" type="text" name="col1" value="Doe" style="display: none;" disabled=""></td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">{!! $item->introduce !!}     
                                    </span><input class="tabledit-input form-control input-sm" type="text" name="col3" value="john@example.com" style="display: none;" disabled="">
                                    </td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">{{ $item->status }}</span><input class="tabledit-input form-control input-sm" type="text" name="col1" value="John" style="display: none;" disabled=""></td>
                                    <td style="white-space: nowrap; width: 15%;"><div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                    @if($item->level != 1)
                                    <div class="btn-group btn-group-sm" style="float: none;">
                                        <button type="button" data-toggle="modal" data-target="#modalEditUser" data-id="{{$item->id}}" class="btn-edit tabledit-edit-button btn btn-sm btn-light" style="float: none; margin: 5px;"><span class="ti-pencil"></span></button>
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