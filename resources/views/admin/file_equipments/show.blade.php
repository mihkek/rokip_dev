@extends('admin._layout')

@section('title',"Файл: $item->title")

@section('content')
    <div class="content-wrapper mt-2">
        <section class="content">
            <div class="row" id="editor">
                <div class="col-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <a href="{{ route('admin.file_equipments.index') }}" class="text-primary mr-2" data-tooltip="tooltip" data-html="true" title="Вернуться">
                                <i class="fas fa-angle-double-left"></i>
                            </a>
                            <span class="font-weight-bold">Файл: {{ $item->title }}</span>

                            <div class="card-tools">

                            </div>
                        </div>
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-sm-2">{{ $item->count }}</dt>
                                <dd class="col-sm-10">Общее количество объявлений в csv</dd>

                                <dt class="col-sm-2">{{ $item->count_double }}</dt>
                                <dd class="col-sm-10">Количество дублей</dd>
                            </dl>

                            <div class="row">
                                <div class="col">
                                    <b>
                                        Опубликованные
                                    </b>
                                    <br>
                                    {!! $item->successes !!}
                                </div>
                                <div class="col">
                                    <b>
                                        Не опубликованные
                                    </b>
                                    <br>
                                    {!! $item->errors !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('styles')
    <style>
        .custom-file-label::after {
            display: none;
        }
    </style>
@endpush

@push('scripts')
{{--    @include('admin._include.table._properties')--}}
@endpush
