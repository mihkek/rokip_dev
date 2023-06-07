@extends('admin._layout')

@section('title', 'Пользователи')

@section('content')
    <div class="content-wrapper mt-2">
        <section class="content">
            <div class="row" id="editor">
                <div class="col-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">

                            <span class="font-weight-bold">Пользователи</span>

                            <div class="card-tools">
                                <a href="{{ route('admin.users.create') }}"
                                    class="btn btn-outline-primary btn-sm text-primary mr-2">
                                    Добавить
                                </a>
                                {{--                                @include('_layouts._tools') --}}
                            </div>
                        </div>
                        <div class="card-body big-table">
                            {{--                            @include('admin.users._filters') --}}

                            {{--                            @include('admin._include.table.columns_select') --}}
                            <table id="example" class="table table-bordered table-striped">
                                @include('admin._include.table.thead')
                                <tbody>
                                    @foreach ($users as $item)
                                        @include('admin.users._index_table')
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
