@extends('System.Layouts.Master')
@section('title')
CONTACT
@endsection
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">CONTACT</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-header p-3 m-0 text-center">
                    <h5 class="card-title m-0 text-uppercase text-left ml-2">
                        CONTACT
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
                                    <th>QUESTION</th>
                                    <th>STATUS</th>
                                    <th class="tabledit-toolbar-colitemn">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contact as $item)
                                <tr id="id_{{$item->id}}">
                                    <td><span class="tabledit-span tabledit-identifier">{{ $item->id }}</span></td>
                                    <td><span class="tabledit-span tabledit-identifier">{{ $item->name }}</span></td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">{!! $item->email !!}
                                        </span>
                                    </td>
                                    <td class="tabledit-view-mode"><span
                                            class="tabledit-span">{{ $item->question }}</span></td>
                                    <td class="tabledit-view-mode"><span
                                            class="tabledit-span">{{ $item->status }}</span></td>
                                    <td style="white-space: nowrap; width: 15%;">
                                        <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                            @if($item->level != 1)
                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                <a href="{{ Route('system.contact.getEditContact',$item->id) }}"><button
                                                        type="button" data-toggle="modal" data-target="#modalEditUser"
                                                        data-id="{{$item->id}}"
                                                        class="btn-edit tabledit-edit-button btn btn-sm btn-light"
                                                        style="float: none; margin: 5px;"><span
                                                            class="ti-pencil"></span></button></a>
                                                <button type="button" data-id="{{$item->id}}"
                                                    class="btn-delete tabledit-delete-button btn btn-sm btn-light"
                                                    style="float: none; margin: 5px;"><span
                                                        class="ti-trash text-danger"></span></button></div>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$contact->links()}}
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
                    url: "{{ route('system.contact.getDeleteContact')}}",
                    data: {_token: token, id: id},
                    success: function($result){
                        console.log($result);
                        if($result){
                            toastr.success('Delete information quote successfully!', 'Success!', {timeOut: 3500});
                            $('#id_'+id).hide();
                        }else{
                            toastr.error('Delete information quote error!', 'Error!', {timeOut: 3500});
                        }
                    },
                });
            }
        })
    })
</script>
@endsection