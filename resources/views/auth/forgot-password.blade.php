<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kush SMA | Forgot Password</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('../../plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ url('../../plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('../../dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h3"><b>SMA </b>Forgot Password</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Please provide your email.</p>

                @include('_message')

                <form action="{{ route('forgot-password-post') }}" method="post">
                    {{ csrf_field() }}

                    <div class="input-group mb-3">
                        <input type="email" class="form-control" required name="email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <!-- /.col -->
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-8">
                            <button type="submit" class="btn btn-primary btn-block">New Password</button>
                        </div>
                        <div class="col-4">
                            <button type="button" class="btn btn-secondary btn-block ">   <a href="{{ route('login.page') }}" class="text-white">Login</a></button>
                        </div>
                    </div>
                    <!-- /.col -->
            </div>
            </form>


        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ url('../../plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('../../plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('../../dist/js/adminlte.min.js') }}"></script>
</body>

</html>
