<tr>
    <td class="text-center align-middle" style="width: 50px">
        {{ $loop->iteration }}
    </td>
    <td class="text-center align-middle" style="width: 50px">
        {{ $item->id }}
    </td>
    <td class="text-center align-middle" style="width: 150px">
        {!! $item->code_status() !!}

        <a href="{{ route('admin.categories.edit',$item) }}" class="text-primary mx-2" data-tooltip="tooltip" title="{!! trans('trans.edit') !!}">
            <i class="far fa-edit"></i>
        </a>
    </td>
    <td>
        @if($item->category_id != null)
            @include('admin.entities.categories._category_base_title',['this_category'=>$item->category,'index'=>0])
        @endif
    </td>
    <td>
        @foreach($langs as $lang)
            @php
                $title = 'title_' . $lang->key;
            @endphp
            <div class="row">
                <div class="col-auto">
                    <img src="{{ asset('admin/img/png/flag_' . $lang->key . '.png') }}" width="18px" alt="">
                </div>
                <div class="col">
                    @if($item->categories_count)
                        <a href="{{ route('admin.categories.index',['category'=>$item->id]) }}" data-tooltip="tooltip" data-html="true" title="Перейти">
                            {{ $item->$title }}
                        </a>
                    @else
                        {{ $item->$title }}
                    @endif
                </div>
            </div>
        @endforeach
    </td>
    <td>
        @foreach($item->categories as $this_category)
            @include('admin.entities.categories._category_tree_title')
        @endforeach
    </td>
</tr>
