<div class="input-group mb-1">
    <div class="input-group-prepend">
        <span class="input-group-text">
            <img src="{{ asset('admin/img/png/flag_' . $lang . '.png') }}" width="18px" alt="">
        </span>
        @isset($check)
            <span class="input-group-text">
                <input type="checkbox">
            </span>
        @endisset
    </div>

{{--    <input type="text" class="form-control" placeholder="Username" length="{{ $length ?? 150 }}">--}}

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
        placeholder="{{ $placeholder ?? trans('trans.enter_data') }}"
        length="{{ $length ?? 150 }}"
        @isset($max) max="{{ $max }}" @endisset
        @isset($min) min="{{ $min }}" @endisset

        @isset($datamask) data-mask="{{ $datamask }}" @endisset
        {{ isset($required) ? 'required' : '' }}
        {{ $other ?? null }}
        @isset($onkeyup) onkeyup="this.value = this.value.replace({{$onkeyup}}, '');" @endisset
    >
</div>

@php
    $label = null; $data = null; $lang = null; $type = null; $id = null; $class = null; $value = null; $pattern = null; $length = null; $placeholder = null; $required = null; $other = null;
@endphp
