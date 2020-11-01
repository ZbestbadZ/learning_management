<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.layouts.head')
</head>
<body>
    <div class="app">

        <!-- header -->
        <div class="header">
            @include('admin.layouts.header')
        </div>

        <div  class="container-fluid mt-5">
            <div class="row">

                <div class="leftcolumn">
                    <!-- main content -->
                    <div class="container" style="margin-left: 50px;">
                        @yield('content')
                    </div>
                </div>

                <div class="rightcolumn">
                    <!-- sidebar -->
                    <div>
                        @include('admin.layouts.sidebar')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $("div.alert").delay(1000).slideUp();
    </script>

</body>
</html>
