<div class="sidebar-inner slimscrollleft" id="sidebar-main">

    <div id="sidebar-menu">
        <ul>

            <li class="menu-title">Main</li>
            <li class="">
                <a href="{{ route('Dashbroad.getIndex') }}" class="waves-effect waves-light"><i
                        class="mdi mdi-view-dashboard"></i><span> Dashboard </span> </a>
            </li>
            @if(Auth::user()->level != 0)
            <li class="">
                <a href="{{ route('system.user.getListUser') }}" class="waves-effect waves-light"><i class="fa fa-user"></i><span> USER
                    </span></a>
            </li>
            @endif
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-bars"></i><span> SERVICE </span>
                    <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ route('system.service.getListService') }}"><i class="fa fa-long-arrow-right"
                                aria-hidden="true"></i>LIST SERVICE</a></li>
                </ul>
            </li>
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-newspaper-o"></i><span> PRODUCT
                    </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ route('system.product.getListProduct') }}"><i class="fa fa-long-arrow-right"
                                aria-hidden="true"></i>LIST PRODUCT</a></li>
                </ul>
            </li>
            @if(Auth::user()->level != 0)
            <li class="">
                <a href="{{ route('system.admin.footer.getEditFooter') }}" class="waves-effect waves-light"><i
                        class="mdi mdi-table"></i><span> FOOTER </span> </a>
            </li>
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect waves-light"><i class="fa fa-user"></i><span> QUOTE
                    </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ route('system.quote.getListQuote') }}"><i class="fa fa-long-arrow-right"
                                aria-hidden="true"></i>LIST QUOTE</a></li>
                </ul>
            </li>
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect waves-light"><i class="fa fa-user"></i><span> INF
                        QUOTE </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ route('system.information_quote.getListInformationQuote') }}"><i
                                class="fa fa-long-arrow-right" aria-hidden="true"></i>LIST INF QUOTE</a></li>
                </ul>
            </li>
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect waves-light"><i class="fa fa-user"></i><span> NEWS
                    </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ route('system.news.getListNews') }}"><i class="fa fa-long-arrow-right"
                                aria-hidden="true"></i>LIST NEWS</a></li>
                </ul>
            </li>
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect waves-light"><i class="fa fa-user"></i><span> CONTACT
                    </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{route('system.contact.getListContact')}}"><i class="fa fa-long-arrow-right"
                                aria-hidden="true"></i>LIST
                            CONTACT</a></li>
                </ul>
            </li>
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect waves-light"><i class="fa fa-user"></i><span> MENU
                    </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ route('system.menu.getListMenu') }}"><i class="fa fa-long-arrow-right"
                                aria-hidden="true"></i>LIST MENU</a></li>
                </ul>
            </li>
            @endif
            <li class="">
                <a href="{{asset('')}}laravel-filemanager?type=image" target="_blank"
                    class="waves-effect waves-light"><i class="fa fa-picture-o"></i><span> IMAGES </span> </a>
            </li>
        </ul>
    </div>
    <div class="clearfix"></div>
</div>