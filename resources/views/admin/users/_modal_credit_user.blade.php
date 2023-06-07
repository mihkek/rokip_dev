<div class="modal fade" id="credit_user_modal_{{ $user->id ?? null }}" tabindex="-1" aria-labelledby="credit_user_modal_label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body text-start">
                <h3 class="modal-title mb-4">{{ isset($user) ? 'Редактирование' : 'Добавление' }} пользователя</h3>

                <form action="{{ isset($user) ? route('admin.users.update',$user) : route('admin.users.store') }}" method="POST" >
                    @isset($user) @method('PATCH') @endisset
                    @csrf

                    <div class="row">
                        <div class="col mb-5">
                            <label for="name" class="form-label">ФИО</label>
                            <input type="text" name="name" class="form-control" placeholder="Введите данные" value="{{ $user->name ?? null }}" required>
                        </div>
                        <div class="col mb-5">
                            <label for="email" class="form-label">Емейл</label>
                            <input type="email" name="email" class="form-control" placeholder="Введите данные" value="{{ $user->email ?? null }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-5">
                            <label for="role_id" class="form-label">Права</label>
                            <select class="form-select" name="role_id" aria-label="Default select example" required>
                                <option value="" selected disabled>Сделайте выбор</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" @if(isset($user) && $user->hasRole($role->name)) selected @endif>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col mb-5">
                            <label for="password" class="form-label">
                                Пароль
                                <a href="#" class="password-control text-primary mx-3" data-tooltip="tooltip" title="Показать/скрыть пароль"></a>
                            </label>
                            @isset($user)
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <input class="form-check-input mt-0 is_check_password" type="checkbox">
                                    </div>
                                    <input type="password" name="password" class="form-control password" disabled>
                                </div>
                            @else
                                <input type="password" name="password" class="form-control password" required>
                            @endif
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-6 col-md-4 mb-4">
                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">
                                    ОТМЕНА
                                </button>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 mb-4">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                <span class="mx-2">
                                    <i class="bi bi-check-lg"></i>
                                </span>
                                <span class="mx-2">
                                    {{ isset($user) ? 'ИЗМЕНИТЬ' : 'ДОБАВИТЬ' }}
                                </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
