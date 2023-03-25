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
        <a href="{{ route('admin.equipments.index', ['company_id' => $item->id]) }}">
            {{ $item->shipped }}
        </a>
    </td>
    <td class="text-center align-middle">
        <a href="{{ route('admin.equipments.index', ['company_id' => $item->id, 'status' => 8]) }}">
            {{ $item->installed }}
        </a>
    </td>
    <td class="text-center align-middle">
        <a href="{{ route('admin.equipments.index', ['company_id' => $item->id, 'status' => 9]) }}">
            {{ $item->installed }}
        </a>
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
        <a class="btn btn-sm btn-block btn-primary mb-2"
            href="{{ route('admin.masters.index', ['company_id' => $item->id]) }}">Список</a>
        <a class="btn btn-sm btn-block btn-success mb-2"
            href="{{ route('admin.masters.create', ['company_id' => $item->id]) }}">Добавить</a>
    </td>
    <td class="text-center align-middle">
        {!! $item->datetime_format() !!}
    </td>
</tr>
