@php
    $this_titles = "fillings";
@endphp
<label>
    Пломбы
</label>
<div class="row">
    <div class="col-md-3 d-none COLS" id="{{ $this_titles }}">
        <div class="row">
            <div class="col pl-2 pr-0 ml-2 mr-0">
                <input type="text" name="fillings[filling][]" class="form-control" placeholder="Пломба"/>
            </div>
            <div class="col-auto p-0 m-0">
                <input type="text" name="fillings[date][]" class="form-control" value="{{ now()->format('d.m.Y') }}" placeholder="Дата" readonly/>
            </div>
            <div class="col-auto pl-0 pr-2 ml-0 mr-2">
                <span class="input-group-text">
                    <a href="#!" onclick="deleteBlock(this, {{ '\''.$this_titles.'\'' }});" class="text-danger"><i class="fas fa-times"></i></a>
                </span>
            </div>
        </div>
    </div>
</div>
<div class="row" id="{{ $this_titles }}_container">
    @if(isset($item) && $item->fillings != null && is_array($item->fillings) && count(array_filter($item->fillings)))
        @foreach(array_filter($item->fillings) as $filling)
            @if(isset($filling['filling']) && $filling['filling'] != null)
                <div class="col-md-3 COLS">
                    <div class="row">
                        <div class="col pl-2 pr-0 ml-2 mr-0">
                            <input type="text" name="fillings[filling][]" value="{{ $filling['filling'] }}" class="form-control" placeholder="Пломба"/>
                        </div>
                        <div class="col-auto p-0 m-0">
                            <input type="text" name="fillings[date][]" class="form-control" value="{{ isset($filling['date']) ? $filling['date'] : now()->format('d.m.Y') }}" placeholder="Дата" readonly/>
                        </div>
                        <div class="col-auto pl-0 pr-2 ml-0 mr-2">
                            <span class="input-group-text">
                                <a href="#!" onclick="deleteBlock(this, {{ '\''.$this_titles.'\'' }});" class="text-danger"><i class="fas fa-times"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @else
        <div class="col-md-3 px-2 COLS">
            <div class="row">
                <div class="col pl-2 pr-0 ml-2 mr-0">
                    <input type="text" name="fillings[filling][]" class="form-control" placeholder="Пломба"/>
                </div>
                <div class="col-auto p-0 m-0">
                    <input type="text" name="fillings[date][]" class="form-control" value="{{ now()->format('d.m.Y H:i') }}" placeholder="Дата" readonly/>
                </div>
                <div class="col-auto pl-0 pr-2 ml-0 mr-2">
                    <span class="input-group-text">
                        <a href="#!" onclick="deleteBlock(this, {{ '\''.$this_titles.'\'' }});" class="text-danger"><i class="fas fa-times"></i></a>
                    </span>
                </div>
            </div>
        </div>
    @endif
</div>
<div id="{{ $this_titles }}_add" class="input-group mb-3 justify-content-start">
    <a href="#!" onclick="duplicate({{ '\''.$this_titles.'\'' }});" class="text-primary">
        Добавить
    </a>
</div>

@push('scripts')
    <script>
        var countBlock = 20;
        function duplicate(blockId){
            let inputs = document.querySelectorAll('#' + blockId + '_container .input-group-text');
            if(inputs.length < countBlock){
                let divContainer = document.getElementById(blockId + '_container');
                let div = document.getElementById(blockId);
                let clone = div.cloneNode(true);
                clone.removeAttribute('id');
                clone.classList.remove('d-none');
                divContainer.append(clone);
                checkCountBlock(blockId);
            }
        }
        function deleteBlock(deleteBtn, blockId){
            deleteBtn.closest('.COLS').remove();
            let inputs = document.querySelectorAll('#' + blockId + '_container .input-group-text');
            if(inputs.length < 1){
                duplicate(blockId);
            }
            checkCountBlock(blockId);
        }
        function checkCountBlock(blockId){
            let inputs = document.querySelectorAll('#' + blockId + '_container .input-group-text');
            if(inputs.length == countBlock) {
                document.getElementById(blockId + '_add').classList.add('d-none');
            } else {
                document.getElementById(blockId + '_add').classList.remove('d-none');
            }
        }

    </script>
@endpush
