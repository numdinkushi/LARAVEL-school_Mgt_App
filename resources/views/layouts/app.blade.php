<!DOCTYPE html>
<html lang="en">


@include('layouts.header')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake animation_pulse" src="{{ url('dist/img/SMS_logo.jpg') }}" alt="AdminLTELogo" height="150"
                width="150">
        </div>

        @include('layouts.navbar')

        @include('layouts.sidebar')

        @yield('content')

        @include('layouts/footer')

    </div>
    <!-- ./wrapper -->
    @include('layouts.scripts')
</body>

</html>
