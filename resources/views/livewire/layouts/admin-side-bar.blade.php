<div>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/" class="brand-link" onclick="$('.loader').show()">
            <img src="{{ asset('admin/img/logo.png') }}" alt="IceDelights Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">IceDelights</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                </div>
                <div class="info">
                    <span class="d-block" style="color: white">{{-- Auth::user()->name --}}</span>
                    <a href="#"><span class="right badge badge-danger">Sair</span></a>
                    @impersonating
                        <a href="{#"><span class="right badge badge-primary">Leave</span></a>
                    @endImpersonating
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">

                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-item {{ request()->is('admin/home*') ? 'menu-open' : '' }}">
                        <a href="{{ route('admin.home') }}" class="nav-link {{ request()->is('admin/home*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Home
                            </p>
                        </a>

                    <li class="nav-header">GESTÃO DE UTILIZADORES</li>

                    <li class="nav-item {{ request()->is('admin/user*') ? 'menu-open' : '' }}">
                        <a href="{{ route('admin.users.index') }}"
                            class="nav-link {{ request()->is('admin/user*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Utilizadores
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">GESTÃO DE PRODUTOS</li>

                    <li class="nav-item {{ request()->is('admin/categories*') ? 'menu-open' : '' }}">
                        <a href="{{ route('admin.categories.index') }}"
                            class="nav-link {{ request()->is('admin/categories*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th-list"></i>
                            <p>
                                categorias
                            </p>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('admin/products*') ? 'menu-open' : '' }}">
                        <a href="{{ route('admin.products.index') }}"
                            class="nav-link {{ request()->is('admin/products*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-box"></i>
                            <p>
                                Produtos
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
</div>
