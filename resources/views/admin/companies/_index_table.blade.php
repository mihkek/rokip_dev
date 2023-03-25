<tr>
    <td class="text-center align-middle" style="width: 50px">
        {{ $item->id }}
    </td>
    <td class="text-center align-middle" style="width: 150px">
        {!! $item->code_status() !!}

        <a href="{{ route('admin.companies.edit', $item) }}" class="text-primary" data-tooltip="tooltip"
            title="Редактировать">
            <i class="far fa-edit"></i>
        </a>
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
        {{ $item->shipped }}
    </td>
    <td class="text-center align-middle">
        {{ $item->installed }}
    </td>
    <td class="text-center align-middle">
        {{ $item->breakdowns }}
    </td>
    <td class="text-center align-middle">
        {{ $item->remains }}
    </td>
    <td class="text-center align-middle">
        <a href="{{ route('admin.file_equipments.index', ['company' => $item->id]) }}">
            {{ $item->files_count }}
        </a>
    </td>
    <td class="text-center align-middle">
        {{ $item->equipments_count }}
    </td>
    <td class="text-center align-middle">
        {!! $item->datetime_format() !!}
    </td>
</tr>
