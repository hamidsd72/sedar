
@if (Auth::user() && Auth::user()->first_name && Auth::user()->last_name)

    <div id="footer-bar" class="footer-bar-1" >
        <a href="{{ route('user.contact.show') }}" class="{{ \Request::route()->getName() == 'user.contact.show' ? 'active-nav' : '' }}">
            {{-- <i class="fa fa-star"></i> --}}
            <i class="fa fa-info-circle"></i><span>درباره ما</span></a>
        <a href="{{ route('user.packages') }}" class="{{ \Request::route()->getName() == 'user.packages' ? 'active-nav' : '' }}">
            {{-- <i class="fa fa-eye"></i> --}}
            <i class="fa fa-users"></i><span>کارگاه ها</span></a>
        <a href="{{ route('user.index') }}" class="{{ \Request::route()->getName() == 'user.index' ? 'active-nav' : '' }}">
            <div class="home_route">
                <i class="fa fa-home" style="font-size: 24px;"></i><span style="font-size: 14px;">خانه</span>
            </div>
        </a>
        {{-- <a href="{{ route('user.services') }}" class="{{ \Request::route()->getName() == 'user.services' ? 'active-nav' : '' }}"><i class="fa fa-list-alt"></i><span>خدمات</span></a> --}}
        <a href="{{ route('user.tickets') }}" class="{{ \Request::route()->getName() == 'user.tickets' ? 'active-nav' : '' }}">
            <i class="fa fa-list-alt"></i><span>تیکت</span>
        </a>
        @if(auth()->check())
            <a href="{{ route('admin.profile.show') }}" class="{{ \Request::route()->getName() == 'admin.profile.show' ? 'active-nav' : '' }}" data-menu="menu-settings">
                <i class="fa fa-user"></i><span>پروفایل</span></a>
        @else
            <a href="{{ route('login') }}" class="{{ \Request::route()->getName() == 'login' ? 'active-nav' : '' }}" data-menu="menu-settings">
                <i class="fa fa-lock"></i><span>ورود</span></a>
        @endif
    </div>

@endif
