@extends('admin._layout')

@section('title','Пользователь')

@section('content')
    <div class="content-wrapper mt-2">
        <section class="content">
            <div class="card card-outline card-primary">
                <form class="was-validated" action="{{ isset($item) ? route('admin.users.update',$item) : route('admin.users.store') }}" method="POST" >
                    @isset($item) @method('PATCH') @endisset
                    @csrf

                    <div class="card-header">
                        <a href="{{ route('admin.users.index') }}" class="text-primary mr-2" data-tooltip="tooltip" data-html="true" title="Вернуться к списку">
                            <i class="fas fa-angle-double-left"></i>
                        </a>
                        <span class="font-weight-bold">{{ isset($item) ? 'Редактирование' : 'Создание' }} пользователя</span>

                        <div class="card-tools">

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md mb-3">
                                @include('admin._include.form.input',['data'=>'name','label'=>'ФИО','required'=>true])
                            </div>
                            <div class="col-md mb-3">
                                @include('admin._include.form.input',['data'=>'email','label'=>'Емейл','required'=>true])
                            </div>
                            <div class="col-md mb-3">
                                @include('admin._include.form.input',['data'=>'phone','label'=>'Телефон','required'=>true])
                            </div>
{{--                        </div>--}}
{{--                        <div class="row">--}}
                            <div class="col-md mb-3">
                                <label for="role_id" class="form-label">
                                    Роль
                                    <span class="text-danger" data-tooltip="tooltip" data-html="true" title="Поле обязательно к заполнению">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </span>
                                </label>
                                <select class="select2bs4 select2-hidden-accessible custom-select-sm" name="role_id" id="role_id" style="width: 100%;" tabindex="-1" aria-hidden="true" @if(isset($is_master) && $is_master == true) disabled @endif required>
                                    <option value="" selected disabled>Сделайте выбор</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" @if(isset($item) && $item->hasRole($role->name) || (isset($is_master) && $is_master == true && $role->name == 'master')) selected @endif>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md mb-3">
                                <label for="password" class="form-label">
                                    Пароль
                                    <a href="#" class="password-control text-primary mx-3" data-tooltip="tooltip" title="Показать/скрыть пароль"></a>
                                </label>
                                @isset($item)
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <input class="is_check_password" type="checkbox">
                                            </span>
                                        </div>
                                        <input type="text" name="password" class="form-control password" disabled>
                                    </div>
                                @else
                                    <input type="text" name="password" class="form-control password" required>
                                @endif
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
    <script src="{{ asset('admin/my_plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('admin/my_plugins/inputmask/mask_form.js') }}"></script>
    <script>
        $('body').on('click', '.is_check_password', function () {
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
