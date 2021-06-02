@php
$permissions = Auth::user()->role->permissions;
$permissions = explode(',',$permissions);
@endphp


<!-- Page Sidebar Start-->
    <div class="right-sidebar">
        <div class="sidebar-title">
            <h3 class="weight-600 font-16 text-blue">
                Layout Settings
                <span class="btn-block font-weight-400 font-12">User Interface Settings</span>
            </h3>
            <div class="close-sidebar" data-toggle="right-sidebar-close">
                <i class="icon-copy ion-close-round"></i>
            </div>
        </div>
        <div class="right-sidebar-body customscroll">
            <div class="right-sidebar-body-content">
                <h4 class="weight-600 font-18 pb-10">Header Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
                <div class="sidebar-radio-group pb-10 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="">
                        <label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2">
                        <label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3">
                        <label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
                    </div>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
                <div class="sidebar-radio-group pb-30 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="">
                        <label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2">
                        <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3">
                        <label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="">
                        <label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5">
                        <label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6">
                        <label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
                    </div>
                </div>

                <div class="reset-options pt-30 text-center">
                    <button class="btn btn-danger" id="reset-settings">Reset Settings</button>
                </div>
            </div>
        </div>
    </div>

    <div class="left-side-bar">
        <div class="brand-logo">
            <a href="{{ url('/admin/dashboard') }}">
                <h2 class="light-logo mx-auto text-white" >Shop</h2>
                <h2 class="dark-logo mx-auto text-dark" >Shop</h2>
                
            </a>
            <div class="close-sidebar" data-toggle="left-sidebar-close">
                <i class="ion-close-round"></i>
            </div>
        </div>
        <div class="menu-block customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">

                    @if(in_array("dashboard",$permissions))
                    <li class="dropdown">
                        <a href="{{ url('/admin/dashboard') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
                        </a>

                    </li>
                    @endif

                    @if(in_array("products",$permissions))
                    <li class="dropdown">
                        <a href="{{ url('/admin/products') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-house-1"></span><span class="mtext">Products</span>
                        </a>
                    </li>
                    @endif

                    @if(in_array("categories",$permissions))
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-list"></span><span class="mtext">Categories</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ url('/admin/categories') }}">Categories List</a></li>
                            <li><a href="{{ url('/admin/sub-categories') }}">Sub Categories List</a></li>
                        </ul>
                    </li>
                    @endif
                    @if(in_array("users",$permissions))
                    <li class="dropdown">
                        <a href="{{ url('/admin/users') }}" class="dropdown-toggle no-arrow">
                            <span class="micon  dw dw-user1"></span><span class="mtext">Users</span>
                        </a>
                    </li>
                    @endif
                    @if(in_array("roles",$permissions))
                    <li class="dropdown">
                        <a href="{{ url('/admin/roles') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-settings2"></span><span class="mtext">Roles</span>
                        </a>
                    </li>
                    @endif
                    @if(in_array("promos",$permissions))
                    <li class="dropdown">
                        <a href="{{ url('/admin/promo') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-calendar-8"></span><span class="mtext">Promo Codes</span>
                        </a>
                    </li>
                    @endif
                    @if(in_array("banners",$permissions))
                    <li class="dropdown">
                        <a href="{{ url('/admin/banner') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-image1"></span><span class="mtext">Banners</span>
                        </a>
                    </li>
                    @endif

                    @if(in_array("brands",$permissions))
                    <li class="dropdown">
                        <a href="{{ url('/admin/brand') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-image1"></span><span class="mtext">Brands</span>
                        </a>
                    </li>
                    @endif

                    @if(in_array("reviews",$permissions))
                    <li class="dropdown">
                        <a href="{{ url('/admin/review') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-image1"></span><span class="mtext">Products Reviews</span>
                        </a>
                    </li>
                    @endif

                    @if(in_array("offers",$permissions))
                    <li class="dropdown">
                        <a href="{{ url('/admin/offer') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-image1"></span><span class="mtext">Offers</span>
                        </a>
                    </li>
                    @endif

                    @if(in_array("orders",$permissions))
                    <li class="dropdown">
                        <a href="{{ url('/admin/orders') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-shopping-cart1"></span><span class="mtext">Orders</span>
                        </a>
                    </li>
                    @endif
                    @if(in_array("transactions",$permissions))
                    <li class="dropdown">
                        <a href="{{ url('/admin/transactions') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-money-2"></span><span class="mtext">Transactions</span>
                        </a>
                    </li>
                    @endif
                    @if(in_array("delivery-management",$permissions))
                    <li class="dropdown">
                        <a href="{{ url('/admin/delivery-management') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-time-management"></span><span class="mtext">Delivery Management</span>
                        </a>
                    </li>
                    @endif

                </ul>
            </div>
        </div>
    </div>

        <!-- Page sidebar Ends-->
