<!DOCTYPE html>
<html lang="en">


@include('layouts.header')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ url('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60"
                width="60">
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
