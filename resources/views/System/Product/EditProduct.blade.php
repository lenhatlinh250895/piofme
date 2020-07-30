@extends('System.Layouts.Master')
@section('title')
	Edit Product
@endsection
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">PRODUCT</h4>
            </div>
        </div>
    </div>
    <div class="row">
		<div class="col-12">
			<div class="card m-b-30">
				<div class="card-header p-3 m-0 text-center">
					<h5 class="card-title m-0 text-uppercase text-left ml-2">
						EDIT PRODUCT
					</h5>
				</div>
				<div class="card-body">
					<form action="{{ route('system.product.postEditProduct') }}" method="post"  enctype="multipart/form-data">
						@csrf
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input name="name" value="{{$product->name}}" class="form-control" type="text" id="example-text-input" require>
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
                                        <div class="col-md-6"><input id="thumbnail" name="image" value="{{$product->image}}" class="form-control" type="text"></div>
                                        <div class="col-md-6"><input name="alt_image" value="{{$product->alt}}" class="form-control" type="text" placeholder="Alt image"></div>
                                    </div>
								</div>
                                <img id="holder" src="{{$product->image}}" style="margin-top:15px;max-height:100px;">
							</div>
						</div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Content</label>
                            <div class="col-sm-10">
                            <textarea class="summernote-editor" name="content">{!!$product->content!!}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Summary Content</label>
                            <div class="col-sm-10">
                            <textarea name="summary_content" rows="10" cols="50">{!!$product->summary_content!!}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
							<label class="col-sm-2 col-form-label">Service</label>
							<div class="col-sm-10">
								<select class="form-control" name="service">
									@foreach($service as $ser)
									<option value="{{$ser->id}}"
									@if($ser->id == $product->service_id)
									selected
									@endif
									>{{$ser->title}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-10">
								<button type="submit" class="btn btn-info waves-effect waves-light">
									Save
								</button>
								<button type="button" onclick="cancel()" class="btn btn-danger waves-effect m-l-5">
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
@endsection
@section('script')
<script src="assets/plugins/summernote/summernote-bs4.min.js"></script>
<script src="vendor/laravel-filemanager/js/lfm.js?v={{ time() }}"></script>
<script src="assets/pages/form-summernote.init.js?v={{ time() }}"></script>
<script src="assets/js/summernote.js?v={{time()}}"></script>
<script>
	$('.lfm').filemanager('image');
	function cancel(){
		location.replace("{{asset('')}}system/product/list");
	}
</script>
@endsection