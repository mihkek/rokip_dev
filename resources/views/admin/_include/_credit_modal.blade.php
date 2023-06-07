@isset($item)
    <a href="#!" class="text-primary" data-toggle="modal" data-target="#modal{{ $item ? $item->id : null }}credit" data-tooltip="tooltip" title="{!! trans('trans.edit') !!}">
        <i class="far fa-edit"></i>
    </a>
@else
    <a class="btn btn-sm btn-success text-white mr-2" data-toggle="modal" data-target="#modalcredit">
        {!! trans('trans.add') !!}
    </a>
@endisset

@include($link)
