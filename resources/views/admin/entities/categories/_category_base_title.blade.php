@if($this_category->category)
    @include('admin.entities.categories._category_base_title',['this_category'=>$this_category->category,'index'=>$index++])

    @if($line ?? false)
        <span class="mx-3"><i class="fas fa-angle-double-right"></i></span>
    @else
        <br>
        @for($i = 0; $i < $index; $i++)
            &ndash;
        @endfor
    @endif
@endif

@if((isset($_GET['category']) && $_GET['category'] != $this_category->id) || (!isset($_GET['category']) && $this_category->categories->count() > 0))
    <a href="{{ route('admin.categories.index',['category'=>$this_category->id]) }}" data-tooltip="tooltip" data-html="true" title="Перейти">
        {{ $this_category->lang() }}
    </a>
@else
    {{ $this_category->lang() }}
@endif
