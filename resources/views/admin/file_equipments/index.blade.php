@extends('admin._layout')

@section('title','Файлы загрузки')

@section('content')
    <div class="content-wrapper mt-2">
        <section class="content">
            <div class="row" id="editor">
                <div class="col-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">

                            <span class="font-weight-bold">Файлы загрузки</span>

                            <div class="card-tools">
                                @include('admin.equipments._download')

                                {{--                                @include('_layouts._tools')--}}
                            </div>
                        </div>
                        <div class="card-body">
{{--                            @include('admin.users._filters')--}}
                            @if(isset($_GET['company']))
                                Компания "{{ $companies->where('id', $_GET['company'])->first()->name ?? 'нет данных' }}"
                                <span class="ml-2 text-danger" data-tooltip="tooltip" title="Очистить">
                                    <i class="far fa-times-circle"></i>
                                </span>
                                <br><br>
                            @endif

                            {{--                            @include('admin._include.table.columns_select')--}}
                            <table id="example" class="table table-bordered table-striped">
                                @include('admin._include.table.thead')
                                <tbody>
                                    @foreach($files as $item)
                                        @include('admin.file_equipments._index_table')
                                    @endforeach
                                </tbody>
                                @include('admin._include.table.tfoot')
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    @include('admin._include.table._properties')
@endpush
