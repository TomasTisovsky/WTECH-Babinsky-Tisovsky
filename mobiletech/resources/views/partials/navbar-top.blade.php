<nav class="main-navbar nav">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 d-flex justify-content-center-sm">

                <ul class="nav navbar-fluid">
                    <li class=" nav-item d-md-inline main-navbar-social">
                        <a href="https://www.instagram.com/">
                            <img src="{{asset("resources/icons/icons8-instagram.svg")}}" alt="ikonka instagram"/>
                        </a>
                    </li>
                    <li class="nav-item d-md-inline main-navbar-social">
                        <a href="https://www.facebook.com/">
                            <img src="{{asset("resources/icons/icons8-facebook.svg")}}" alt="ikonka facebook"/>
                        </a>
                    </li>
                    <li class="nav-item d-md-inline main-navbar-social">
                        <a href="https://www.youtube.com/">
                            <img src="{{asset("resources/icons/icons8-youtube.svg")}}" alt="ikonka youtube"/>
                        </a>
                    </li>
                    <li class="nav-item d-md-inline main-navbar-social">
                        <a href="https://www.tiktok.com/">
                            <img src="{{asset("resources/icons/icons8-tiktok.svg")}}" alt="ikonka tiktok"/>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 d-flex justify-content-end justify-content-center-sm col-sm-12">
                <ul class="navbar-fluid list-no-bullets">
                    <li class="nav-item d-md-inline"><span><img src="{{ asset('resources/icons/phone_icon.svg') }}"
                                                                alt="ikonka telefon"/>0908 156 156</span></li>
                    <li class="nav-item d-md-inline"><span><img
                                src="{{ asset('resources/icons/envelope_email_icon.svg') }}" alt="ikonka email"/><a
                                href="mailto:info@mobiletech.sk" class="nav-top-anchor">info@mobiletech.sk</a></span>
                    </li>
                    <li class="nav-item d-md-inline">
                        <span>
                            <img
                                src="{{ asset('resources/icons/profile_account_user_avatar_icon.svg') }}"
                                alt="ikonka prihlasenie"/>

                            {{-- zdroj: https://laracasts.com/discuss/channels/laravel/breeze-auth-logout-link--}}
                            @auth
                                <a class="nav-top-anchor" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{Auth::user()->name}}</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>

                            @else
                                <a href="/login" class="nav-top-anchor">Prihlásenie</a>
                            @endauth

                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
