<div>
    @if(Auth::guard('admin')->check())
    <div class="user-info-dropdown">
        <div class="dropdown">
            <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                <span class="user-icon">
                    <img src="{{  Auth::guard('admin')->user()->picture  ?? ""}}" alt="" />
                </span>
                <span class="user-name">
                    {{ Auth::guard('admin')->user()->name ?? ""  }}
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                <a class="dropdown-item" href="{{ route('admin.profile') }}">
                    <i class="dw dw-user1"></i> Profile
                </a>
                <a class="dropdown-item" href="{{ route('admin.settings') }}">
                    <i class="dw dw-settings2"></i> Setting
                </a>
                <a class="dropdown-item" href="faq.html">
                    <i class="dw dw-help"></i> Help
                </a>

                <!-- زر تسجيل الخروج الموحد -->

                <form action="{{route('admin.logout_Handler')}}" method="POST">
                    @csrf
                    <button class="dropdown-item" type="submit">
                        <i class="dw dw-logout"></i> Log Out
                    </button>
                </form>

            </div>
        </div>
    </div>
     @elseif (Auth::guard('seller')->check())

    <div class="user-info-dropdown">
        <div class="dropdown">
            <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                <span class="user-icon">
                    <img src="{{  Auth::guard('seller')->user()->picture  ?? ""}}" alt="" />
                </span>
                <span class="user-name">
                    {{ Auth::guard('seller')->user()->name  }}
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                <a class="dropdown-item" href="{{ route('seller.profile') }}">
                    <i class="dw dw-user1"></i> Profile
                </a>
                <a class="dropdown-item" href="">
                    <i class="dw dw-settings2"></i> Setting
                </a>
                <a class="dropdown-item" href="faq.html">
                    <i class="dw dw-help"></i> Help
                </a>

                <!-- زر تسجيل الخروج الموحد -->

                <form action="{{ route('seller.logout') }}" method="POST">
                    @csrf
                    <button class="dropdown-item" type="submit">
                        <i class="dw dw-logout"></i> Log Out
                    </button>
                </form>

            </div>
        </div>
    </div>
    @endif
</div>
