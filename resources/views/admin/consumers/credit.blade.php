@extends('admin._layout')

@section('title','Потребители')

@section('content')
    <div class="content-wrapper mt-2">
        <section class="content">
            <div class="card card-outline card-primary">
                <form action="{{ isset($item) ? route('admin.consumers.update',$item) : route('admin.consumers.store') }}" method="POST" >
                    @isset($item) @method('PATCH') @endisset
                    @csrf

                    <div class="card-header">
                        <a href="{{ route('admin.consumers.index') }}" class="text-primary mr-2" data-tooltip="tooltip" data-html="true" title="Вернуться к списку">
                            <i class="fas fa-angle-double-left"></i>
                        </a>
                        <span class="font-weight-bold">{{ isset($item) ? 'Редактирование' : 'Создание' }} потребителя</span>

                        <div class="card-tools">

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                @include('admin._include.form.input',['data'=>'title','label'=>'ФИО/юр.лицо','required'=>true])
                            </div>
                            <div class="col-md-6 mb-3">
                                @include('admin._include.form.input',['data'=>'contract','label'=>'Договор №','required'=>true])
                            </div>
                        </div>
                        <div class="row" style="background: #eee">
                            <div class="col mb-3">
                                @include('admin.consumers._credit_phones')
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                @include('admin.consumers._credit_fillings')
                            </div>
                        </div>

                        {{--                        @include('admin._include.form.textarea_ckeditor',['data'=>'description','label'=>'Описание','required'=>true])--}}
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
