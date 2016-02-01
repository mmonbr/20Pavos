<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Gravatar::src(auth()->user()->email) }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->username }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="{{ route('admin.search') }}" method="POST" class="sidebar-form">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ active_class(if_route(['admin.index']), 'active') }}">
                <a href="{{ route('admin.index') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview {{ active_class(if_route_pattern(['admin.categories.*']), 'active') }}">
                <a href="#">
                    <i class="fa fa-cubes"></i> <span>Categories</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ active_class(if_route(['admin.categories.index']), 'active') }}"><a href="{{ route('admin.categories.index') }}"><i class="fa fa-circle-o"></i> Categories</a></li>
                    <li class="{{ active_class(if_route(['admin.categories.create']), 'active') }}"><a href="{{ route('admin.categories.create') }}"><i class="fa fa-circle-o"></i> Add Category</a></li>
                </ul>
            </li>
            <li class="treeview {{ active_class(if_route_pattern(['admin.products.*']), 'active') }}">
                <a href="#">
                    <i class="fa fa-gift"></i> <span>Products</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ active_class(if_route(['admin.products.index']), 'active') }}"><a href="{{ route('admin.products.index') }}"><i class="fa fa-circle-o"></i> Products</a></li>
                    <li class="{{ active_class(if_route(['admin.products.create']), 'active') }}"><a href="{{ route('admin.products.create') }}"><i class="fa fa-circle-o"></i> Add Product</a></li>
                </ul>
            </li>
            <li class="treeview {{ active_class(if_route_pattern(['admin.users.*']), 'active') }}">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Users</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ active_class(if_route(['admin.users.index']), 'active') }}"><a href="{{ route('admin.users.index') }}"><i class="fa fa-circle-o"></i> Users</a></li>
                    <li class="{{ active_class(if_route(['admin.users.create']), 'active') }}"><a href="{{ route('admin.users.create') }}"><i class="fa fa-circle-o"></i> Add User</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>