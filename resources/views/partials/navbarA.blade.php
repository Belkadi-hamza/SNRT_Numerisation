<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand d-flex align-items-center" href="{{ route('home') }}">
            {{-- <img src="{{ asset('img\LOGO\logoRond.png') }}" class="align-center" alt="Logo" style="height: 120px; margin-left: 40px;"> --}}
            {{-- <img src="{{ asset('img\LOGO\logo-snrt.png') }}" class="align-center" alt="Logo" style="height: 60px; margin-right: 10px;"> --}}
            <img src="{{ asset('img\LOGO\logoRond.png') }}" class="align-center" alt="Logo" style="height: 60px; margin-right: 10px;">
            <span class="align-middle">Gestion des ressources multimédiats</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item {{ Request::path() === '/' ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('home') }}">
                    <i class="align-middle" data-feather="home"></i>
                    <span class="align-middle">Home</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::path() === '/search' ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('search') }}">
                    <i class="align-middle" data-feather="search"></i>
                    <span class="align-middle">Recherche</span>
                </a>
            </li>

            <!-- Support Menu -->
            <li class="sidebar-item {{ Request::segment(1) === 'supports' ? 'active' : '' }}">
                <a data-bs-target="#supportMenu" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="disc"></i>
                    <span class="align-middle">Support</span>
                    <i class="align-middle float-end" data-feather="chevron-right"></i>
                </a>
                <ul id="supportMenu" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('supports.index') }}">Liste des supports</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('supports.create') }}">Ajouter support</a></li>
                </ul>
            </li>

            <!-- Type de Support Menu -->
            <li class="sidebar-item {{ Request::segment(1) === 'types_de_support' ? 'active' : '' }}">
                <a data-bs-target="#typeSupportMenu" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="folder"></i>
                    <span class="align-middle">Type de Support</span>
                    <i class="align-middle float-end" data-feather="chevron-right"></i>
                </a>
                <ul id="typeSupportMenu" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('types_de_support.index') }}">Liste des types de support</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('types_de_support.create') }}">Ajouter type de support</a></li>
                </ul>
            </li>

            <!-- Genre Menu -->
            <li class="sidebar-item {{ Request::segment(1) === 'genres' ? 'active' : '' }}">
                <a data-bs-target="#genreMenu" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="book-open"></i>
                    <span class="align-middle">Genre</span>
                    <i class="align-middle float-end" data-feather="chevron-right"></i>
                </a>
                <ul id="genreMenu" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('genres.index') }}">Liste des genres</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('genres.create') }}">Ajouter genre</a></li>
                </ul>
            </li>

            <!-- Technicien Menu -->
            <li class="sidebar-item {{ Request::segment(1) === 'techniciens' ? 'active' : '' }}">
                <a data-bs-target="#technicienMenu" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="users"></i>
                    <span class="align-middle">Technicien</span>
                    <i class="align-middle float-end" data-feather="chevron-right"></i>
                </a>
                <ul id="technicienMenu" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('techniciens.index') }}">Liste des techniciens</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('techniciens.create') }}">Ajouter technicien</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

