@extends('admin._layout')

@section('title', 'Оборудование')

@section('content')
    <div class="content-wrapper mt-2">
        <section class="content">
            <div class="card card-outline card-primary">
                <form action="{{ isset($item) ? route('admin.equipments.update', $item) : route('admin.equipments.store') }}"
                    method="POST" class="was-validated">
                    @isset($item)
                        @method('PATCH')
                    @endisset
                    @csrf

                    <div class="card-header">
                        <a href="{{ route('admin.equipments.index') }}" class="text-primary mr-2" data-tooltip="tooltip"
                            data-html="true" title="Вернуться к списку">
                            <i class="fas fa-angle-double-left"></i>
                        </a>
                        <span class="font-weight-bold">{{ isset($item) ? 'Редактирование' : 'Создание' }}
                            оборудования</span>

                        <div class="card-tools">

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            {{--                            <div class="col-md mb-3"> --}}
                            {{--                                <label for="type_id" class="form-label"> --}}
                            {{--                                    Тип --}}
                            {{--                                    @include('admin._include.form._field_is_required') --}}
                            {{--                                </label> --}}
                            {{--                                <select class="select2bs4 select2-hidden-accessible custom-select-sm" name="type_id" id="type_id" style="width: 100%;" tabindex="-1" aria-hidden="true" required> --}}
                            {{--                                    <option value="" selected disabled>Сделайте выбор</option> --}}
                            {{--                                    @foreach ($types as $type) --}}
                            {{--                                        <option value="{{ $type->id }}" @if (isset($item) && $item->type_id == $type->id) selected @endif>{{ $type->title }}</option> --}}
                            {{--                                    @endforeach --}}
                            {{--                                </select> --}}
                            {{--



                                                </div> --}}
                            @if (!Auth::user()->hasRole('company'))
                                <div class="col-md mb-3">
                                    <label for="company_id" class="form-label">
                                        Компания
                                        @include('admin._include.form._field_is_required')
                                    </label>
                                    <select class="select2bs4 select2-hidden-accessible custom-select-sm" name="company_id"
                                        id="company_id" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                        <option value="" selected disabled>Сделайте выбор</option>
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->id }}"
                                                @if (isset($item) && $item->company_id == $company->id) selected @endif>{{ $company->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            <div class="col-md mb-3">
                                <label for="master_id" class="form-label">
                                    Мастер

                                </label>
                                <select class="select2bs4 select2-hidden-accessible custom-select-sm" name="master_id"
                                    id="master_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <option value="" selected disabled>Сделайте выбор</option>
                                    @foreach ($masters as $master)
                                        <option value="{{ $master->id }}"
                                            @if (isset($item) && $item->master_id == $master->id) selected @endif>{{ $master->fio() }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md mb-3">
                                @include('admin._include.form.input', [
                                    'data' => 'shipment_number',
                                    'label' => 'Номер отгрузки',
                                    'required' => true,
                                ])
                            </div>
                            <div class="col-md mb-3">
                                @include('admin._include.form.input', [
                                    'data' => 'factory_number',
                                    'label' => 'Заводской номер',
                                    'required' => true,
                                ])
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md mb-3">
                                @include('admin._include.form.input', [
                                    'data' => 'title',
                                    'label' => 'Название',
                                    'required' => true,
                                ])
                            </div>
                            <div class="col-md mb-3">
                                @include('admin._include.form.input', [
                                    'data' => 'modification',
                                    'label' => 'Модификация',
                                ])
                            </div>
                            <div class="col-md mb-3">
                                @include('admin._include.form.input', [
                                    'data' => 'current',
                                    'type' => 'number',
                                    'label' => 'Сила тока, А',
                                ])
                            </div>
                            <div class="col-md mb-3">
                                @include('admin._include.form.input', [
                                    'data' => 'voltage',
                                    'type' => 'number',
                                    'label' => 'Номинальное напряжение, В',
                                ])
                            </div>
                            <div class="col-md mb-3">
                                @include('admin._include.form.input', [
                                    'data' => 'installation_adress',
                                    'type' => 'number',
                                    'label' => 'Адрес установки',
                                ])
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                @include('admin._include.form.textarea', [
                                    'data' => 'description',
                                    'label' => 'Описание',
                                ])
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                @include('admin._include.form.textarea', [
                                    'data' => 'consumer_info',
                                    'label' => 'Информация о потребителе',
                                ])
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                @include('admin._include.form.textarea', [
                                    'data' => 'additional_data',
                                    'label' => 'Дополнительная информация',
                                ])
                            </div>
                        </div>

                        {{--                        @include('admin._include.form.textarea_ckeditor',['data'=>'description','label'=>'Описание','required'=>true]) --}}
                    </div>
                    <div class="modal-footer justify-content-end">
                        @include('admin._include.statuses')
                        <button type="submit" class="btn btn-primary ml-4">Сохранить</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).on('input', '#company_id', function() {
            let company_id = $(this).val();
            console.log(company_id);
            let masters = document.getElementById('master_id');
            console.log(masters);
            masters.setAttribute("disabled", "disabled");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'company_id': company_id,
                },
                type: "POST",
                url: @json(route('js.company_masters')),
                success: function(result) {
                    console.log(result);
                    masters.removeAttribute('disabled');
                    let options_master_id =
                        '<option value="" selected disabled>Сделайте выбор</option>';
                    for (let i = 0; i < result.length; i++) {
                        is_selected_master_id = (result.id === result[i].id) ? 'selected' : '';
                        options_master_id += '<option value="' + result[i].id + '"' +
                            is_selected_master_id + '>' + result[i].name + '</option>';
                    }
                    $('#master_id').html(options_master_id);
                    // $(`#subcontractor_id option#${result?.subcontractor_id}`).change();
                    // $(`#region_id`).trigger('change',[result?.region_id,result?.gbr_id,result?.gbr_reserve_id]);
                },
                error: function(result) {
                    // console.log('Error');
                    // console.log(data);
                },
            });
        });
    </script>
@endpush
