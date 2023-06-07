@isset($label)
    <label for="{{ $data }}">
        @if(isset($lang) and $lang != false) <img src="{{ asset('admin/img/png/flag_' . $lang . '.png') }}" width="18px" alt="">  @endif
        {{ $label }}
        @isset($required)
            <span class="text-danger" data-tooltip="tooltip" data-html="true" title="Поле обязательно к заполнению">
                <i class="fas fa-exclamation-circle"></i>
            </span>
        @endisset
    </label>
@endisset
<input
    type="text"
    name="{{ $name ?? $data }}" id="{{ $id ?? $data }}"
    class="form-control DATAPICKER"
    value="{{ (isset($item) && isset($start) && $item->$start != null && isset($end) && $item->$end != null) ? $item->$start->format('d.m.Y') . ' - ' . $item->$end->format('d.m.Y') : null }}"
    @isset($required) required @endisset
>

@push('scripts')
    <script>
        //Date range picker
        $('.DATAPICKER').daterangepicker({
            autoUpdateInput: false,
            "showDropdowns": true,
            "minYear": 2000,
            "maxYear": @json((int) now()->format('Y')),
            ranges: {
                'Сегодня': [moment(), moment()],
                'Вчера': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Последние 7 дней': [moment().subtract(6, 'days'), moment()],
                'Последние 30 дней': [moment().subtract(29, 'days'), moment()],
                'Этот месяц': [moment().startOf('month'), moment().endOf('month')],
                'Предыдущий месяц': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                // 'Last 3 Month': [moment().subtract(3, 'month').startOf('month'), moment()]
            },
            locale: {
                format: "DD.MM.YYYY",
                separator: " - ",
                applyLabel: "Выбрать",
                cancelLabel: "Отменить",
                fromLabel: "От",
                toLabel: "До",
                daysOfWeek: ["Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
                monthNames: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Отябрь", "Ноябрь", "Декабрь"],
                firstDay: 1
            },
            "startDate": @json(((isset($item) && isset($start) && $item->$start != null) ? $item->$start : now()->addMonth(-1))->format('d.m.Y')),
            "endDate": @json(((isset($item) && isset($end) && $item->$end != null) ? $item->$end : now())->format('d.m.Y')),
            "minDate": "10/01/2010",
            "maxDate": @json(now()->format('d.m.Y')),
            "opens": "center"
        }, function(start, end, label) {
            console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
        });
        $('.DATAPICKER').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD.MM.YYYY') + ' - ' + picker.endDate.format('DD.MM.YYYY'));
        });
        $('.DATAPICKER').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    </script>
@endpush
