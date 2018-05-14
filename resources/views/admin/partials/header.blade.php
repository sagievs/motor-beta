<nav class="navbar navbar-default navbar-fixed-top">
    <div class="brand">
        <h4 style="margin: 0"><a href="{{ route('home') }}">{{ !empty($sitename) ? $sitename : 'Название сайта' }}</a></h4>
    </div>
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>
        {{--<form class="navbar-form navbar-left">--}}
            {{--<div class="input-group">--}}
                {{--<input type="text" value="" class="form-control" placeholder="Search dashboard...">--}}
                {{--<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>--}}
            {{--</div>--}}
        {{--</form>--}}
        @if(Auth::check())
        <div id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-user"></i> <span>{{ Auth::user()->name }}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        {{--<li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>--}}
                        <li><a href="{{ route('admin.logout') }}"><i class="lnr lnr-cross"></i> <span>Выйти</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
        @endif
    </div>
</nav>