<a class="btn btn-outline-primary btn-sm text-primary mr-2" data-toggle="modal" data-target="#import_xml">
    Импорт оборудования
</a>
<div class="modal fade" id="import_xml">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="overlay d-none">
                <i class="fas fa-2x fa-sync fa-spin"></i>
            </div>
            <div class="modal-header">
                Файл импорта
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.equipments.import') }}" class="was-validated" method="POST" enctype="multipart/form-data">
                    @csrf

                    <label for="company_id" class="form-label">
                        Компания
                        @include('admin._include.form._field_is_required')
                    </label>
                    <select class="select2bs4 select2-hidden-accessible custom-select-sm" name="company_id" id="company_id" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                        <option value="" selected disabled>Сделайте выбор</option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}" @if(isset($item) && $item->company_id == $company->id) selected @endif>{{ $company->name }}</option>
                        @endforeach
                    </select>
                    <br>
                    <p class="text-danger">
                        Поддерживаются только файлы с расширением .csv
                    </p>
                    <div class="custom-file">
                        <input type="file" name="csv" class="custom-file-input" id="csv" accept=".csv" required>
                        <label class="custom-file-label" for="xml" style="overflow: hidden;">Выберите файл</label>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block" onclick="block_modal()">Загрузить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function block_modal()
        {
            $('.overlay').removeClass('d-none');
        }
    </script>
@endpush
