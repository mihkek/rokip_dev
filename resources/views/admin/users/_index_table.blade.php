<tr>
    <td class="text-center align-middle" style="width: 50px">
        {{ $item->id }}
    </td>
    <td class="text-center align-middle" style="width: 150px">
        {!! $item->code_status() !!}

        <a href="{{ route('admin.users.edit',$item) }}" class="text-primary" data-tooltip="tooltip" title="Редактировать">
            <i class="far fa-edit"></i>
        </a>
    </td>
    <td class="align-middle">
        {{ Arr::join($item->getRoleNames()->toArray(), ', ') }}
    </td>
    <td class="align-middle">
        {{ $item->name }}
    </td>

    <td class="align-middle">
        {{ $item->email }}
    </td>
    <td class="align-middle">
        {{ $item->phone }}
    </td>

    <td class="text-center align-middle">
        {!! $item->datetime_format() !!}
    </td>
</tr>
