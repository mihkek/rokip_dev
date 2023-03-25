<li class="nav-item has-treeview @if(Route::is('*.equipments.*')) menu-open @else menu-hide @endif">
    <a href="#" class="nav-link @if(Route::is('*.equipments.*')) active @endif">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Мониторинг
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview ml-3">
        @include('admin._layouts._nav_item',['route'=>'equipments','title'=>'Оборудование','icon'=>'<i class="fas fa-laptop-code"></i>'])
        @include('admin._layouts._nav_item',['route'=>'devices','title'=>'Устройства','icon'=>'<i class="fas fa-tablet-alt"></i>'])
    </ul>
</li>
