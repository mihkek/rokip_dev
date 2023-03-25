@extends('admin._layout')

@section('title','Бригада')

@section('content')
    <div class="content-wrapper mt-2">
        <section class="content">
            <div class="card card-outline card-primary">
                <form action="{{ isset($item) ? route('admin.brigades.update',$item) : route('admin.brigades.store') }}" class="was-validated" method="POST" >
                    @isset($item) @method('PATCH') @endisset
                    @csrf

                    <div class="card-header">
                        <a href="{{ route('admin.brigades.index') }}" class="text-primary mr-2" data-tooltip="tooltip" data-html="true" title="Вернуться к списку">
                            <i class="fas fa-angle-double-left"></i>
                        </a>
                        <span class="font-weight-bold">{{ isset($item) ? 'Редактирование' : 'Создание' }} бригады</span>

                        <div class="card-tools">

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                @include('admin._include.form.input',['data'=>'title','label'=>'Название','required'=>true])
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="company_id" class="form-label">
                                    Компания
                                    @include('admin._include.form._field_is_required')
                                </label>
                                <select class="select2bs4 select2-hidden-accessible custom-select-sm" name="company_id" id="company_id" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                    <option value="" selected disabled>Сделайте выбор</option>
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}" @if(isset($item) && $item->company_id == $company->id) selected @endif>{{ $company->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="master_id" class="form-label">
                                    Бригадир
                                    @include('admin._include.form._field_is_required')
                                </label>
                                <select class="select2bs4 select2-hidden-accessible custom-select-sm" name="master_id" id="master_id" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                    <option value="" selected disabled>Сделайте выбор</option>
                                    @foreach($masters as $master)
                                        <option value="{{ $master->id }}" @if(isset($item) && $item->master_id == $master->id) selected @endif>{{ $master->fio() }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="masters">
                                    Мастера
                                </label>
                                <select class="select2bs4 select2-hidden-accessible" name="masters[]" id="masters" style="width: 100%;" data-placeholder="Сделайте выбор" data-select2-id="masters" tabindex="-1" aria-hidden="true" multiple>
                                    @foreach($masters as $master)
                                        <option value="{{ $master->id }}" @if(isset($item) && $item->masters->contains($master->id)) selected @endif>{{ $master->fio() }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
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
        $(function () {
            $('.DATE').datetimepicker({
                // icons: {time: 'far fa-clock'},
                // stepping: 10, // Определяет шаг при изменении минут в виджете с помощью стрелок вверх и вниз. Значение по умолчанию: 1.
                {{--// minDate: @json(now()), // Устанавливает минимальную дату, которую можно выбрать в виджете DateTimePicker. Значение по умолчанию: false--}}
                // daysOfWeekDisabled: [0,6], // Данный параметр предназначен для запрещения выбора определённых дней недели в календаре (0 – Воскресенье, 1 – Понедельник, 2 - Вторник, 3 – Среда, 4 – Четверг, 5 – Пятница, 6 – Суббота).
                format: 'DD.MM.YYYY',
                weekStart: 1,
                // language: 'ru',
            });
        });
    </script>
@endpush
