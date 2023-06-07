<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{ asset('admin/mdb/js/mdb.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/js/adminlte.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>

<!-- InputMask -->
<script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('admin/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/js/demo.js') }}"></script>

<script src="{{ asset('admin/js/upload-image.js') }}"></script>
<script src="{{ asset('admin/my_plugins/inputmask/mask_form.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
{{--<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>--}}
<script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- Добавление кнопок экспорта таблиц -->
<script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

<script>
    {{--window.onload = function() {--}}
    {{--    // завершение объявлений--}}
    {{--    console.log('completion_ads');--}}
    {{--    $.ajax({--}}
    {{--        headers: {--}}
    {{--            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
    {{--        },--}}
    {{--        data: {--}}

    {{--        },--}}
    {{--        type: "POST",--}}
    {{--        url: @json(route('js.completion_ads')),--}}
    {{--        success: function(result){--}}
    {{--            console.log('completion_ads',result);--}}
    {{--        },--}}
    {{--        error:function(result)--}}
    {{--        {--}}
    {{--            console.log('Error completion_ads',result);--}}
    {{--        },--}}
    {{--    });--}}
    {{--};--}}
</script>

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
            // "serverSide": true,

            "pagingType": "full_numbers", // добавляет ссылки на первую и последнюю страницы
            "language": {
                "lengthMenu": "Отображать _MENU_ на странице", // "Display _MENU_ records per page"
                "zeroRecords": "Простите, ничего не найдено",
                "info": "Страница _PAGE_ из _PAGES_", // Showing page _PAGE_ of _PAGES_
                "infoEmpty": "Нет доступных записей",
                "infoFiltered": "(отфильтровано из _MAX_ общих записей)",
                "loadingRecords": "Загрузка...",
                "processing":     "Обработка...",
                "search":         "Поиск:",
                "pageLength": "_MENU_",
                "paginate": {
                    "first":      "<i class='fas fa-angle-double-left'></i>", // "<<",
                    "last":       "<i class='fas fa-angle-double-right'></i>", // ">>",
                    "next":       "<i class='fas fa-angle-right'></i>", // ">",
                    "previous":   "<i class='fas fa-angle-left'></i>", // "<",
                },
            },
            "lengthMenu": [[ 25, -1], [ 25, "Все"]], // Кількість єлементів на сторінці
        });
    });
</script>

{{--<!-- Include Editor JS files. -->--}}
{{--<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js"></script>--}}
{{--<script>--}}
{{--    new FroalaEditor('textarea');--}}
{{--</script>--}}

{{--<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>--}}
{{--<script type="text/javascript">--}}
{{--    $(document).ready(function(){--}}
{{--        CKEDITOR.config.toolbar = [ // Настройки тулбара редактора--}}

{{--            { name: 'clipboard', items: [--}}
{{--                    'Paste', '-', //'Copy',--}}
{{--                    'Undo', 'Redo', '-',--}}
{{--                    'Bold', 'Italic', '-',--}}
{{--                    'Subscript', 'Superscript', '-',//????--}}
{{--                    'JustifyLeft', 'JustifyCenter','JustifyRight','JustifyBlock','-',//???--}}
{{--                    'NumberedList', 'BulletedList', 'Outdent', 'Indent','-',--}}
{{--                    'Link', 'Unlink', '-',--}}
{{--                    //'TextColor','BGColor',//????--}}
{{--                    'Image', 'Table', 'HorizontalRule', 'SpecialChar', '-',--}}
{{--                    'Maximize'--}}
{{--                ] },--}}
{{--        ];--}}
{{--        var editor = CKEDITOR.replaceAll();--}}
{{--        CKFinder.setupCKEditor( editor );--}}
{{--    })--}}
{{--</script>--}}

<script>
    $(function () {
        $('[data-tooltip="tooltip"]').tooltip()
    });


    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'DD.MM.YYYY HH:mm'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        // $('#reservationtime').daterangepicker({
        //     timePicker: true,
        //     timePickerIncrement: 30,
        //     locale: {
        //         format: 'DD.MM.YYYY HH:mm'
        //     }
        // })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });

        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

    })
</script>

