<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Login | PIOFME</title>
        <meta content="VSET GROUP" name="description" />
        <meta content="VSET GROUP" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <base href="{{asset('')}}">
        <link rel="shortcut icon" href="">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/plugins/animate/animate.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

    </head>
    <body class="fixed-left">
        <div id="stars"></div>
        <div id="stars2"></div>
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center mt-0">
                        <a href="index.html" class="logo logo-admin"><img src=""></a>
                    </h3>                   
                        <form class="form-horizontal" action="{{route('postLogin')}}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" name="email" type="email" required="" placeholder="Username" value="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" name="password" type="password" required="" placeholder="Password" value="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember me</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-danger btn-block waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <!-- App js -->
        <script src="assets/js/app.js"></script>
        <script>
            $(document).ready(function(){
                @if(Session::get('flash_level') == 'success')
                    toastr.success('{{ Session::get('flash_message') }}', 'Success!', {timeOut: 3500})
                @elseif(Session::get('flash_level') == 'error')
                    toastr.error('{{ Session::get('flash_message') }}', 'Error!', {timeOut: 3500})
                @endif

                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        toastr.error('{{$error}}', 'Error!', {timeOut: 3500})
                    @endforeach
                @endif
            })
        </script>

    </body>
</html>