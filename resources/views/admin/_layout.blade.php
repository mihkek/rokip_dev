<!DOCTYPE html>
<html lang="ru">

<head>
    @include('admin._layouts.metas')
    <title>admin</title>
    @include('admin._layouts.links')
    @stack('styles')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('admin._layouts.navbar')
        @include('admin._layouts.sidebar')

        @yield('content')

        @include('admin._layouts.footer')
    </div>
    @include('admin._layouts.scripts')
    @stack('scripts')
</body>

</html>


{{-- <style type="text/css">
    .gallery {
        display: inline-block;
        margin-top: 20px;
    }

    .close-icon {
        border-radius: 50%;
        position: absolute;
        right: 5px;
        top: -10px;
        padding: 5px 8px;
    }

    .form-image-upload {
        background: #e8e8e8 none repeat scroll 0 0;
        padding: 15px;
    }

    .big-table {
        overflow: auto;
        position: relative;
    }

    .big-table table {
        display: inline-block;
        vertical-align: top;
        max-width: 100%;
        overflow-x: auto;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }
</style> --}}
