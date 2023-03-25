@isset($label)
    <label for="{{ $data }}">
        @if(isset($lang) and $lang != false) <img src="{{ asset('admin/img/png/flag_' . $lang . '.png') }}" width="18px" alt="">  @endif
        {{ $label }}
        @isset($required)
            @include('admin._include.form._field_is_required')
        @endisset
    </label>
@endisset

<textarea name="{{ $data }}" id="{{ $data }}" style="min-height: 250px" @isset($required) required @endisset>{{ $item->$data ?? old($data) }}</textarea>

@once
    @push('scripts')
        <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    @endpush
@endonce

@push('scripts')
    <script>
        CKEDITOR.replace({{ $data }} , {
            allowedContent: true
        } );
    </script>
@endpush
