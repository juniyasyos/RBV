<nav class="navbar-bottom">
    <div class="navbar-bottom-container">
        <ul>
            <li><a href="{{ route('home') }}" class="fitur-nav">Beranda</a></li>
            <li class="dropdown">
                <a class="fitur-nav" href="javascript:void(0);" onclick="toggleDropdown()">Berita</a>
                <div class="dropdown-content">
                    <a href="https://www.goal.com" target="_blank">Bola</a>
                    <a href="https://sport.detik.com/" target="_blank">Sport</a>
                    <a href="https://www.liputan6.com/showbiz" target="_blank">Showbiz</a>
                    <a href="https://www.viva.co.id/gaya-hidup" target="_blank">LifeStyle</a>
                    <a href="https://www.oto.com/berita" target="_blank">Otomotif</a>
                </div>
            </li>
            <li><a href="#" class="fitur-nav">Koleksi</a></li>

            @if(in_array($role ?? null, ['Super Admin', 'Admin', 'Sekretariat', 'Member', 'Direktur']))
                <li><a href="#" class="fitur-nav">Bacaan</a></li>
            @endif

            @if($canAccessEoffice ?? false)
                <li class="dropdown">
                    <a class="fitur-nav" href="javascript:void(0);">E-Office</a>
                    <div class="dropdown-content">
                        @foreach($allowedEofficePages ?? [] as $slug)
                            <a href="#">{{ $eofficeAll[$slug] ?? $slug }}</a>
                        @endforeach
                    </div>
                </li>
            @endif

            @if(in_array($role ?? null, ['Super Admin', 'Admin', 'Sekretariat', 'Member', 'Direktur']))
                <li><a href="#" class="fitur-nav">Artikel</a></li>
                <li><a href="#" class="fitur-nav">Video</a></li>
            @endif
        </ul>
    </div>
</nav>
