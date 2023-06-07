@if(count($filters) > 1)
    <div class="col-sm-auto mx-2">
        <a href="{{ route($route) }}" class="text-danger" data-tooltip="tooltip" title="Очистить фильтры">
            <i class="far fa-window-close fa-2x"></i>
        </a>
    </div>
@endif

@if(array_key_exists('status',$filters))
    <div class="col-sm-auto mx-2">
        <div class="btn-group" data-toggle="dropdown">
            <button type="button" class="btn btn-sm btn-default">
                <span class="ml-1"><i class="fas fa-list-ul"></i></span>
                <span class="mx-3">{{ (isset($_GET['status']) && $statuses->where('id',$_GET['status'])->count()) ? $statuses->where('id',$_GET['status'])->first()->title : 'Все статусы' }}</span>
            </button>
            <button type="button" class="btn btn-sm btn-primary dropdown-toggle">
            </button>
        </div>
        <div class="dropdown-menu dropdown-menu-right" style="">
            <a href="{{ route($route,Helper::get(['status'=>null])) }}" class="dropdown-item @if(!isset($_GET['status']) || !$statuses->where('id',$_GET['status'])->count()) active @endif">Все статусы</a>
            @foreach($statuses as $status)
                <a href="{{ route($route,Helper::get(['status'=>$status->id])) }}" class="dropdown-item @if(isset($_GET['status']) && $_GET['status'] == $status->id) active @endif">{{ $status->title }}</a>
            @endforeach
        </div>
    </div>
@endif

@if(array_key_exists('trigger',$filters))
    <div class="col-sm-auto mx-2">
        <div class="btn-group" data-toggle="dropdown">
            <button type="button" class="btn btn-sm btn-default">
                <span class="ml-1"><i class="fas fa-list-ul"></i></span>
                <span class="mx-3">{{ (isset($_GET['trigger']) && $triggers->where('id',$_GET['trigger'])->count()) ? $triggers->where('id',$_GET['trigger'])->first()->title : 'Все виды сработок' }}</span>
            </button>
            <button type="button" class="btn btn-sm btn-primary dropdown-toggle">
            </button>
        </div>
        <div class="dropdown-menu dropdown-menu-right" style="">
            <a href="{{ route($route,Helper::get(['trigger'=>null])) }}" class="dropdown-item @if(!isset($_GET['trigger']) || !$triggers->where('id',$_GET['trigger'])->count()) active @endif">Все виды сработок</a>
            @foreach($triggers as $trigger)
                <a href="{{ route($route,Helper::get(['trigger'=>$trigger->id])) }}" class="dropdown-item @if(isset($_GET['trigger']) && $_GET['trigger'] == $trigger->id) active @endif">{{ $trigger->title }}</a>
            @endforeach
        </div>
    </div>
@endif

@if(array_key_exists('region',$filters))
    <div class="col-sm-auto mx-2">
        <div class="btn-group" data-toggle="dropdown">
            <button type="button" class="btn btn-sm btn-default">
                <span class="ml-1"><i class="fas fa-globe"></i></span>
                <span class="mx-3">{{ (isset($_GET['region']) && $regions->where('id',$_GET['region'])->count()) ? $regions->where('id',$_GET['region'])->first()->title : 'Все регионы' }}</span>
            </button>
            <button type="button" class="btn btn-sm btn-primary dropdown-toggle">
            </button>
        </div>
        <div class="dropdown-menu dropdown-menu-right" style="">
            <a href="{{ route($route,Helper::get(['region'=>null])) }}" class="dropdown-item @if(!isset($_GET['region']) || !$regions->where('id',$_GET['region'])->count()) active @endif">Все регионы</a>
            @foreach($regions as $region)
                <a href="{{ route($route,Helper::get(['region'=>$region->id])) }}" class="dropdown-item @if(isset($_GET['region']) && $_GET['region'] == $region->id) active @endif">{{ $region->title }}</a>
            @endforeach
        </div>
    </div>
@endif

@if(array_key_exists('dates',$filters))
    <div class="col-sm-auto mx-2">
        <form action="{{ route($route,Helper::get()) }}">
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text text-primary" data-tooltip="tooltip" data-html="true" title="Выберите период и нажмите <i class='fas fa-redo'></i>">
                        <i class="fas fa-filter"></i>
                    </span>
                </div>
                <input type="text" name="filter_ats" class="form-control" id="filter_ats" required>
                <span class="input-group-append">
                    <button type="submit" class="btn btn-primary" data-tooltip="tooltip" title="Нажмите чтобы получить данные за выбранный период">
                        <i class="fas fa-redo"></i>
                    </button>
                </span>
            </div>
        </form>
    </div>
@endif
