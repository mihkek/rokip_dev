@php
    $route = '' . (string) route('admin.vacancies.destroy',$item);
@endphp
@dump()
<a href="#!" class="text-danger" data-toggle="modal" data-target="#modal{{ $item ? $item->id : null }}delete" data-tooltip="tooltip" title="Удаление" onclick="show_modal_delete('{{ $route }}')">
    <i class="fas fa-trash-alt"></i>
</a>

@pushOnce('scripts')
    <div class="modal fade" id="modal_delete"  role="dialog" aria-labelledby="modal_deleteLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form action="{{-- isset($item) ? route('admin.vacancies.destroy',$item) : '' --}}" class="was-validated" method="POST" id="form_delete" enctype="multipart/form-data">
                    @isset($item) @method('DELETE') @endisset
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold" id="modal_deleteLabel">Точно удалить?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer justify-content-end">
                        <button type="submit" class="btn btn-danger ml-4">Удалить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function show_modal_delete(route_delete)
        {
            $('#modal_delete').modal('show')
            $('#form_delete').attr('action', route_delete);
        }
    </script>
@endPushOnce

