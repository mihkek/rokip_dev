<tr>
    <td class="text-center align-middle" style="width: 50px">
        {{ $item->id }}
    </td>
    <td class="text-center align-middle" style="width: 150px; cursor: pointer">
        {!! $item->code_status() !!}

        <a href="{{ route('admin.masters.edit', $item) }}" class="text-primary" data-tooltip="tooltip"
            title="Редактировать">
            <i class="far fa-edit"></i>
        </a>
        <a onclick="modalDeleteConfirm('{{ $item->id }}')" class="text-danger" data-tooltip="tooltip"
            title="Удалить">
            <i class="fa fa-trash"></i>
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
    <td class="align-middle">
        {{ $item->company->name }}
    </td>
    <td class="align-middle">

    </td>
    <td class="text-center align-middle">
        {!! $item->datetime_format() !!}
    </td>
</tr>
