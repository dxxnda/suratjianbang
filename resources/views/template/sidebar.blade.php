<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{asset ('assets/logoplg.jpeg')}}" alt="profile">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">Staff Jianbang</span>
                    <span class="text-secondary text-small">Hii! Welcome</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/smasuk') }}">
                <span class="menu-title">Surat Masuk</span>
                <i class="mdi mdi-book-plus menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/smasuk/cetak') }}">
                <span class="menu-title"> Cetak Surat Masuk</span>
                <i class="mdi mdi-book menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/skeluar') }}">
                <span class="menu-title">Surat Keluar</span>
                <i class="mdi mdi-book-minus menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/user') }}">
                <span class="menu-title">User</span>
                <i class="mdi mdi-account-key menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>
