@php
    $is_true = isset($_GET[$name]) && $_GET[$name] != null;
@endphp
<div class="row {{ $bg ?? null }}">
    <div class="col-md-4 align-middle text-truncate">
{{--        <span class="ml-1 mr-2 mt-3">--}}
{{--            <i class="fas fa-eye-slash"></i>--}}
{{--        </span>--}}
        <span class="@if($is_true) text-danger font-weight-bold @endif mt-3">
            {{ $title }}
        </span>
    </div>
    <div class="col">
        <div class="row">
            <div class="col">
                <input type="text" name="{{ $name }}" id="{{ $name }}" class="form-control DATAPICKER" value="{{ $_GET[$name] ?? null }}">
            </div>
{{--            <div class="col-auto align-middle">--}}
{{--                <div class="form-group clearfix mt-2 mb-0">--}}
{{--                    <div class="icheck-primary d-inline" data-tooltip="tooltip" data-html="true" title="Сортировать по убываю">--}}
{{--                        <input type="radio" id="{{ $name }}_down" name="sort" value="{{ $name }}_down" @if(isset($_GET['sort']) && $_GET['sort'] == $name . '_down') checked @endif>--}}
{{--                        <label for="{{ $name }}_down">--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                    <span class="mr-2">--}}
{{--                        <i class="fas fa-long-arrow-alt-down"></i>--}}
{{--                        <i class="fas fa-long-arrow-alt-up"></i>--}}
{{--                    </span>--}}
{{--                    <div class="icheck-primary d-inline" data-tooltip="tooltip" data-html="true" title="Сортировать по возрастанию">--}}
{{--                        <input type="radio" id="{{ $name }}_up" name="sort" value="{{ $name }}_up" @if(isset($_GET['sort']) && $_GET['sort'] == $name . '_up') checked @endif>--}}
{{--                        <label for="{{ $name }}_up">--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
@php
    unset($key);
@endphp

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
            "startDate": @json(((isset($_GET[$name]) && $_GET[$name] != null) ? Carbon::createFromFormat('d.m.Y', Str::before($_GET[$name], ' - ')) : now()->addMonth(-1))->format('d.m.Y')),
            "endDate": @json(((isset($_GET[$name]) && $_GET[$name] != null) ? Carbon::createFromFormat('d.m.Y', Str::after($_GET[$name], ' - ')) : now())->format('d.m.Y')),
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
