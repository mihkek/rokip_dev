<a class="btn btn-outline-primary btn-sm text-primary mr-2" data-toggle="modal" data-target="#import_xml">
    Импорт объявлениий
</a>
<div class="modal fade" id="import_xml">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Файл импорта
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.import_xml') }}" class="was-validated" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="all" class="custom-control-input" id="all">
                            <label class="custom-control-label text-dark" for="all">Импорт всех объявлений (кроме клонов и дублей)</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="new_dop_info" class="custom-control-input" id="new_dop_info">
                            <label class="custom-control-label text-dark" for="new_dop_info">Обновлять контент из тега {{ '<DOPINFORMS>' }}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="new_desc_company" class="custom-control-input" id="new_desc_company">
                            <label class="custom-control-label text-dark" for="new_desc_company">Обновлять контент из тега {{ '<OPISANIYEKOMPAN>' }}</label>
                        </div>
                    </div>

                    {{--                                                    <label for="csv">Файл импорта</label>--}}
                    <div class="custom-file">
                        <input type="file" name="xml" class="custom-file-input" id="xml" accept=".text/csv, .xml" required>
                        <label class="custom-file-label" for="xml" style="overflow: hidden;">Выберите файл</label>
                    </div>
                    {{--                                                    <div class="input-group">--}}
                    {{--                                                        --}}
                    {{--                                                        <div class="input-group-append">--}}
                    {{--                                                            --}}
                    {{--                                                        </div>--}}
                    {{--                                                    </div>--}}

                    {{--                                                    <div class="form-group">--}}

                    {{--                                                    </div>--}}
                    <div class="row mt-3">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Загрузить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
