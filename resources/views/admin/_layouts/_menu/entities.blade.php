<li class="nav-item has-treeview @if(Route::is('*.rubrics.*')) menu-open @else menu-hide @endif">
    <a href="#" class="nav-link @if(Route::is('*.rubrics.*')) active @endif">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Сущности
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview ml-3">
        @include('admin._layouts._nav_item',['route'=>'rubrics','title'=>'Рубрики'])
    </ul>
</li>
