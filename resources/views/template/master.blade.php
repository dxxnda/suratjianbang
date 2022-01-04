<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    @include('template.header')
</head>

<body>
    <div class="container-scroller">
        @include('template.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('template.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                    @include('template.footer')
                </div>
            </div>
        </div>
    </div>
</body>

</html>
