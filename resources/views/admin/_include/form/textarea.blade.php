<div class="form-group">
    <label for="{{ $data }}">
        @if(isset($lang) and $lang != false) <img src="{{ asset('admin/img/png/flag_' . $lang . '.png')  }}" width="18px" alt="">  @endif
        {{ $label }}
        @isset($required)
            @include('admin._include.form._field_is_required')
        @endisset
    </label>
    <textarea class="form-control" name="{{ $data }}" length="{{ $length ?? 2500 }}" pattern="{{ $pattern ?? (($length ?? 2500) ? '[\D\d\s]{2,' . ($length ?? 2500) . '}' : '[\D\d\s]{2,2500}') }}" id="{{ $id ?? $data }}" {{ isset($required) ? 'required' : null }}>@isset($item){{ $item->$data }}@endisset</textarea>
</div>

@if(isset($ckeditor) && $ckeditor === true)
    @push('scripts')
        @once
            <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
            <script src="{{ asset('plugins/ckfinder/ckfinder.js') }}"></script>
        @endonce
        <script>
            CKEDITOR.replace( @json( $id ?? $data ) , {
                allowedContent: true
            } );
        </script>
    @endpush
@endif

@php
    $label = null; $data = null; $lang = null; $type = null; $id = null; $class = null; $value = null; $pattern = null; $length = null; $placeholder = null; $required = null; $other = null;
@endphp
