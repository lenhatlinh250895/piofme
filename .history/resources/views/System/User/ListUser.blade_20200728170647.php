@extends('System.Layouts.Master')
@section('title')
	List User
@endsection
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">USER</h4>
            </div>
        </div>
    </div>
    <div class="row">
		<div class="col-12">
			<div class="card m-b-30">
				<div class="card-header p-3 m-0 text-center">
					<h5 class="card-title m-0 text-uppercase text-left ml-2">
						ADD USER
					</h5>
				</div>
				<div class="card-body">
					<form action="{{ route('system.admin.slide.postSlide') }}" method="post"  enctype="multipart/form-data">
						@csrf
						<div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input name="name" class="form-control" type="text" id="example-text-input" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input name="email" class="form-control" type="email" id="example-text-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input name="password" class="form-control" type="password" id="example-text-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Password Confirm</label>
                            <div class="col-sm-10">
                                <input name="passwordAgain" class="form-control" type="password" id="example-text-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Level</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="level">
                                    <option value="0">Manager</option>
                                </select>
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
						LIST USER
					</h5>
				</div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table" id="my-table">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>LEVEL</th>
                                <th class="tabledit-toolbar-colitemn">ACTION</th></tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $item)
                                <tr id="1">
                                    <td><span class="tabledit-span tabledit-identifier">{{ $item->id }}</span><input class="tabledit-input tabledit-identifier" type="hidden" name="id" value="1" disabled=""></td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">{{ $item->name }}</span><input class="tabledit-input form-control input-sm" type="text" name="col1" value="John" style="display: none;" disabled=""></td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">{{ $item->email }}</span><input class="tabledit-input form-control input-sm" type="text" name="col1" value="Doe" style="display: none;" disabled=""></td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">{{ $item->level == 0 ? 'Manager' : '' }}     
                                    </span><input class="tabledit-input form-control input-sm" type="text" name="col3" value="john@example.com" style="display: none;" disabled="">
                                </td>
                                
                                <td style="white-space: nowrap; width: 15%;"><div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                @if($item->level != 1)
                                <div class="btn-group btn-group-sm" style="float: none;">
                                    <a href="{{ route('system.admin.user.getEditUser',['$la->locale','$item->id']) }}"><button type="button" class="tabledit-edit-button btn btn-sm btn-light" style="float: none; margin: 5px;"><span class="ti-pencil"></span></button></a>
                                    <a href="{{ route('system.admin.user.getDeleteUser',[$item->id]) }}"><button type="button" class="tabledit-delete-button btn btn-sm btn-light" style="float: none; margin: 5px;"><span class="ti-trash text-danger"></span></button></a></div>
                                </div>
                                @endif
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$user->links()}}
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div>
@endsection