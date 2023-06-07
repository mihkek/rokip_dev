<tr>
    {{-- style="max-width: 400px; overflow-x:scroll" --}}
    <td class="text-center align-middle" style="width: 50px">
        {{ $item->id }}
    </td>
    <td class="text-center align-middle" style="width: 150px">
        {!! $item->code_status() !!}

        <a href="{{ route('admin.equipments.edit', $item) }}" class="text-primary" data-tooltip="tooltip"
            title="Редактировать">
            <i class="far fa-edit"></i>
        </a>
        <a target="_blank" href="{{ route('admin.equipments.photo', $item->id) }}" class="text-success"
            data-tooltip="tooltip" title="Фото оборудования">
            {{-- <i class="fa-regular fa-images"></i> --}}
            <i class="far fa-image"></i>
        </a>
    </td>
    <td class="align-middle">
        {{ $item->shipment_number }}
    </td>
    <td class="align-middle">
        {{ $item->factory_number }}
    </td>
    <td class="align-middle">
        {{ $item->modification }}
    </td>
    <td class="align-middle">
        {{ $item->current }}
    </td>
    <td class="align-middle">
        {{ $item->voltage }}
    </td>

    <td class="align-middle">
        {{ $item->company->name }}
    </td>



    <td class="align-middle">
        {{ $item->installation_adress }}

    </td>
    <td class="align-middle">
        {{ $item->lat }}

    </td>
    <td class="align-middle">
        {{ $item->lon }}

    </td>

    <td class="align-middle">

        {{-- @if (Str::length($item->consumer_info) > 30) --}}
        {{ $item->short_consumer_info }}
        <div class="text-primary" style="cursor: pointer;" onclick="showModal( '{{ $item->consumer_info }}')">
            {{ $item->hint_consumer }}
        </div>
        {{-- @else
            {{ $item->consumer_info }}
        @endif --}}

    </td>

    <td class="align-middle">



        {{-- @if (Str::length($item->additional_data) > 30) --}}
        {{ $item->short_additional_data }}
        <div class="text-primary" onclick="showModal( '{{ $item->additional_data }}')" style="cursor: pointer;">
            {{ $item->hint_additional }}
        </div>
        {{-- @else
            {{ $item->additional_data }}
        @endif --}}
    </td>

    <td class="text-center align-middle">
        {!! $item->datetime_format() !!}
    </td>
</tr>
