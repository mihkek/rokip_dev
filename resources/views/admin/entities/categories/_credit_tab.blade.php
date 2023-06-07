<div class="card-body" style="background-color: #eee">
    <div class="row justify-content-between">
        <div class="col">
            <a href="{{ isset($item) ? route('admin.categories.edit',$item) : route('admin.categories.create') }}" class="btn btn-{{ !isset($_GET['step']) ? '' : 'outline-' }}primary btn-block">
                Home
                @if(isset($is_requireds) && $is_requireds['main'])
                    <span class="text-success ml-4">
                        <i class="fas fa-check"></i>
                    </span>
                @else
                    <span class="text-danger ml-5">
                        <i class="fas fa-times"></i>
                    </span>
                @endif
            </a>
        </div>
        @foreach($langs as $lang)
            <div class="col">
                <a href="{{ isset($item) ? route('admin.categories.edit',['category'=>$item,'step'=>$lang->key]) : '' }}" class="btn btn-{{ isset($_GET['step']) && $_GET['step'] == $lang->key ? '' : 'outline-' }}primary btn-block justify-content-between">
                    <img src="{{ asset('admin/img/png/flag_' . $lang->key . '.png') }}" class="mr-1" width="18px" alt="">
                    {{ $lang->lang() }}
                    @if(isset($is_requireds) && $is_requireds[$lang->key])
                        <span class="text-success ml-4">
                            <i class="fas fa-check"></i>
                        </span>
                    @else
                        <span class="text-danger ml-5">
                            <i class="fas fa-times"></i>
                        </span>
                    @endif
                </a>
            </div>
        @endforeach
    </div>
</div>
