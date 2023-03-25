<tr>
    <td class="text-center align-middle" style="width: 50px">
        {{ $item->id }}
    </td>
    <td class="text-center align-middle" style="width: 150px">
        {!! $item->code_status() !!}

        <a href="{{ route('admin.brigades.edit',$item) }}" class="text-primary" data-tooltip="tooltip" title="Редактировать">
            <i class="far fa-edit"></i>
        </a>
    </td>
    <td class="align-middle">
        {{ $item->title }}
    </td>
    <td class="align-middle">
        <a href="{{ route('admin.companies.edit',$item->company) }}" class="text-primary" data-tooltip="tooltip" title="Перейти к компании">
            {{ $item->company->title }}
        </a>
    </td>
    <td class="align-middle">
        <a href="{{ route('admin.users.edit',$item->master) }}" class="text-primary font-weight-bold" data-tooltip="tooltip" title="Перейти к бригадиру">
            {{ $item->master->fio() }}
        </a>
        <hr>
        @foreach($item->masters as $master)
            <a href="{{ route('admin.users.edit',$master) }}" class="text-primary" data-tooltip="tooltip" title="Перейти к мастеру">
                {{ $master->fio() }}
            </a>
            <br>
        @endforeach
    </td>
    <td class="text-center align-middle">
        {!! $item->datetime_format() !!}
    </td>
</tr>
