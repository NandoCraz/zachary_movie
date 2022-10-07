<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center  me-auto me-lg-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <img src="{{ asset('assets/img/ZachMovieLogo.png') }}" alt="ZachMovie">
            <h1>Zach<sup>Movie</sup></h1>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="/" class="{{ Request::is('/') ? 'active' : '' }}">Home</a></li>
                <li><a href="/genres" class="{{ Request::is('genres') ? 'active' : '' }}">Genres</a></li>
                {{-- <li class="dropdown"><a href="#"><span>Gallery</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="gallery.html">Nature</a></li>
                        <li><a href="gallery.html">People</a></li>
                        <li><a href="gallery.html">Architecture</a></li>
                        <li><a href="gallery.html">Animals</a></li>
                        <li><a href="gallery.html">Sports</a></li>
                        <li><a href="gallery.html">Travel</a></li>
                        <li class="dropdown"><a href="#"><span>Sub Menu</span> <i
                                    class="bi bi-chevron-down dropdown-indicator"></i></a>
                            <ul>
                                <li><a href="#">Sub Menu 1</a></li>
                                <li><a href="#">Sub Menu 2</a></li>
                                <li><a href="#">Sub Menu 3</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}
                <li><a href="/best-movie" class="{{ Request::is('best-movie') ? 'active' : '' }}">Best Movie</a></li>
                <li><a href="/movies" class="{{ Request::is('movies') ? 'active' : '' }}">All Movies</a></li>
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Halo, {{ auth()->user()->username }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/dashboard">Dashboardku</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-light" data-toggle="modal">
                                        {{-- <i class="fas fa-sign-out-alt"></i> --}}
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
            </ul>
        </nav><!-- .navbar -->

        <div class="header-social-links">
            <form action="" method="GET"
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    @if (request('genre'))
                        <input type="hidden" class="form-control bg-light border-0 small" name="genre"
                            value="{{ request('genre') }}">
                    @endif
                    @if (request('user'))
                        <input type="hidden" class="form-control bg-light border-0 small" name="user"
                            value="{{ request('user') }}">
                    @endif
                    <input type="text" class="form-control bg-light border-0 small" name="cari"
                        placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-light" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>

            @guest
                <a href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            @endguest

            {{-- <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a> --}}
        </div>
        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
</header>
