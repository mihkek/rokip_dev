@php
    $is_true = isset($_GET[$name]) && $_GET[$name] != null;
@endphp
<div class="row {{ $bg ?? null }}">
    <div class="col-md-4 align-middle text-truncate">
{{--        <span class="ml-1 mr-2 mt-3">--}}
{{--            <i class="fas fa-eye-slash"></i>--}}
{{--        </span>--}}
        <span class="@if($is_true) text-danger font-weight-bold @endif mt-3">
            {{ $title }}
        </span>
    </div>
    <div class="col">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" name="{{ $name }}" id="{{ $name }}" placeholder="Введите данные" value="{{ $_GET[$name] ?? null }}" list="list_{{ $name }}">
                @isset($lists)
                    <datalist id="list_{{ $name }}">
                        @foreach($lists as $list)
                            <option value="{{ $list }}">
                        @endforeach
                    </datalist>
                @endisset
            </div>
{{--            <div class="col-auto align-middle">--}}
{{--                <div class="form-group clearfix mt-2 mb-0">--}}
{{--                    <div class="icheck-primary d-inline" data-tooltip="tooltip" data-html="true" title="Сортировать по убываю">--}}
{{--                        <input type="radio" id="{{ $name }}_down" name="sort" value="{{ $name }}_down" @if(isset($_GET['sort']) && $_GET['sort'] == $name . '_down') checked @endif>--}}
{{--                        <label for="{{ $name }}_down">--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                    <span class="mr-2">--}}
{{--                        <i class="fas fa-long-arrow-alt-down"></i>--}}
{{--                        <i class="fas fa-long-arrow-alt-up"></i>--}}
{{--                    </span>--}}
{{--                    <div class="icheck-primary d-inline" data-tooltip="tooltip" data-html="true" title="Сортировать по возрастанию">--}}
{{--                        <input type="radio" id="{{ $name }}_up" name="sort" value="{{ $name }}_up" @if(isset($_GET['sort']) && $_GET['sort'] == $name . '_up') checked @endif>--}}
{{--                        <label for="{{ $name }}_up">--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
