<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ Route::is('artikel') ? 'active' : '' }}" href="{{ route('artikel') }}">Artikel</a>
                </li>
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link fw-semibold {{ Route::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                @endif
            </ul>
            <ul class="navbar-nav ms-auto">
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="#" id="logoutButton">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link fw-semibold {{ Route::is('login') ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<script>
    document.getElementById('logoutButton').addEventListener('click', function(event) {
        event.preventDefault(); 
        if (confirm('Apakah Anda yakin ingin logout?')) {
            document.getElementById('logout-form').submit(); 
        }
    });
</script>
