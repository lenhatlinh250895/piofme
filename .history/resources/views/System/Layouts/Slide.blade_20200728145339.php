<div class="sidebar-inner slimscrollleft" id="sidebar-main">

    <div id="sidebar-menu">
        <ul>
            
            <li class="menu-title">Main</li>
            <li class="">
                <a href="{{ route('Dashbroad.getIndex') }}" class="waves-effect waves-light"><i class="mdi mdi-view-dashboard"></i><span> Dashboard </span> </a>
            </li>
            @if(Auth::user()->level != 0)
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect waves-light"><i class="fa fa-user"></i><span> USER </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ route('system.admin.user.getListUser') }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        LIST USER</a></li>
                    <!-- <li><a href="{{ route('system.admin.user.getAddUser') }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        {{ __('message.Thêm Người Dùng') }}</a></li> -->
                </ul>
            </li>
            @endif   
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-bars"></i><span> SERVICE </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ route('system.admin.category.getListCategory') }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        LIST SERVICE</a></li>
                    <!-- <li><a href="{{ route('system.admin.category.getAddCategory') }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        {{ __('message.Thêm Danh Mục') }}</a></li> -->
                </ul>
            </li>
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-newspaper-o"></i><span> PRODUCT </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ route('system.admin.news.getListNews') }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        LIST PRODUCT</a></li>
                    <!-- <li><a href="{{ route('system.admin.news.getAddNews') }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        {{ __('message.Thêm Tin Tức') }}</a></li> -->
                </ul>
            </li>
            @if(Auth::user()->level != 0)
            <li class="">
                <a href="{{ route('system.admin.footer.getEditFooter') }}" class="waves-effect waves-light"><i class="mdi mdi-table"></i><span> FOOTER </span> </a>
            </li>
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect waves-light"><i class="fa fa-user"></i><span> QUOTE </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ route('system.admin.menu.getListMenu') }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        LIST QUOTE }}</a></li>
                    <!-- <li><a href="{{ route('system.admin.menu.getAddMenu') }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        {{ __('message.Thêm Menu') }}</a></li>
                    <li><a href="{{ route('system.admin.menu.getEditMenuItem') }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    Chỉnh sửa menu</a></li> -->
                </ul>
            </li>
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect waves-light"><i class="fa fa-user"></i><span> INFORMATION QUOTE </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ route('system.admin.menu.getListMenu') }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        LIST INFORMATION QUOTE</a></li>
                    <!-- <li><a href="{{ route('system.admin.menu.getAddMenu') }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        {{ __('message.Thêm Menu') }}</a></li>
                    <li><a href="{{ route('system.admin.menu.getEditMenuItem') }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    Chỉnh sửa menu</a></li> -->
                </ul>
            </li>
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect waves-light"><i class="fa fa-user"></i><span> NEWS </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ route('system.admin.menu.getListMenu') }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        LIST NEWS</a></li>
                    <!-- <li><a href="{{ route('system.admin.menu.getAddMenu') }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        {{ __('message.Thêm Menu') }}</a></li>
                    <li><a href="{{ route('system.admin.menu.getEditMenuItem') }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    Chỉnh sửa menu</a></li> -->
                </ul>
            </li>
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect waves-light"><i class="fa fa-user"></i><span> INFORMATION QUOTE </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ route('system.admin.menu.getListMenu') }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        LIST INFORMATION QUOTE</a></li>
                    <!-- <li><a href="{{ route('system.admin.menu.getAddMenu') }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        {{ __('message.Thêm Menu') }}</a></li>
                    <li><a href="{{ route('system.admin.menu.getEditMenuItem') }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    Chỉnh sửa menu</a></li> -->
                </ul>
            </li>
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect waves-light"><i class="fa fa-user"></i><span> CONTACT </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ route('system.admin.menu.getListMenu') }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        LIST CONTACT</a></li>
                    <!-- <li><a href="{{ route('system.admin.menu.getAddMenu') }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        {{ __('message.Thêm Menu') }}</a></li>
                    <li><a href="{{ route('system.admin.menu.getEditMenuItem') }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    Chỉnh sửa menu</a></li> -->
                </ul>
            </li>
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect waves-light"><i class="fa fa-user"></i><span> MENU </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ route('system.admin.menu.getListMenu') }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        LIST MENU</a></li>
                    <!-- <li><a href="{{ route('system.admin.menu.getAddMenu') }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        {{ __('message.Thêm Menu') }}</a></li>
                    <li><a href="{{ route('system.admin.menu.getEditMenuItem') }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    Chỉnh sửa menu</a></li> -->
                </ul>
            </li>
            <li class="">
                <a href="{{ route('getContact') }}" class="waves-effect waves-light"><i class="fa fa-bars"></i><span> {{ __('message.Contact') }} </span> </a>
                
            </li>
            @endif 
            <li class="">
                <a href="https://vset.chidetest.com/laravel-filemanager?type=image" class="waves-effect waves-light"><i class="fa fa-picture-o"></i><span> {{ __('message.Hình Ảnh') }} </span> </a>
            </li>
        </ul>
    </div>
    <div class="clearfix"></div>
</div>