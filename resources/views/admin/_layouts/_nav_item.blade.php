@php
    $is = (isset($sub) and $sub != null)
            ? 'admin.' . $route . '.' . $sub
            : 'admin.' . $route . '.*';
    $route = (isset($sub) and $sub != null)
        ? 'admin.' . $route . '.' . $sub
        : 'admin.' . $route . '.index';
@endphp

<li class="nav-item">
    <a href="{{ isset($get) ? route($route,$get) : route($route) }}" class="nav-link {{ isset($color) ? ('text-' . $color) : '' }} @if(Route::is($is)) active @endif">
        {!! Str::replace('class="', 'class="nav-icon ', ($icon ?? '<i class="far fa-dot-circle"></i>')) !!}
        <p>{{ $title }}</p>
        @if(isset($span) and $span > 0)<span class="right badge badge-danger">{{ $span }}</span>@endif
    </a>
</li>
