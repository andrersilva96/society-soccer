<nav class="navbar navbar-expand-lg navbar-light bg-light py-3">
    <div class="container">
        <x-application-mark class="block h-9 w-auto" />

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active ms-0 ms-lg-3" aria-current="page" href="/">Times</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('players') }}">Jogadores</a>
                </li>
            </ul>
            <form class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><span class="dropdown-item-text">{{ Auth::user()->name }}</span></li>
                            <li><span class="dropdown-item-text">{{ Auth::user()->email }}</span></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('profile.show') }}">Perfil</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</nav>
