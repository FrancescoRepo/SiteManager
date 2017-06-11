<!--sidebar start-->
@if(Auth::user()->usertype_id != 1)
<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li class="active">
                <a href="{{ route('home') }}">
                    <i class="icon_house_alt"></i>
                    <span>Home</span>
                </a>
            </li>

            <li>
                <a href="{{ route('sites') }}" class="">
                    <i class="icon_document_alt"></i>
                    <span>Siti</span>
                </a>
            </li>

            <li>
                <a href="{{ route('search') }}" class="">
                    <i class="icon_search"></i>
                    <span>Ricerca</span>
                </a>
            </li>

            <li>
                <a href="{{ route('setting') }}">
                    <i class="icon_toolbox"></i>
                    <span>Impostazioni</span>
                </a>
            </li>
        </ul>
        <!-- sidebar menu end-->
        <div class="footer">
            SiteManager v 1.00 <br>
            © FourBit
        </div>
    </div>
</aside>
<!--sidebar end-->
@endif
