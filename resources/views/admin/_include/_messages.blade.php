@if($errors->any() or session('success') or session('primary') or session('error'))
    @php
        if(session('success'))
        {
            $color = 'success';
        }
        elseif(session('primary'))
        {
            $color = 'primary';
        }
        elseif($errors->any() or session('error'))
        {
            $color = 'danger';
        }
    @endphp

    <div class="alert alert-default-{{ $color }} my-0">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="ml-3" aria-hidden="true">&times;</span>
        </button>

        @if(session('success'))
            {!! session()->get('success') !!}
        @elseif(session('primary'))
            {!! session()->get('primary') !!}
        @elseif(session('error'))
            {!! session()->get('error') !!}
        @elseif($errors->any())
            <ul>
                @forelse($errors->all() as $error)
                    <li>{{ $error }}</li>
                @empty
                    <li>{!! session()->get('error') !!}</li>
                @endforelse
            </ul>
        @endif
    </div>
@endif
