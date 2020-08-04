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
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="la->id" data-toggle="tab" href="#search" role="tab" aria-controls="home" aria-selected="true">SEARCH</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="la->id" data-toggle="tab" href="#add-user" role="tab" aria-controls="home" aria-selected="true">ADD USER</a>
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
                                    <label for="example-text-input" class="col-sm-2 col-form-label">id</label>
                                    <div class="col-sm-10">
                                        <input name="id_search" value="{{request()->input('id_search')}}" class="form-control" type="text" id="example-text-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input name="name_search" value="{{request()->input('name_search')}}" class="form-control" type="text" id="example-text-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input name="email_search" value="{{request()->input('email_search')}}" class="form-control" type="text" id="example-text-input">
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
        <div class="tab-pane fade in" id="add-user" role="tabpanel" aria-labelledby="1-tab">
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
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
        </div>
    </div>
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
                                <tr id="id_{{$item->id}}">
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
                                    <button type="button" data-id="{{$item->id}}" class="btn-delete tabledit-delete-button btn btn-sm btn-light" style="float: none; margin: 5px;"><span class="ti-trash text-danger"></span></button></div>
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
    </div> 
</div>

@endsection

@section('modal')
<div class="modal fade bs-example-modal-lg" id="modalEditUser" tabindex="-1" role="dialog"
  aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title mt-0">Edit user</h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
        <form id="formedit" class="formCreate" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" class="inp-id">
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
                <input class="form-control inp-email" name="email" readonly type="email " value="" id="example-text-input"
                    placeholder="Email">
                </div>
            </div>
            <div class="col-md-12 col-lg-6 ">
                <div class="form-group">
                <label>Password</label>
                <input class="form-control inp-password" name="password" type="password" value="" id="example-text-input"
                    placeholder="New password">
                </div>
            </div><div class="col-md-12 col-lg-6 ">
                <div class="form-group">
                <label>Password Confirm</label>
                <input class="form-control inp-password-confirm" name="passwordconfirm" type="password" value="" id="example-text-input"
                    placeholder="New password confirm">
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="form-group">
                <label>Level</label>
                    <select class="form-control inp-level" name="level" data-live-search="true">
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
</div>
@endsection
@section('script')
<script>
    var token = '{{ csrf_token() }}';
    $('.btn-edit').on('click', function(){
        var id = $(this).data('id');
        $.ajax({
            type: 'POST',
            url: "{{ route('system.user.postAjaxUser')}}",
            data: {_token: token, id: id},
            dataType: 'JSON',
            success: function($result){
                console.log($result);
                console.log($result['id']);
                $('.inp-id').val($result['id']);
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
        event.preventDefault();
        var error = [];
        if($('.inp-name').val() == ''){
            error.push('The name field is required');
        }
        if($('.inp-password').val() != ''){
            if($('.inp-password').val() != $('.inp-password-confirm').val()){
                error.push('The password again and password must match');
            }
        }
        if(error.length > 0){
            $.each(error, function (index, value) {
                toastr.error(value, 'Error!', {timeOut: 3500});
            });
            return;
        }
        console.log(error);
        var data = $('form#formedit').serialize();
        console.log(data);
        $.ajax({
            type: 'GET',
            url: "{{ route('system.user.postAjaxEditUser')}}",
            data: data,
            // dataType: 'JSON',
            success: function($result){
                if($result){
                    setTimeout(function(){
                        location.reload();
                        }, 2000);
                    $('#modalEditUser').modal('hide')
                    toastr.success('Update user successfully!', 'Success!', {timeOut: 3500});
                }else{
                    toastr.error('Update user error!', 'Error!', {timeOut: 3500});
                }
            },
        });
    })

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
                    url: "{{ route('system.user.getDeleteUser')}}",
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
