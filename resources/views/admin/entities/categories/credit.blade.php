@extends('admin._layout')

@section('title','Категории')

@section('content')
    <div class="content-wrapper mt-2">
        <section class="content">
            <div class="row">
                <div class="col-xl-12" id="editor">
                    <div class="card card-outline card-primary">
                        <form action="{{ isset($item) ? route('admin.categories.update',$item) : route('admin.categories.store') }}" class="was-validated" method="POST" enctype="multipart/form-data">
                            @isset($item) @method('PATCH') @endisset
                            @csrf

                            <div class="card-header">
                                <a href="{{ route('admin.categories.index') }}" class="text-primary mr-2">
                                    <i class="fas fa-angle-double-left"></i>
                                </a>

                                <span class="font-weight-bold">@isset($item) Редактирование @else Создание @endisset</span>

                                <div class="card-tools">
                                    {{--                                    @include('_layouts._tools')--}}
                                </div>
                            </div>

                            @include('admin.entities.categories._credit_tab')

                            <div class="card-body">
                                @if(isset($_GET['step']) && $langs->pluck('key')->contains($_GET['step']))
                                    <div class="row mb-3">
                                        <div class="col-xl-4 mb-3">
                                            @include('admin._include.form.input',['data'=>('title_' . $_GET['step']),'label'=>'Название','lang'=>$_GET['step'],'required'=>true])
                                        </div>

                                        <div class="col-xl-4 mb-3">
                                            <label for="{{ 'slug_' . $_GET['step'] }}">
                                                <img src="{{ asset('admin/img/png/flag_' . $_GET['step'] . '.png') }}" width="18px" alt="">
                                                Slug
                                            </label>
                                            <div class="input-group mb-1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <input type="checkbox">
                                                    </span>
                                                </div>

                                                {{--    <input type="text" class="form-control" placeholder="Username" length="{{ $length ?? 150 }}">--}}

                                                @include('admin._include.form.input',['data'=>('slug_' . $_GET['step']),'other'=>'disabled'])
                                            </div>
                                        </div>

                                        <div class="col-xl-4 mb-3">
                                            @include('admin._include.form.input',['data'=>('meta_title_' . $_GET['step']),'label'=>'Мета-тег "Название"','lang'=>$_GET['step']])
                                        </div>

                                        <div class="col-12 mb-3">
                                            @include('admin._include.form.input',['data'=>('description_' . $_GET['step']),'label'=>'Описание','lang'=>$_GET['step']])
                                        </div>

                                        <div class="col-12 mb-3">
                                            @include('admin._include.form.input',['data'=>('meta_description_' . $_GET['step']),'label'=>'Мета-тег "Описание"','lang'=>$_GET['step']])
                                        </div>

                                        <div class="col-12 mb-3">
                                            @include('admin._include.form.input',['data'=>('meta_key_words_' . $_GET['step']),'label'=>'Мета-тег "Ключевые слова"','lang'=>$_GET['step']])
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="category_id">
                                                Родительская категория <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control select2bs4 select2-hidden-accessible mb-3" id="category_id" name="category_id" style="width: 100%;">
                                                <option value="" selected>Оставьте поле пустым если создаёте родительскую категорию</option>
                                                @foreach($categories->where('category_id',null) as $category)
                                                    @include('admin.entities.categories._child_category')
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="modal-footer justify-content-end">
                                <input type="checkbox" name="status" @if(!isset($item) || $item->status_id == \App\Models\Status::ACTIVE) checked @endif data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                <button type="submit" class="btn btn-primary ml-4">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('styles')
    <style>
        /*.input-group > .form-control:not(:first-child), .input-group > .custom-select:not(:first-child) {*/
        /*    border-top-left-radius: 5px;*/
        /*    border-bottom-left-radius: 5px;*/
        /*}*/
        .input-group > .form-control:not(:last-child), .input-group > .custom-select:not(:last-child) {
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }
    </style>
@endpush
