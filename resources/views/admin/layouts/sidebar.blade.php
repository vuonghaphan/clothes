<aside>
    <div id="sidebar" class="nav-collapse ">
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered">
                <a href="profile.html"><img src="{{asset('assets/admin/img/ui-sam.jpg')}}" class="img-circle" width="80"></a>
            </p>
            <h5 class="centered">Sam Soffes</h5>
            <li class="">
                <a class="{{ (Request::is('admin') ? 'active' : '') }}" href="{{ route('admin.home') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            @can('category_list')
            <li class="sub-menu">
                <a class="{{ (Request::is('admin/category') ? 'active' : '') }}" href="{{ route('category.index') }}">
                    <i class="fa fa-th"></i>
                    <span>Danh mục</span>
                </a>
            </li>
            @endcan

            {{-- <li class="sub-menu">
                <a href="productType.html">
                    <i class="fa fa-th"></i>
                    <span>Loại sản phẩm</span>
                </a>
            </li> --}}

            @can('product_list')
            <li class="sub-menu">
                <a class="{{ (Request::is('admin/product') ? 'active' : '') }}" href="{{ route('product.index') }}">
                    <i class="fa fa-th"></i>
                    <span>Sản phẩm</span>
                </a>
            </li>
            @endcan

            <li class="sub-menu">
                <a class="{{ (Request::is('admin/product/add-image') ? 'active' : '') }}" href="{{ route('product.create.image') }}">
                    <i class="fa fa-th"></i>
                    <span>Thêm ảnh Sản phẩm</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="">
                    <i class="fa fa-th"></i>
                    <span>Đơn hàng</span>
                </a>
            </li>

            @can('member_list')
            <li class="sub-menu">
                <a class="{{ (Request::is('admin/member') ? 'active' : '') }}" href="{{ route('member.index') }}">
                    <i class="fa fa-th"></i>
                    <span>Thành viên</span>
                </a>
            </li>
            @endcan

            @can('role_list')
            <li class="sub-menu">
                <a class="{{ (Request::is('admin/role') ? 'active' : '') }}" href="{{ route('role.index') }}">
                    <i class="fa fa-th"></i>
                    <span>Danh sách vai trò</span>
                </a>
            </li>
            @endcan

            @can('permission_list')
            <li class="sub-menu">
                <a class="{{ (Request::is('admin/permission') ? 'active' : '') }}" href="{{ route('permission.index') }}">
                    <i class="fa fa-th"></i>
                    <span>Danh sách quyền</span>
                </a>
            </li>
            @endcan
        </ul>
    </div>
</aside>

