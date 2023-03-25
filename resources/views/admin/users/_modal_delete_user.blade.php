<div class="modal fade" id="delete_user_modal_{{ $user->id ?? null }}" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ isset($user) ? route('admin.users.destroy',$user) : '' }}" class="was-validated" method="POST" enctype="multipart/form-data">
                @isset($user) @method('DELETE') @endisset
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold">Точно удалить пользователя?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer justify-content-end">
                    <button type="submit" class="btn btn-danger ml-4">УДАЛИТЬ</button>
                </div>
            </form>
        </div>
    </div>
</div>
