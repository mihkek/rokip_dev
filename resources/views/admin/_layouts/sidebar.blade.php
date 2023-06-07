@auth
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{ route('home') }}" class="brand-link">
            <span class="mx-3">
                <i class="fas fa-shield-alt"></i>
            </span>
            <span class="brand-text font-weight-light">РОКИП</span>
        </a>

        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            {{--        <div class="user-panel mt-3 pb-3 mb-3 d-flex"> --}}
            {{--            <div class="image"> --}}
            {{--                <img src="/admin/img/AdminLTELogo.png" class="img-circle elevation-2" alt="User Image"> --}}
            {{--            </div> --}}
            {{--            <div class="info"> --}}
            {{--                <a href="#" class="d-block">Alexander Pierce</a> --}}
            {{--            </div> --}}
            {{--        </div> --}}

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    @if (!Auth::user()->hasRole('company'))
                        @include('admin._layouts._nav_item', [
                            'route' => 'companies',
                            'title' => 'Компании',
                            'icon' => '<i class="fas fa-industry"></i>',
                        ])
                    @endif
                    {{--                        @include('admin._layouts._menu.monitoring') <!-- Мониторинг --> --}}
                    @include('admin._layouts._nav_item', [
                        'route' => 'equipments',
                        'title' => 'Оборудование',
                        'icon' => '<i class="fas fa-laptop-code"></i>',
                    ])
                    @include('admin._layouts._nav_item', [
                        'route' => 'masters',
                        'title' => 'Мастера',
                        'icon' => '<i class="fas fa-user-tie"></i>',
                    ])
                    @if (Auth::user()->hasRole(['admin', 'super_admin']))
                        @include('admin._layouts._nav_item', [
                            'route' => 'users',
                            'title' => 'Пользователи',
                            'icon' => '<i class="fas fa-users"></i>',
                        ])
                    @endif

                    {{-- @include('admin._layouts._nav_item',['route'=>'file_equipments','title'=>'Файлы отгрузки','icon'=>'<i class="fas fa-file-csv"></i>'])
                    @include('admin._layouts._nav_item',['route'=>'devices','title'=>'Устройства','icon'=>'<i class="fas fa-tablet-alt"></i>'])
                    <br>

                    @include('admin._layouts._nav_item',['route'=>'brigades','title'=>'Бригады','icon'=>'<i class="fas fa-user-tie"></i>'])

                    <br> --}}
                    {{--            @include('admin._layouts._menu.permissions') <!-- Доступы --> --}}

                    {{-- @include('admin._layouts._nav_item',['route'=>'consumers','title'=>'Потребители','icon'=>'<i class="fas fa-users-cog"></i>'])


                    @if (Auth::user()->hasRole('super_admin'))
                        <br>
                        @include('admin._layouts._nav_item',['route'=>'logs','title'=>'Логи','icon'=>'<i class="fas fa-layer-group"></i>']) <!-- Логи -->
                    @endif --}}
                </ul>
            </nav>
        </div>
    </aside>
@endauth
