@php $id = isset($item) ? $item->id : null; @endphp
<div class="modal fade" id="modal_{{ $id }}_credit">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ isset($item) ? route('admin.tags.update',$item) : route('admin.tags.store') }}" class="was-validated" method="POST" enctype="multipart/form-data">
                @isset($item) @method('PATCH') @endisset
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_{{ $id }}_show_label">{!! isset($item) ? trans('trans.editing') : trans('trans.creation') !!}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-left">
                    @include('admin._include.form.input',['data'=>'title_ru','label'=>'Название','lang'=>'ru','required'=>true])
                    @include('admin._include.form.input',['data'=>'title_ua','label'=>'Назва','lang'=>'uk','required'=>true])
                    @include('admin._include.form.input',['data'=>'title_en','label'=>'Title','lang'=>'en','required'=>true])
                </div>
                <div class="modal-footer justify-content-end">
                    <input type="checkbox" name="status" @if(!isset($item) || $item->status_id == \App\Models\Status::ACTIVE) checked @endif data-bootstrap-switch data-off-color="danger" data-on-color="success">
                    <button type="submit" class="btn btn-primary default-color ml-4">{!! trans('trans.save') !!}</button>
                </div>
            </form>
        </div>
    </div>
</div>
