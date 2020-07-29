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
					<form action="{{ route('system.user.postAddUser') }}" method="post"  enctype="multipart/form-data">
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
                                    <button type="button" data-toggle="modal" data-target="#modalEditUser" data-id="{{$item->id}}" class="btn-edit tabledit-edit-button btn btn-sm btn-light" style="float: none; margin: 5px;"><span class="ti-pencil"></span></button>
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
    <div class="modal fade bs-example-modal-lg" id="modalEditUser" tabindex="-1" role="dialog"
  aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title mt-0">Edit user</h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
        <form method="POST" class="formCreate" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="form-group">
                <label>Name</label>
                <input class="form-control inp-name" name="name" type="text " value="" id="example-text-input"
                    placeholder="Name">
                </div>
            </div>
            <div class="col-md-12 col-lg-6 ">
                <div class="form-group">
                <label>Email</label>
                <input class="form-control inp-email" name="email" type="email " value="" id="example-text-input"
                    placeholder="Email">
                </div>
            </div>
            <div class="col-md-12 col-lg-6 ">
                <div class="form-group">
                <label>Password</label>
                <input class="form-control" name="password" type="password " value="" id="example-text-input"
                    placeholder="New password">
                </div>
            </div><div class="col-md-12 col-lg-6 ">
                <div class="form-group">
                <label>Password Confirm</label>
                <input class="form-control" name="passwordconfirm" type="password " value="" id="example-text-input"
                    placeholder="New password confirm">
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="form-group">
                <label>Level</label>
                    <select class="form-control inp-level" name="productTypeChild" data-live-search="true">
                        <option value="0">Member</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group text-right">
                    <button class="btn-submit btn btn-success waves-light waves">Submit</button>
                    <button class="btn btn-danger waves-light waves" data-dismiss="modal">Cancer</button>
                </div>
            </div>
        </form>
        </div>
    </div><!-- /.modal-content -->
    </div>
    </div>
</div>
@endsection
@section('script')
<script>
    var token = '{{ csrf_token() }}';
    $('.btn-edit').on('click', function(){
        var id = $(this).data('id');
        $.ajax({
            type: 'POST',
            url: "{{ route('system.user.postAjax')}}",
            data: {_token: token, id: id},
            dataType: 'JSON',
            success: function($result){
                console.log($result);
                console.log($result['id']);
                $('.inp-name').val($result['name']);
                $('.inp-email').val($result['email']);
                var html = '';
                if($result['level'] == 0){
                    html += '<option value="0" selected>Member</option>';
                }
                $('.inp-level').html(html);
            },
        });
    })

    $('.btn-submit').on('click', function(){
        var name = $('.inp-name').val();
        alert(name);
    })
</script>
@endsection