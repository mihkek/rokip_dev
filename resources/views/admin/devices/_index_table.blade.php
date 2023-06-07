<tr>
    <td class="text-center align-middle" style="width: 50px">
        {{ $item->id }}
    </td>
    <td class="text-center align-middle" style="width: 150px">
        {!! $item->code_status() !!}

        <a href="{{ route('admin.devices.edit',$item) }}" class="text-primary" data-tooltip="tooltip" title="Редактировать">
            <i class="far fa-edit"></i>
        </a>
    </td>
    <td class="align-middle">
        {{ $item->consumer->title }}<br>
        {{ $item->address }}
    </td>
    <td class="align-middle">
        {{ $item->type->title }}
    </td>
    <td class="align-middle">
        <a href="{{ route('admin.users.edit',$item->master) }}" class="text-primary" data-tooltip="tooltip" title="Перейти к мастеру">
            {{ $item->master->fio() }}
        </a>
    </td>

    <td class="align-middle">
        <b>{{ $item->title }}</b>
        <br>
        {{ $item->year_issue }}
        <br>
        {{ $item->modification }}
        <br>
        {!! $item->description !!}
    </td>
    <td class="text-center align-middle">
        {!! $item->datetime_format() !!}
    </td>
</tr>
