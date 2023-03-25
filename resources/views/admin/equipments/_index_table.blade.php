<tr>
    <td class="text-center align-middle" style="width: 50px">
        {{ $item->id }}
    </td>
    <td class="text-center align-middle" style="width: 150px">
        {!! $item->code_status() !!}

        <a href="{{ route('admin.equipments.edit', $item) }}" class="text-primary" data-tooltip="tooltip"
            title="Редактировать">
            <i class="far fa-edit"></i>
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
        {{ Str::limit($item->consumer_info, 60, '...') }}

        @if (Str::length($item->consumer_info) > 60)
            <div class="text-primary" style="cursor: pointer;" onclick="showFullText( '{{ $item->consumer_info }}')">
                Подробнее...
            </div>
        @endif

    </td>

    <td class="align-middle">

        {{ Str::limit($item->additional_data, 60, '...') }}

        @if (Str::length($item->consumer_info) > 60)
            <div class="text-primary" style="cursor: pointer;" onclick="showFullText( '{{ $item->additional_data }}')">
                Подробнее...
            </div>
        @endif
    </td>

    <td class="text-center align-middle">
        {!! $item->datetime_format() !!}
    </td>
</tr>

<script type="text/javascript">
    function showFullText(text) {
        alert(text)
    }
</script>
