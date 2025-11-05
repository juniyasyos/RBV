<div class="navbar-top">
    <div class="logo">
        <img src="{{ asset('images/LOGO_RSCH.png') }}" alt="Logo" class="logo-img" />
        <div class="logo-text">
            <div class="main-title">RUANG BACA VIRTUAL</div>
        </div>
    </div>
    <div class="top-buttons">
        @if(in_array($role ?? null, ['Super Admin', 'Admin', 'Sekretariat', 'Member', 'Direktur']))
            <a href="#" class="jelajahi-portal">Layanan</a>
        @endif

        @if($user ?? null)
            <div class="user-dropdown">
                <i class="bx bxs-user-circle user-icon" onclick="toggleUserDropdown()"></i>
                <div class="user-menu" id="userMenu">
                    <a href="#">Profil</a>
                    <a href="#">Data User</a>
                    <a href="#">Logout</a>
                </div>
            </div>
        @else
            <a href="#" class="login-btn">Login</a>
        @endif
    </div>
</div>
