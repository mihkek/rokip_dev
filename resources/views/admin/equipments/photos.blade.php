@extends('admin._layout')


@section('title', 'Фото')


<style>
    .photo_wrapper {
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

    .photo_content {
        position: relative;
        width: 70vw;
        height: auto;
        min-height: 100px;
        max-height: 90vh;
    }

    .photo_card {
        padding: 14px !important;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .photo_img {
        object-fit: contain;
    }
</style>

@section('content')
    <div class="content-wrapper mt-2">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card-header">
                        <a href="{{ route('admin.equipments.index') }}" class="text-primary mr-2" data-tooltip="tooltip"
                            data-html="true" title="Вернуться к списку">
                            <i class="fas fa-angle-double-left"></i>
                        </a>
                        <span class="font-weight-bold">
                            К оборудованию</span>

                        <div class="card-tools">

                        </div>
                    </div>
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <span class="font-weight-bold">Фото оборудования. Заводской № {{ $factory_number }}</span>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class='list-group gallery'>


                                    @if ($photos->count())
                                        @foreach ($photos as $photo)
                                            <div onclick="showPhoto('{{ $photo->url }}')"
                                                class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                                                <a class="thumbnail fancybox" style="cursor: pointer" rel="ligthbox">
                                                    <img class="img-responsive" alt="" src="{{ $photo->url }}" />
                                                </a>
                                            </div> <!-- col-6 / end -->
                                        @endforeach
                                    @else
                                        <h4 class="ml-4">Фото для данного оборудования не загружены</h4>
                                    @endif


                                </div> <!-- list-group / end -->
                            </div> <!-- row / end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div id="photo_window" class="photo_wrapper">
        <div class="card photo_content">
            <div class="card-body col justify-between items-center photo_card">
                <div id="photo_text" class="text-subtitle2">
                </div>
                <img id="photo_src" class="img-responsive photo_img" alt="" src="" />
                <button id="#closephoto" onclick="closePhoto()" type="button" class="btn btn-primary mt-2"
                    data-toggle="photo" data-target="#examplephoto">
                    Закрыть
                </button>
            </div>
        </div>
    </div>
@endsection

<script>
    function showPhoto(url) {
        document.getElementById("photo_window").style.display = 'flex';
        document.getElementById("photo_src").src = url
    }

    function closePhoto() {
        document.getElementById("photo_window").style.display = 'none';
    }
</script>

@push('scripts')
    @include('admin._include.table._properties')
@endpush
