@isset($label)
    <label for="{{ $data }}">
        @if(isset($lang) and $lang != false) <img src="{{ asset('admin/img/png/flag_' . $lang . '.png') }}" width="18px" alt="">  @endif
        {{ $label }}
        @isset($required)
            @include('admin._include.form._field_is_required')
        @endisset
    </label>
@endisset

<input
    type="{{ $type ?? 'text' }}"
    id="{{ $id ?? $data }}"
    name="{{ $name ?? $data }}"
    class="{{ $class ?? 'form-control' }}"
    @isset($value)
        value="{{ $value }}"
    @else
        value="{{ (isset($type) and isset($item) and $type == 'date')
                        ? (isset($request) ? $request->$data : $item->$data->format('Y-m-d'))
                        : (isset($request) ? $request->$data : ($item->$data ?? old($data))) }}"
    @endisset
    pattern="{{ $pattern ?? (($length ?? 150) ? '[\D\d\s]{2,' . ($length ?? 150) . '}' : '[\D\d\s]{2,190}') }}"
    placeholder="{{ $placeholder ?? 'Введите данные' }}"
    length="{{ $length ?? 150 }}"
    @isset($max) max="{{ $max }}" @endisset
    @isset($min) min="{{ $min }}" @endisset

    @isset($datamask) data-mask="{{ $datamask }}" @endisset
    @isset($required) required @endisset
    {{ $other ?? null }}
    @isset($onkeyup) onkeyup="this.value = this.value.replace({{$onkeyup}}, '');" @endisset
>

@php
  $label = null; $data = null; $lang = null; $type = null; $id = null; $class = null; $value = null; $pattern = null; $length = null; $placeholder = null; $required = null; $other = null;
@endphp
