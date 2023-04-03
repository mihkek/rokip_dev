{{-- <style> --}}
{{--    .DISPLAY_NONE input --}}
{{--    { --}}
{{--        display: none; --}}
{{--    } --}}
{{-- </style> --}}
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"> --}}
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> --}}
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/searchbuilder/1.3.4/css/searchBuilder.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css"> --}}

<link rel="stylesheet" href="https://cdn.datatables.net/searchbuilder/1.3.4/css/searchBuilder.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">

<script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>
{{-- <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap4.min.js"></script> --}}
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/searchbuilder/1.3.4/js/dataTables.searchBuilder.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>


<script>
    function filterGlobal() {
        $('#example')
            .DataTable()
            .search($('#global_filter').val(), $('#global_regex').prop('checked'), $('#global_smart').prop('checked'))
            .draw();
    }

    function filterColumn(i) {
        $('#example')
            .DataTable()
            .column(i)
            .search(
                $('#col' + i + '_filter').val(),
                $('#col' + i + '_regex').prop('checked'),
                $('#col' + i + '_smart').prop('checked')
            )
            .draw();
    }

    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'PQlBfrtip',
            searchPanes: {
                cascadePanes: true,
                viewTotal: true
            },
            // buttons: [ 'colvis',//'searchBuilder'
            //            // {
            //            //     extend: 'searchBuilder',
            //            //     config: {
            //            //         depthLimit: 2
            //            //     }
            //            // }
            //        ],
            lengthMenu: [
                [100, 500, 1000, -1],
                [100, 500, 1000, 'All'],
            ],
            order: [
                [0, 'desc']
            ],
            autoWidth: false,
            // "serverSide": true,
            orderCellsTop: true,

            pagingType: "full_numbers", // добавляет ссылки на первую и последнюю страницы
            language: {
                lengthMenu: "Отображать _MENU_ на странице", // "Display _MENU_ records per page"
                zeroRecords: "Простите, ничего не найдено",
                info: "Страница _PAGE_ из _PAGES_", // Showing page _PAGE_ of _PAGES_
                infoEmpty: "Нет доступных записей",
                infoFiltered: "(отфильтровано из _MAX_ общих записей)",
                loadingRecords: "Загрузка...",
                processing: "Обработка...",
                search: "Поиск:",
                pageLength: "_MENU_",
                paginate: {
                    first: "<i class='fas fa-angle-double-left'></i>", // "<<",
                    last: "<i class='fas fa-angle-double-right'></i>", // ">>",
                    next: "<i class='fas fa-angle-right'></i>", // ">",
                    previous: "<i class='fas fa-angle-left'></i>", // "<",
                },
                buttons: {
                    colvis: 'Отображаемые колонки',
                },
                searchBuilder: {
                    button: 'Сложный поиск',
                    add: '<i class="fas fa-plus"></i> Сложный поиск',
                    condition: 'Компаратор',
                    clearAll: '<span class="text-danger" data-tooltip="tooltip" title="Сбросить поиск" style="width: 50px"><i class="far fa-times-circle"></i></span>', //'Сбросить',
                    delete: '<span class="text-danger" data-tooltip="tooltip" title="Удалить" style="width: 20px"><i class="far fa-trash-alt"></i></span>', //'Удалить',
                    deleteTitle: 'Delete Title',
                    data: 'Колонка',
                    left: '<i class="fas fa-angle-double-left"></i>',
                    leftTitle: 'Left Title',
                    logicAnd: 'и',
                    logicOr: 'или',
                    right: '<i class="fas fa-angle-double-right"></i>',
                    rightTitle: 'Right Title',
                    title: {
                        0: '',
                        _: 'Сложный поиск' //'Filters (%d)'
                    },
                    value: 'Значение',
                    valueJoiner: 'et',
                    conditions: {
                        date: {
                            before: 'перед',
                            after: 'после',
                            equals: 'равно',
                            not: 'не равно',
                            between: 'между',
                            notBetween: 'не между',
                            empty: 'пустой',
                            notEmpty: 'не пустой'
                        },
                        moment: {
                            before: 'перед',
                            after: 'после',
                            equals: 'равно',
                            not: 'не равно',
                            between: 'между',
                            notBetween: 'не между',
                            empty: 'пустой',
                            notEmpty: 'не пустой'
                        },
                        number: {
                            equals: 'равно',
                            not: 'не равно',
                            gt: 'больше чем',
                            gte: 'больше или равно',
                            lt: 'меньше чем',
                            lte: 'меньше или равно',
                            between: 'между',
                            notBetween: 'не между',
                            empty: 'пустой',
                            notEmpty: 'не пустой'
                        },
                        string: {
                            contains: 'содержит',
                            notContains: 'не содержит',
                            empty: 'пустой',
                            notEmpty: 'не пустой',
                            equals: 'равно',
                            not: 'не равно',
                            notEndsWith: 'заканчивается не на',
                            endsWith: 'заканчивается на',
                            startsWith: 'начинается с',
                            notStartsWith: 'начинается не с'
                        },
                    },
                }
            },
        });

        $('input.global_filter').on('keyup click', function() {
            filterGlobal();
        });

        $('input.column_filter').on('keyup click', function() {
            filterColumn($(this).parents('th').attr('data-column'));
        });
    });

    $(function() {
        $('#example thead tr')
        // .clone(true)
        // .addClass('filters')
        // .appendTo('#example thead');

        // var dataSet = [
        //     [ "Tiger Nixon", "System Architect", "Edinburgh", "5421", "2011/04/25", "$320,800", "5421", "2011/04/25", "$320,800" ],
        //     [ "Garrett Winters", "Accountant", "Tokyo", "8422", "2011/07/25", "$170,750", "5421", "2011/04/25", "$320,800" ],
        //     [ "Ashton Cox", "Junior Technical Author", "San Francisco", "1562", "2009/01/12", "$86,000", "5421", "2011/04/25", "$320,800" ],
        //     [ "Cedric Kelly", "Senior Javascript Developer", "Edinburgh", "6224", "2012/03/29", "$433,060", "5421", "2011/04/25", "$320,800" ],
        //     [ "Airi Satou", "Accountant", "Tokyo", "5407", "2008/11/28", "$162,700", "5421", "2011/04/25", "$320,800" ],
        // ];



        // var table = $('#example').DataTable({
        // "ajax": 'datatables',


        // "aoColumnDefs": [{
        //         'bSortable': false,
        //         'aTargets': [1]
        //     }],
        // lengthChange: true,

        // lengthMenu: [[ 100,500,1000, -1], [ 100,500,1000, "Все"]], // Кількість єлементів на сторінці
        //fixedHeader: true,
        {{-- dom: @json($dom ?? false) ? @json($dom ?? 'lfrtip') : 'lfrtip',//'lBfrtip' --}}
        {{-- buttons: @json($is_data_export ?? false) ? ["copyHtml5","excelHtml5"] : '', --}}


        // "responsive": true,


        //
        // orderCellsTop: true,
        // fixedHeader: true,
        // initComplete: function () {
        //     var api = this.api();
        //
        //     // For each column
        //     api
        //         .columns()
        //         .eq(0)
        //         .each(function (colIdx) {
        //             // Set the header cell to contain the input element
        //             var cell = $('.filters th').eq(
        //                 $(api.column(colIdx).header()).index()
        //             );
        //             // var title = $(cell).text();
        //             $(cell).html('<input class="w-100" type="text" placeholder="Поиск" />');
        //
        //
        //             // On every keypress in this input
        //             $(
        //                 'input',
        //                 $('.filters th').eq($(api.column(colIdx).header()).index())
        //             )
        //                 .off('keyup change')
        //                 .on('keyup change', function (e) {
        //                     e.stopPropagation();
        //
        //                     // Get the search value
        //                     $(this).attr('title', $(this).val());
        //                     var regexr = '({search})'; //$(this).parents('th').find('select').val();
        //
        //                     var cursorPosition = this.selectionStart;
        //                     // Search the column for that value
        //                     api
        //                         .column(colIdx)
        //                         .search(
        //                             this.value != ''
        //                                 ? regexr.replace('{search}', '(((' + this.value + ')))')
        //                                 : '',
        //                             this.value != '',
        //                             this.value == ''
        //                         )
        //                         .draw();
        //
        //                     $(this)
        //                         .focus()[0]
        //                         .setSelectionRange(cursorPosition, cursorPosition);
        //                 });
        //         });
        // }
        //

    });

    // отображение колонок
    $('a.toggle-vis').on('click', function(e) {
        e.preventDefault();

        // Get the column API object
        var column = table.column($(this).attr('data-column'));

        // Toggle the visibility
        column.visible(!column.visible());
    });

    document.addEventListener("click", (e) => {
        if (e.target.classList.contains('BTN_COLOR')) {
            const BTN = e.target;
            if (BTN.classList.contains('btn-default')) {
                BTN.classList.remove('btn-default');
                BTN.classList.add('btn-outline-primary');
            } else if (BTN.classList.contains('btn-outline-primary')) {
                BTN.classList.remove('btn-outline-primary');
                BTN.classList.add('btn-default');
            }
        }
        // });
        //END отображение колонок

    });
</script>
