<tr>
    <td class="text-center align-middle" style="width: 50px">
        {{ $loop->iteration }}
    </td>
    <td>
        @php
            if($item->subject_type == 'App\\Models\\Counterparty')
	            $route = 'admin.counterparties.edit';
            elseif ($item->subject_type == 'App\\Models\\Ad')
	            $route = 'admin.ads.edit';
        @endphp
        <a href="{{ route($route,$item->subject) }}" target="_blank">
            {{ $item->subject_type }}<br>
            {{ $item->subject_id }}
        </a>
    </td>
    <td>
        {{ $item->user->name }}
    </td>
    <td>
        @foreach($item->diff_log() as $diff)
            {!! $diff !!}
            @if(!$loop->last)
                <hr class="my-1">
            @endif
        @endforeach
    </td>

    <td class="text-center">
        {!! $item->datetime_format() !!}
    </td>
</tr>
