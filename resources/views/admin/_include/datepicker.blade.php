<script>
    $(function($) {
        $('.datepicker').daterangepicker({
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
            "startDate": @json(((isset($_GET['filter_ats']) && $_GET['filter_ats'] != null) ? Carbon::createFromFormat('d.m.Y', Str::before($_GET['filter_ats'], ' - ')) : now()->addMonth(-1))->format('d.m.Y')),
            "endDate": @json(((isset($_GET['filter_ats']) && $_GET['filter_ats'] != null) ? Carbon::createFromFormat('d.m.Y', Str::after($_GET['filter_ats'], ' - ')) : now())->format('d.m.Y')),
            "minDate": "10/01/2010",
            "maxDate": @json(now()->format('d.m.Y')),
            "opens": "center"
        }, function(start, end, label) {
            console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
        });
        $('.datepicker').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD.MM.YYYY') + ' - ' + picker.endDate.format('DD.MM.YYYY'));
        });
        $('.datepicker').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    });
</script>
