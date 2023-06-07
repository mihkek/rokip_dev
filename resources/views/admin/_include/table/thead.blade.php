<thead>
    <tr>
        @foreach($columns as $col)
            <th class="{{ isset($marker) ? Helper::is_select_column($marker, $loop->index) : null }} text-center align-middle w-auto">
                {!! $col !!}
            </th>
        @endforeach
    </tr>
    <tr>
        @foreach($columns as $col)
            <th class="{{ isset($marker) ? Helper::is_select_column($marker, $loop->index) : null }} text-center align-middle w-auto" id="filter_col{{ $loop->iteration }}" data-column="{{ $loop->index }}">
                <input type="text" class="column_filter w-100" id="col{{ $loop->index }}_filter">
                <input type="radio" class="column_filter d-none" name="col{{ $loop->index }}" id="col{{ $loop->index }}_regex">
                <input type="radio" class="column_filter d-none" name="col{{ $loop->index }}" id="col{{ $loop->index }}_smart" checked="checked">
            </th>
        @endforeach
    </tr>
</thead>
