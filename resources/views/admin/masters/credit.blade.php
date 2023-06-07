@extends('admin._layout')

@section('title', 'Мастера')

@section('content')
    <div class="content-wrapper mt-2">
        <section class="content">
            <div class="card card-outline card-primary">
                <form class="was-validated"
                    action="{{ isset($item) ? route('admin.masters.update', $item) : route('admin.masters.store') }}"
                    method="POST">
                    @isset($item)
                        @method('PATCH')
                    @endisset
                    @csrf

                    <div class="card-header">
                        <a href="{{ route('admin.users.index') }}" class="text-primary mr-2" data-tooltip="tooltip"
                            data-html="true" title="Вернуться к списку">
                            <i class="fas fa-angle-double-left"></i>
                        </a>
                        <span class="font-weight-bold">{{ isset($item) ? 'Редактирование' : 'Создание' }} мастера</span>

                        <div class="card-tools">
                            <a href="{{ route('admin.users.create') }}"
                                class="btn btn-outline-primary btn-sm text-primary mr-2">
                                Создать нового
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md mb-3">
                                @include('admin._include.form.input', [
                                    'data' => 'name',
                                    'label' => 'ФИО',
                                    'required' => true,
                                ])
                            </div>
                            <div class="col-md mb-3">
                                @include('admin._include.form.input', [
                                    'data' => 'email',
                                    'label' => 'Емейл',
                                    'required' => true,
                                ])
                            </div>
                            <div class="col-md mb-3">
                                @include('admin._include.form.input', [
                                    'data' => 'phone',
                                    'label' => 'Телефон',
                                    'required' => true,
                                ])
                            </div>
                            <div class="col-md mb-3">
                                @include('admin._include.form.input', [
                                    'data' => 'password',
                                    'label' => 'Пароль',
                                    'required' => true,
                                ])
                            </div>
                            @if (!Auth::user()->hasRole('company'))
                                <div class="col-md">
                                    <label for="company_id" class="form-label">
                                        Компания
                                        @include('admin._include.form._field_is_required')
                                    </label>
                                    <select class="select2bs4 select2-hidden-accessible custom-select-sm" name="company_id"
                                        id="company_id" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                        <option value="" selected disabled>Сделайте выбор</option>
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->id }}"
                                                @if ((isset($item) && $item->company_id == $company->id) || (isset($company_id) && $company_id == $company->id)) selected @endif>{{ $company->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            {{-- <div class="col-md mb-3">
                                <label for="user_id" class="form-label">
                                    Пользователь
                                    @include('admin._include.form._field_is_required')
                                </label>
                                <select class="select2bs4 select2-hidden-accessible custom-select-sm" name="user_id" id="user_id" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                    <option value="" selected disabled>Сделайте выбор</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" @if (isset($item) && $item->user_id == $user->id) selected @endif>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                        </div>
                    </div>
                    <div class="modal-footer justify-content-end">
                        {{--                        @include('admin._include.statuses') --}}
                        <button type="submit" class="btn btn-primary ml-4">Сохранить</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('admin/my_plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('admin/my_plugins/inputmask/mask_form.js') }}"></script>
    <script>
        $('body').on('click', '.is_check_password', function() {
            const PASSWORD = ".password";

            if (this.checked) {
                $(PASSWORD).prop('disabled', false);
                $(PASSWORD).prop('required', true);
            } else {
                $(PASSWORD).prop('disabled', true);
                $(PASSWORD).prop('required', false);
            }
        });
    </script>
@endpush
