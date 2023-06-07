@extends('admin._layout')

@section('title','Категории')

@section('content')
    <div class="content-wrapper mt-2">
        <section class="content">
            <div class="row" id="editor">
                <div class="col-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <span class="font-weight-bold">Категории</span>

                            <div class="card-tools">
                                <a href="{{ route('admin.categories.create') }}" class="btn btn-outline-primary btn-sm text-primary mr-2">
                                    Добавить
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    @if($category != null)
                                        <a href="{{ route('admin.categories.index') }}" data-tooltip="tooltip" data-html="true" title="Вернуться к главным категориям">
                                            <i class="fas fa-home"></i>
                                        </a>
                                        <span class="mx-3"><i class="fas fa-angle-double-right"></i></span>
                                        @include('admin.entities.categories._category_base_title',['this_category'=>$category,'index'=>0,'line'=>true])
                                    @endif
                                </div>
                            </div>

                            @include('admin._include.table.columns_select')
                            <table id="example" class="table table-bordered table-striped">
                                @include('admin._include.table.thead')
                                <tbody>
                                    @foreach($categories as $item)
                                        @include('admin.entities.categories._index_table')
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
