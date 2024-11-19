<div class="iq-sidebar  sidebar-default ">
    <div class="iq-sidebar-logo d-flex align-items-center justify-content-center">
        <a href="{{ route('client.home.index') }}">
            <img src="{{ asset('admin/assets/images/logoadmin.png') }}" alt="" style="width:150px">
        </a>
        <div class="iq-menu-bt-sidebar ml-0">
            <i class="las la-bars wrapper-menu"></i>
        </div>
    </div>
    <div class="data-scrollbar" data-scroll="1">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="active">
                    <a href="{{ route('admin.home.index') }}" class="svg-icon">
                        <svg class="svg-icon" width="25" height="25" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span class="ml-4">Bảng điều khiển</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('admin.user.index') }}" class="svg-icon">
                        <i class="ri-account-box-fill"></i>
                        <span class="ml-4">Quản lý người dùng</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('admin.menu.index') }}" class="svg-icon">
                        <i class="ri-device-fill"></i>
                        <span class="ml-4">Quản lý menu</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('admin.category.index') }}" class="svg-icon">
                        <i class="ri-device-fill"></i>
                        <span class="ml-4">Quản lý danh mục</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('admin.product.index') }}" class="svg-icon">
                        <i class="ri-device-fill"></i>
                        <span class="ml-4">Quản lý sản phẩm</span>
                    </a>
                </li>

                <li class="">
                    <a href="{{ route('admin.order.index') }}" class="svg-icon">
                        <i class="ri-device-fill"></i>
                        <span class="ml-4">Quản lý đơn hàng</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('admin.post.index') }}" class="svg-icon">
                        <i class="ri-device-fill"></i>
                        <span class="ml-4">Quản lý bài viết</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('admin.contact.index') }}" class="svg-icon">
                        <i class="ri-device-fill"></i>
                        <span class="ml-4">Quản lý liên hệ</span>
                    </a>
                </li>

            </ul>
        </nav>
        <div class="pt-5 pb-2"></div>
    </div>
</div>
