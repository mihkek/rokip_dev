@if(env('DATE_EDIT') == true)
    <div class="row mb-3">
        <div class="col-sm-2 mb-3">
            @include('_include.form.input',['data'=>'created_at','type'=>'date','label'=>'Дата создания','placeholder'=>'Введите данные','length'=>10])
        </div>
    </div>
@endif
