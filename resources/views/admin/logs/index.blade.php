@extends('admin._layout')

@section('title','Главная страница')

@section('content')
    @php
        $items = $logs;
    @endphp
    <div class="content-wrapper mt-2">
        <section class="content">
            <div class="row" id="editor">
                <div class="col-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            @if(url()->previous() != null || url()->previous() != '')
                                <a href="{{ url()->previous() }}" class="mr-3" data-tooltip="tooltip" data-html="true" title="Вернуться назад">
                                    <i class="fas fa-angle-double-left"></i>
                                </a>
                            @endif
                            Логи
                        </div>
                        <div class="card-body">
                            {{--                            @include('programs._filter')--}}
                            {{--                            @include('_include._table_columns_select')--}}
                            <table class="table table-bordered table-striped" style="width:100%">
                                @include('admin._include.table.thead')
                                @includeIf('admin.logs._filter_table')
                                <tbody>
                                @if($items->count())
                                    @foreach($items as $item)
                                        @include('admin.logs._index_table')
                                    @endforeach
                                @else
                                    <p>Нет данных</p>
                                @endif
                                </tbody>
                                @include('admin._include.table.tfoot')
                            </table>
                            {!! $items->links('admin._include.table.paginate') !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

{{--@push('scripts')--}}
{{--    @include('admin._layouts._table_properties')--}}
{{--@endpush--}}
