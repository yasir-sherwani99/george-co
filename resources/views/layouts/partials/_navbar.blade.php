<div class="container my-nav my-nav2">
    <nav class="navbar navbar-expand-md">
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item {{ $pagePath == 'home' ? 'active' : '' }}">
                    <a class="nav-link font-14 me-5 p-0" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item {{ $pagePath == 'about' ? 'active' : '' }}">
                    <a class="nav-link font-14 me-5 p-0" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item {{ $pagePath == 'projects' ? 'active' : '' }}">
                    <a class="nav-link font-14 me-5 p-0" href="{{ route('projects') }}">Projects</a>
                </li>
                <li class="nav-item {{ $pagePath == 'services' ? 'active' : '' }}">
                    <a class="nav-link font-14 me-5 p-0" href="{{ route('services') }}">Services</a>
                </li>
                <li class="nav-item {{ $pagePath == 'contact' ? 'active' : '' }}">
                    <a class="nav-link font-14 p-0" href="{{ route('contact') }}">Contact Us</a>
                </li>
            </ul>
        </div>
    </nav>
</div>