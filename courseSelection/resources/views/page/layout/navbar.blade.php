<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('index') }}">選課系統</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav me-auto mb-2 mb-lg-0">
            </div>
            <div class="navbar-nav ">
                @if (auth()->check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.logout') }}">登出</a>  
                    </li>              
                @else
                    <li class="nav-item">
                        <a class="nav-link{{ (request()->routeIs('user.loginPage')) ? ' active' : '' }}" href="{{ route('user.loginPage') }}">登入</a>  
                    </li>
                @endif
            </div>
        </div>
    </div>
</nav>