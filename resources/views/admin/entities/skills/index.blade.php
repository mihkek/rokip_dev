@extends('admin._layout')

@section('title','Языки')

@section('content')
    <div class="content-wrapper mt-2">
        <section class="content">
            <div class="row" id="editor">
                <div class="col-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <span class="font-weight-bold">Уровни</span>

                            <div class="card-tools">
                                <a class="btn btn-outline-primary btn-sm text-primary mr-2" data-toggle="modal" data-target="#modal__credit">
                                    Добавить
                                </a>
                                @include('admin.entities.skills._credit_modal')
                                {{--                                @include('_layouts._tools')--}}
                            </div>
                        </div>
                        <div class="card-body">
                            @include('admin._include.table.columns_select')
                            <table id="example" class="table table-bordered table-striped">
                                @include('admin._include.table.thead')
                                <tbody>
                                    @foreach($skills as $item)
                                        @include('admin.entities.skills._index_table')
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
