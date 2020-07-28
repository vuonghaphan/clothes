<aside>
    <div id="sidebar" class="nav-collapse ">
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered">
                <a href="profile.html"><img src="{{asset('assets/admin/img/ui-sam.jpg')}}" class="img-circle" width="80"></a>
            </p>
            <h5 class="centered">Sam Soffes</h5>
            <li class="mt">
                <a class="active" href="index.html">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="{{ route('category.index') }}">
                    <i class="fa fa-th"></i>
                    <span>Danh mục</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="productType.html">
                    <i class="fa fa-th"></i>
                    <span>Loại sản phẩm</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="{{ route('product.index') }}">
                    <i class="fa fa-th"></i>
                    <span>Sản phẩm</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="#">
                    <i class="fa fa-th"></i>
                    <span>Đơn hàng</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="{{ route('member.index') }}">
                    <i class="fa fa-th"></i>
                    <span>Thành viên</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="{{ route('role.index') }}">
                    <i class="fa fa-th"></i>
                    <span>Danh sách vai trò</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="{{ route('permission.index') }}">
                    <i class="fa fa-th"></i>
                    <span>Danh sách quyền</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
