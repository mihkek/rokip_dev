<tr>
    <td class="text-center align-middle" style="width: 50px">
        {{ $item->id }}
    </td>
    <td class="text-center align-middle" style="width: 150px">
        {!! $item->code_status() !!}

        <a href="{{ route('admin.consumers.edit',$item) }}" class="text-primary" data-tooltip="tooltip" title="Редактировать">
            <i class="far fa-edit"></i>
        </a>
    </td>
    <td class="align-middle">
        {{ $item->title }}
    </td>
    <td class="align-middle">
        {{ $item->phone }}
    </td>

    <td class="align-middle">
        {{ $item->contract }}
    </td>
    <td class="align-middle">
        @foreach($item->fillings as $filling)
            {{ $filling->filling }}
            @if(!$loop->last)<br>@endif
        @endforeach
    </td>
    <td class="text-center align-middle">
        {!! $item->datetime_format() !!}
    </td>
</tr>
