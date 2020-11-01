<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>
<body>
    <div class="app">

        <!-- header -->
        <div class="header">
            @include('layouts.header')
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
                        @include('layouts.sidebar')
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>
