<tfoot>
    <tr>
        @foreach($columns as $col)
            <th class="{{ isset($marker) ? Helper::is_select_column($marker, $loop->index) : null }} text-center align-middle w-auto">
                {!! $col !!}
            </th>
        @endforeach
    </tr>
</tfoot>
