@extends('admin._layout')

@section('title', 'Компании')

@section('content')
    <div class="content-wrapper mt-2">
        <section class="content">
            <div class="row" id="editor">
                <div class="col-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">

                            <span class="font-weight-bold">Компании</span>

                            <div class="card-tools">
                                <a href="{{ route('admin.companies.create') }}"
                                    class="btn btn-outline-primary btn-sm text-primary mr-2">
                                    Добавить
                                </a>
                                {{--                                @include('_layouts._tools') --}}
                            </div>
                        </div>
                        <div class="card-body big-table">
                            {{--                            @include('admin.users._filters') --}}

                            {{--                            @include('admin._include.table.columns_select') --}}
                            <table id="example" class="table table-bordered table-striped big-table">
                                @include('admin._include.table.thead')
                                <tbody>
                                    @foreach ($companies as $item)
                                        @include('admin.companies._index_table')
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
