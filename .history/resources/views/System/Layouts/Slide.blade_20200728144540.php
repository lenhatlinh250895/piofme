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
                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-newspaper-o"></i><span> {{ __('message.Tin Tức') }} </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ route('system.admin.news.getListNews') }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        {{ __('message.Danh Sách Tin Tức') }}</a></li>
                    <li><a href="{{ route('system.admin.news.getAddNews') }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        {{ __('message.Thêm Tin Tức') }}</a></li>
                </ul>
            </li>
            @if(Auth::user()->level != 0)
            <li class="">
                <a href="{{ route('system.admin.footer.getEditFooter') }}" class="waves-effect waves-light"><i class="mdi mdi-table"></i><span> {{ __('message.Footer') }} </span> </a>
            </li>
            <li class="">
                <a href="{{ route('system.admin.slide.getSlide') }}" class="waves-effect waves-light"><i class="fa fa-picture-o"></i><span> Banner </span> </a> 
            </li>  
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect waves-light"><i class="fa fa-user"></i><span> {{ __('message.Menu') }} </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ route('system.admin.menu.getListMenu') }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        {{ __('message.Danh Sách Menu') }}</a></li>
                    <li><a href="{{ route('system.admin.menu.getAddMenu') }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        {{ __('message.Thêm Menu') }}</a></li>
                    <li><a href="{{ route('system.admin.menu.getEditMenuItem') }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    Chỉnh sửa menu</a></li>
                </ul>
            </li>
            
            <li class="">
                <a href="{{ route('getContact') }}" class="waves-effect waves-light"><i class="fa fa-bars"></i><span> {{ __('message.Contact') }} </span> </a>
                
            </li>
            @endif 
            <li class="">
                <a href="https://vset.chidetest.com/laravel-filemanager?type=image" class="waves-effect waves-light"><i class="fa fa-picture-o"></i><span> {{ __('message.Hình Ảnh') }} </span> </a>
            </li>
            @if(isset($_GET['test']))
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-bars"></i><span> Langding Pages </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ route('getListLangding') }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        Danh Sách Langding</a></li>
                    <li><a href="{{ route('getAddLangding') }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        Thêm Langding</a></li>
                </ul>
            </li>
            {{--  <li class="">
                <a href="{{ route('system.admin.testmenu') }}" class="waves-effect waves-light"><i class="fa fa-bars"></i><span> Test </span> </a>
                
            </li>  --}}
            @endif
        </ul>
    </div>
    <div class="clearfix"></div>
</div>