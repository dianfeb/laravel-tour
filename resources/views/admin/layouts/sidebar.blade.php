<div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <img src="{{ asset('admin/images/logo.svg') }}" alt="" srcset="">
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class='sidebar-title'>Main Menu</li>
            <li class="sidebar-item ">
                <a href="{{ url('dashboard') }}" class='sidebar-link'>
                    <i data-feather="home" width="20"></i>
                    <span>Dashboard</span>
                </a>
            </li>

           

            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i data-feather="book" width="20"></i>
                    <span>Paket Wisata</span>
                </a>

                <ul class="submenu ">
                    <li>
                        <a href="{{ url('/location') }}">Lokasi Wisata</a>
                    </li>
                    <li>
                        <a href="{{ url('/category') }}">Kategori Wisata</a>
                    </li>
                    <li>
                        <a href="{{ url('/tour') }}">Paket Wisata</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item ">
                <a href="{{ url('/slider') }}" class='sidebar-link'>
                    <i data-feather="user" width="20"></i>
                    <span>Slider</span>
                </a>
            </li>

            <li class="sidebar-item ">
                <a href="{{ url('/article') }}" class='sidebar-link'>
                    <i data-feather="home" width="20"></i>
                    <span>Article</span>
                </a>
            </li>

            <li class="sidebar-title">Pages</li>
            {{-- <li class="sidebar-item ">
                
                <form id="logout-form" action="" method="POST" class="d-none">
                    @csrf
                </form>
                <a class="sidebar-link" href="" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i data-feather="log-out"></i> Logout</a>
            </li> --}}
            
        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
