<tr>
    <td class="text-center align-middle" style="width: 50px">
        {{ $loop->iteration }}
    </td>
    <td class="text-center align-middle" style="width: 50px">
        {{ $item->id }}
    </td>
    <td class="text-center align-middle" style="width: 150px">
        {!! $item->code_status() !!}
        <br>
        <a class="text-primary mx-2" data-toggle="modal" data-target="#modal_{{ $item->id }}_credit" data-tooltip="tooltip" title="{!! trans('trans.edit') !!}">
            <i class="far fa-edit"></i>
        </a>
        @include('admin.entities.providers._credit_modal')
    </td>
    <td>
        {{ $item->title_ru ?? '--' }}
    </td>
    <td>
        {{ $item->title_ua ?? '--' }}
    </td>
    <td>
        {{ $item->title_en ?? '--' }}
    </td>
</tr>
