@for($i = 2; $i < $loop->depth; $i++)
    &ndash;
@endfor

@if($this_category->categories->count() > 0)
    <a href="{{ route('admin.categories.index',$this_category->id) }}" data-tooltip="tooltip" data-html="true" title="Перейти">
        {{ $this_category->lang() }}<br>
    </a>
@else
    {{ $this_category->lang() }}<br>
@endif

@if($this_category->categories)
    @foreach ($this_category->categories as $this_category)
        @include('admin.entities.categories._category_tree_title')
    @endforeach
@endif
