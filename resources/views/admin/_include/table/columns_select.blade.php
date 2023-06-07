<div>
    <b>Отображаемые поля:</b><br>
    @foreach($columns as $col)
        @if($loop->iteration > 3)
            <a class="btn mr-2 @if(isset($_COOKIE[($marker ?? null) . '_' . Auth::id() . '_' . $loop->index])) btn-default @else btn-outline-primary font-weight-bold @endif BTN_COLOR toggle-vis"
               data-column="{{ $loop->index }}">
                {!! Str::limit(Str::replace('<br>', ' ', $col), 20, '...') !!}
            </a>
        @endif
    @endforeach
</div>
<br>

@push('styles')
    <style>
        .DISPLAY_NONE
        {
            display: none;
        }
    </style>
@endpush

@push('scripts')
    <script>
        let marker = @json($marker ?? null);
        let user_id = @json(Auth::id() ?? 1);

        document.addEventListener("click", (e) => {
            if (e.target.classList.contains('BTN_COLOR'))
            {
                let index = e.target.getAttribute('data-column');
                const BTN = e.target;
                let class_and_cookie = marker + '_' + user_id + '_' + index;

                if (BTN.classList.contains('btn-default'))
                {
                    deleteCookie(class_and_cookie);
                    $('.' + class_and_cookie).removeClass('DISPLAY_NONE');
                    BTN.classList.remove('btn-default');
                    BTN.classList.add('btn-outline-primary');
                }
                else if (BTN.classList.contains('btn-outline-primary'))
                {
                    setCookie(class_and_cookie);
                    $('.' + class_and_cookie).addClass('DISPLAY_NONE');
                    BTN.classList.remove('btn-outline-primary');
                    BTN.classList.add('btn-default');
                }
            }
        });
        //END отображение колонок

        function setCookie(name) {
            document.cookie = name + "="+ 1 +"; path=/; max-age=2592000";
        }

        function deleteCookie(name) {
            document.cookie = name + "="+ 1 +"; path=/; max-age=-1";
        }
    </script>
@endpush
