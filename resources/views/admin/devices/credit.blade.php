@extends('admin._layout')

@section('title', 'Устройства')

@section('content')
    <div class="content-wrapper mt-2">
        <section class="content">
            <div class="card card-outline card-primary">
                <form action="{{ isset($item) ? route('admin.devices.update', $item) : route('admin.devices.store') }}"
                    method="POST">
                    @isset($item)
                        @method('PATCH')
                    @endisset
                    @csrf

                    <div class="card-header">
                        <a href="{{ route('admin.devices.index') }}" class="text-primary mr-2" data-tooltip="tooltip"
                            data-html="true" title="Вернуться к списку">
                            <i class="fas fa-angle-double-left"></i>
                        </a>
                        <span class="font-weight-bold">{{ isset($item) ? 'Редактирование' : 'Создание' }} устройства</span>

                        <div class="card-tools">

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @include('admin._include.credit_images', ['N_Photo' => 3, 'addPhoto' => true])
                        </div>
                        <div class="row">
                            <div class="col-md mb-3">
                                <div class="form-group">
                                    <label>
                                        Дата установки
                                        @include('admin._include.form._field_is_required')
                                    </label>
                                    <div class="input-group date DATE" id="installation_at" data-target-input="nearest">
                                        <input type="text" name="installation_at" id="installation_at"
                                            class="form-control datetimepicker-input" data-target="#installation_at"
                                            value="{{ isset($request) ? $request->installation_at : (isset($item->installation_at) ? $item->installation_at->format('d.m.Y') : now()->format('d.m.Y')) }}"
                                            required />
                                        <div class="input-group-append" data-target="#installation_at"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md mb-3">
                                <label for="consumer_id" class="form-label">
                                    Потребитель
                                    @include('admin._include.form._field_is_required')
                                </label>
                                <select class="select2bs4 select2-hidden-accessible custom-select-sm" name="consumer_id"
                                    id="consumer_id" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                    <option value="" selected disabled>Сделайте выбор</option>
                                    @foreach ($consumers as $consumer)
                                        <option value="{{ $consumer->id }}"
                                            @if (isset($item) && $item->consumer_id == $consumer->id) selected @endif>{{ $consumer->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md mb-3">
                                <label for="type_id" class="form-label">
                                    Тип
                                    @include('admin._include.form._field_is_required')
                                </label>
                                <select class="select2bs4 select2-hidden-accessible custom-select-sm" name="type_id"
                                    id="type_id" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                    <option value="" selected disabled>Сделайте выбор</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}"
                                            @if (isset($item) && $item->type_id == $type->id) selected @endif>{{ $type->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md mb-3">
                                <label for="master_id" class="form-label">
                                    Мастер
                                    @include('admin._include.form._field_is_required')
                                </label>
                                <select class="select2bs4 select2-hidden-accessible custom-select-sm" name="master_id"
                                    id="master_id" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                    <option value="" selected disabled>Сделайте выбор</option>
                                    @foreach ($masters as $master)
                                        <option value="{{ $master->id }}"
                                            @if (isset($item) && $item->master_id == $master->id) selected @endif>{{ $master->fio() }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md mb-3">
                                @include('admin._include.form.input', [
                                    'data' => 'meter_reading',
                                    'type' => 'number',
                                    'label' => 'Показания счетчика',
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
                                    'data' => 'year_issue',
                                    'type' => 'number',
                                    'label' => 'Год выпуска',
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
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                @include('admin._include.form.input', [
                                    'data' => 'address',
                                    'label' => 'Адрес установки',
                                    'required' => true,
                                ])
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                @include('admin._include.form.textarea_ckeditor', [
                                    'data' => 'description',
                                    'label' => 'Описание',
                                    'required' => true,
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
        $(function() {
            $('.DATE').datetimepicker({
                // icons: {time: 'far fa-clock'},
                // stepping: 10, // Определяет шаг при изменении минут в виджете с помощью стрелок вверх и вниз. Значение по умолчанию: 1.
                {{-- // minDate: @json(now()), // Устанавливает минимальную дату, которую можно выбрать в виджете DateTimePicker. Значение по умолчанию: false --}}
                // daysOfWeekDisabled: [0,6], // Данный параметр предназначен для запрещения выбора определённых дней недели в календаре (0 – Воскресенье, 1 – Понедельник, 2 - Вторник, 3 – Среда, 4 – Четверг, 5 – Пятница, 6 – Суббота).
                format: 'DD.MM.YYYY',
                weekStart: 1,
                // language: 'ru',
            });
        });
    </script>
@endpush
