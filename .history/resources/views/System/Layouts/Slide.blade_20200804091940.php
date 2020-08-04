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
            <li class="">
                <a href="{{ route('system.service.getListService') }}" class="waves-effect"><i class="fa fa-bars"></i><span> SERVICE </span></a>
            </li>
            <li class="">
                <a href="{{ route('system.product.getListProduct') }}" class="waves-effect"><i class="fa fa-newspaper-o"></i><span> PRODUCT
                    </span></a>
            </li>
            @if(Auth::user()->level != 0)
            <li class="">
                <a href="{{ route('system.admin.footer.getEditFooter') }}" class="waves-effect waves-light"><i
                        class="mdi mdi-table"></i><span> FOOTER </span> </a>
            </li>
            <li class="">
                <a href="{{ route('system.quote.getListQuote') }}" class="waves-effect waves-light"><i class="fa fa-user"></i><span> QUOTE
                    </span></a>
            </li>
            <li class="">
                <a href="{{ route('system.information_quote.getListInformationQuote') }}" class="waves-effect waves-light"><i class="fa fa-user"></i><span> INF QUOTE </span></a>
            </li>
            <li class="">
                <a href="{{ route('system.news.getListNews') }}" class="waves-effect waves-light"><i class="fa fa-user"></i><span> NEWS </span></a>
            </li>
            <li class="">
                <a href="{{route('system.contact.getListContact')}}" class="waves-effect waves-light"><i class="fa fa-user"></i><span> CONTACT </span></a>
            </li>
            <li class="">
                <a href="{{ route('system.menu.getListMenu') }}" class="waves-effect waves-light"><i class="fa fa-user"></i><span> MENU </span></a>
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