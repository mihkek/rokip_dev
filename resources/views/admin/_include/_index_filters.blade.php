<div class="row justify-content-end">
    @php
        $getStatus = isset($_GET['status']) ? "status=" . $_GET['status'] : null;
        if(Route::is('projects.*'))
        {
            $filters = [0=>'Активные проекты',1=>'Архив 1 месяц',3=>'Архив 3 месяца',6=>'Архив 6 месяцев',12=>'Архив 1 год',36=>'Архив 3 года',120=>'Архив 10 лет'];
        }
        elseif(Route::is('bonuses-managers.*','bonuses-account-managers.*'))
        {
            foreach ([0,1,2,3,4,5,6,7,8,9,10,11,12] as $month)
                {
                    $filters[$month] = now()->locale('ru')->addMonth(-$month)->format('M Y');
                }
        }
        else
        {
            $filters = [0=>'текущий месяц',3=>'3 месяца',6=>'6 месяцев',12=>'1 год',36=>'3 года',120=>'10 лет'];
        }
    @endphp
    <div class="col-sm-2">
        <div class="form-group">
            <label>Период</label>
            <select name="period" class="form-control select2bs4" style="width: 100%;" onchange="window.location.href=this.options[this.selectedIndex].value">
                @foreach($filters as $periodKey=>$periodValue)
                    <option value="{{ route($route.'.index',['period'=>$periodKey]) }}" @if((isset($_GET['period']) and $_GET['period'] == $periodKey) or !isset($_GET['period']) and $periodKey == 0) selected @endif>{{ $periodValue }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

