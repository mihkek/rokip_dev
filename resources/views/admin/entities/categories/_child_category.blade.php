@php
    $selected = (isset($item) && $category->id == $item->category_id)
        ? 'selected'
        : '';
    $disabled = (isset($item) && $category->id == $item->id)
        ? 'disabled'
        : '';
@endphp

<option value="{{ $category->id }}" {{ $selected }} {{ $disabled }}>
    @for($i = 1; $i < $loop->depth; $i++)
        &ndash;
    @endfor
    {{ $category->lang() }}
</option>
@if ($category->categories)
    @foreach ($category->categories as $category)
        @include('admin.entities.categories._child_category')
    @endforeach
@endif
