@if(isset($item) and is_array($item->images) and count(array_filter($item->images)) > 0)
    @foreach($item->images as $image)
        @if($image != null)
            <div class="{{ $col ?? 'col-md-2' }} imgUp">
                <label class="label w-100" data-toggle="tooltip" title="Изменить изображение">
                    <img class="rounded w-100 avatar" data-session-id="" height="250px" src="{{ $item->getImages($loop->index) }}" >
                    <input type="file" class="sr-only input" name="image" accept="image/*">
                    <input type="hidden" class="uploadFile" data-session-id="" name="images[]" value="{{ $item->images[$loop->index] }}">
                </label>
                @if($loop->iteration > $N_Photo)
                    <span class="text-danger DEL" data-toggle="tooltip" title="Удалить фото">
                        <i class="far fa-times-circle"></i>
                    </span>
                @endif
            </div>
        @endif
    @endforeach
@else
    <div class="{{ $col ?? 'col-md-2' }} imgUp">
        <label class="label w-100" data-toggle="tooltip" title="Добавить изображение">
            <img class="rounded w-100 avatar" data-session-id="" height="250px" src="{{ asset('admin/img/no_logo.png') }}" >
            <input type="file" class="sr-only input" name="image" accept="image/*">
            <input type="hidden" class="uploadFile" data-session-id="" name="images[]" value="">
        </label>
    </div>
@endif


@if(isset($addPhoto) and $addPhoto === true)
    <div class="text-primary imgAddNew" data-tooltip="tooltip" data-html="true" title="Добавить фото">
        <i class="fas fa-plus-circle"></i>
    </div>
@endif

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Добавление изображения</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="img-container img-fluid w-100">
                    <img id="image" src="@isset($item){{ $item->getImages() }}@else {{ asset('admin/img/no_logo.png') }} @endisset" class="w-100" width="100%">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="crop">Обрезать</button>
            </div>
        </div>
    </div>
</div>

@push('styles')
    <link rel="stylesheet" href="{{ asset('admin/my_plugins/cropper/cropper.css') }}">
@endpush

@push('scripts')
    <!-- jQuery -->
    {{--    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>--}}
    <script src="{{ asset('admin/my_plugins/cropper/cropper.js') }}"></script>
    <script src="{{ asset('admin/my_plugins/image/upload-image.js') }}"></script>
    <script>
        window.addEventListener('DOMContentLoaded', function () {
            var input = document.querySelectorAll('.input');
            var image = document.getElementById('image');
            var $alert = $('.alert');
            var $modal = $('#modal');
            var cropper;

            $('[data-toggle="tooltip"]').tooltip();

            input.forEach((item) => {
                item.addEventListener('change', function (e) {
                    sessionStorage.setItem('china-avatar', e.currentTarget.parentNode.querySelector('.avatar').getAttribute('data-session-id'));
                    sessionStorage.setItem('china-images', e.currentTarget.parentNode.querySelector('.uploadFile').getAttribute('data-session-id'));
                    var files = e.target.files;
                    var done = function (url) {
                        e.currentTarget.value = '';
                        image.src = url;
                        $alert.hide();
                        $modal.modal('show');
                    };
                    var reader;
                    var file;
                    // var url;

                    if (files && files.length > 0) {
                        file = files[0];

                        if (URL) {
                            done(URL.createObjectURL(file));
                        } else if (FileReader) {
                            reader = new FileReader();
                            reader.onload = function (e) {
                                done(reader.result);
                            };
                            reader.readAsDataURL(file);
                        }
                    }
                });
            })

            $modal.on('shown.bs.modal', function () {
                cropper = new Cropper(image, {
                    aspectRatio: @json($aspectRatio ?? 4/3),
                    zoomable: @json($zoomable ?? true),
                    scrolable: true,
                    autoCropArea: @json($autoCropArea ?? 0), // на всю ли ширину
                    viewMode: @json($viewMode ?? 3),
                    responsive: @json($responsive ?? 0),
                    minContainerWidth: @json($minContainerWidth ?? 400), // минимальная ширина контейнера
                    minContainerHeight: @json($minContainerHeight ?? 300), // минимальная высота контейнера
                });
            }).on('hidden.bs.modal', function () {
                cropper.destroy();
                cropper = null;
            });

            document.getElementById('crop').addEventListener('click', function () {
                // var initialAvatarURL;
                var canvas;

                $modal.modal('hide');

                if (cropper) {
                    canvas = cropper.getCroppedCanvas({
                        width: 800,
                        height: 450,

                    });

                    const avatar = document.querySelector(`img[data-session-id="${sessionStorage.getItem('china-avatar')}"]`);
                    const images = document.querySelector(`input[data-session-id="${sessionStorage.getItem('china-images')}"]`);
                    // initialAvatarURL = avatar.src;
                    avatar.src = canvas.toDataURL();
                    images.value=canvas.toDataURL();
                    console.log(images);
                }
            });

            $(".imgAddNew").click(function () {
                const elem = $(this).closest(".row").find('.imgAddNew').before('' +
                    '<div class="{{ $col ?? 'col-md-2' }} imgUp">' +
                    '<label class="label w-100" data-toggle="tooltip" title="Добавить изображение">' +
                    `<img class="rounded w-100 avatar" height="250px" data-session-id="`
                    +"avatar-"+`${document.querySelectorAll('.imgUp').length}`+
                    `" src="{{ asset('admin/img/no_logo.png') }}" >` +
                    '<input type="file" class="sr-only input" data-session-id="'+
                    '" name="image" accept="image/*">' +
                    '<input type="hidden" class="uploadFile" data-session-id="'+
                    +"uploadFile-"+`${document.querySelectorAll('.imgUp').length}`+
                    '" name="images[]" value="">' +
                    '</label>' +
                    '<span class="text-danger DEL" data-toggle="tooltip" title="Удалить фото">' +
                    '<i class="far fa-times-circle"></i>' +
                    '</span>' +
                    '</div>'
                );

                elem.prev('.imgUp').find('.input').change(function (e) {
                    sessionStorage.setItem('china-avatar', e.currentTarget.parentNode.querySelector('.avatar').getAttribute('data-session-id'));
                    sessionStorage.setItem('china-images', e.currentTarget.parentNode.querySelector('.uploadFile').getAttribute('data-session-id'));
                    var files = e.target.files;
                    var done = function (url) {
                        e.currentTarget.value = '';
                        image.src = url;
                        $alert.hide();
                        $modal.modal('show');
                    };
                    var reader;
                    var file;
                    // var url;

                    if (files && files.length > 0) {
                        file = files[0];

                        if (URL) {
                            done(URL.createObjectURL(file));
                        } else if (FileReader) {
                            reader = new FileReader();
                            reader.onload = function (e) {
                                done(reader.result);
                            };
                            reader.readAsDataURL(file);
                        }
                    }
                });
            });
            $(document).on("click", ".DEL", function () {
                $(this).parent().remove();
            });
        });
    </script>
@endpush
