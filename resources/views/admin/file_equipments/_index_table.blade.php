<tr>
    <td class="text-center align-middle" style="width: 50px">
        {{ $item->id }}
    </td>
    <td class="align-middle">
        {!! $item->user->name !!}
    </td>
    <td class="align-middle">
        {!! $item->company->name !!}
    </td>

    <td class="align-middle">
        <a href="{{ route('admin.file_equipments.show', $item) }}" class="text-primary mr-2" data-tooltip="tooltip" data-html="true" title="Подробнее">
            {{ $item->title }}
        </a>
    </td>
    <td class="align-middle align-middle">
        {{ $item->count }}
    </td>
    <td class="align-middle align-middle">
        {{ $item->count_double }}
    </td>

    <td class="text-center align-middle">
        {!! $item->datetime_format() !!}
    </td>
</tr>
