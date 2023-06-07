@extends('admin._layout')

@section('title', 'Мастера')
@section('content')
    <div class="content-wrapper mt-2">
        <section class="content">
            <div class="row" id="editor">
                <div class="col-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <span class="font-weight-bold">Мастера</span>

                            <div class="card-tools">
                                <a href="{{ route('admin.masters.create') }}"
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
                                    @foreach ($masters as $item)
                                        @include('admin.masters._index_table')
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
    <div id="modal_window" class="modal_wrapper">
        <div class="card modal_content">
            <h3 class="text-center">Подтверждение</h3>
            <form action="/adminex/masters/remove" method="POST"
                class="card-body col justify-between items-center modal_card">
                @csrf
                <h5 class="text-center">
                    Вы уверены, что хотите удалить мастера?

                    <input id="id_input" name="id" type="hidden" value="">
                </h5>
                <div class="row" style="gap: 15px">
                    <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                        Удалить
                    </button>
                    <button id="#closeModal" onclick="closeModal()" type="button" class="btn btn-primary"
                        data-toggle="modal" data-target="#exampleModal">
                        Отмена
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    @include('admin._include.table._properties')
    <script>
        function modalDeleteConfirm(id) {
            document.getElementById("modal_window").style.display = 'flex';
            document.getElementById("id_input").value = id
        }

        function closeModal() {
            document.getElementById("modal_window").style.display = 'none';
        }
    </script>
@endpush
