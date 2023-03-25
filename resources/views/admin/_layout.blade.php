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
