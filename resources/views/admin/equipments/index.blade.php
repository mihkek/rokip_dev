@extends('admin._layout')

@section('title', 'Оборудование')
{{--
<style>
    .modal_wrapper {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 9999999;
        bottom: auto;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        justify-content: center;
        align-items: center;
    }

    .modal_content {
        position: relative;
        width: 500px;
        height: auto;
        min-height: 50px;
        max-height: 400px;
    }

    .modal_card {
        padding: 14px !important;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
</style> --}}

@section('content')
    <div class="content-wrapper mt-2">
        <section class="content">
            <div class="row" id="editor">
                <div class="col-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <span class="font-weight-bold">Оборудование</span>

                            <div class="card-tools">
                                @include('admin.equipments._download')

                                <a href="{{ route('admin.equipments.create') }}"
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
                                    @foreach ($equipments as $item)
                                        @include('admin.equipments._index_table')
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
            <div class="card-body col justify-between items-center modal_card">
                <div id="modal_text" class="text-subtitle2">
                </div>
                <button id="#closeModal" onclick="closeModal()" type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#exampleModal">
                    Закрыть
                </button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @include('admin._include.table._properties')
    <script>
        function showModal(text) {
            document.getElementById("modal_window").style.display = 'flex';
            document.getElementById("modal_text").textContent = text
        }

        function closeModal() {
            document.getElementById("modal_window").style.display = 'none';
        }
    </script>
@endpush
