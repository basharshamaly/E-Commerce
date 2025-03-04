<div>
    <div class="user-info-dropdown">
        <div class="dropdown">
            <a
                class="dropdown-toggle"
                href="#"
                role="button"
                data-toggle="dropdown"
            >
                <span class="user-icon">
                    <img src="{{Auth::guard('admin')->user()->picture}}" alt="" />
                </span>
                <span class="user-name">{{ Auth::user()->name ?? "" }}</span>
            </a>
            <div
                class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
            >
                <a class="dropdown-item" href="{{ route('admin.profile') }}"
                    ><i class="dw dw-user1"></i> Profile</a
                >
                <a class="dropdown-item" href="{{ route('admin.settings') }}"
                    ><i class="dw dw-settings2"></i> Setting</a
                >
                <a class="dropdown-item" href="faq.html"
                    ><i class="dw dw-help"></i> Help</a
                >
                <form action="{{ route('admin.logout_Handler') }}" method="POST">
                    @csrf
                    @if(session('success'))
                    <div class="alert alert-success">
                       {{session::get('success')}}
                       <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                       </button>
                    </div>
                    @endif
                <button class="dropdown-item" type="submit"
                    ><i class="dw dw-logout"></i> Log Out</button>
                </form>

            </div>
        </div>
    </div>

</div>
