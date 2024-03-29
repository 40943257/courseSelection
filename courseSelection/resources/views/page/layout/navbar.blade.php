<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('index') }}">選課系統</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav me-auto mb-2 mb-lg-0">
                @if (auth()->check())
                    <li class="nav-item">
                        <a class="nav-link{{ request()->routeIs('page.myCurriculumPage') ? ' active' : '' }}"
                            href=" {{ route('page.myCurriculumPage') }} ">我的課表</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->routeIs('page.myCoursePage') ? ' active' : '' }}"
                            href=" {{ route('page.myCoursePage') }} ">我的課程</a>
                    </li>
                    @if (auth()->user()->permissions == 1)
                        <li class="nav-item">
                            <a class="nav-link{{ request()->routeIs('page.courseManagements') ? ' active' : '' }}"
                                href=" {{ route('page.courseManagements') }} ">課程管理</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ request()->routeIs('page.addCoursePage') ? ' active' : '' }}"
                                href=" {{ route('page.addCoursePage') }} ">排課</a>
                        </li>
                    @endif
                    @if (auth()->user()->permissions == 2)
                        <li class="nav-item">
                            <a class="nav-link{{ request()->routeIs('page.searchCoursePage') ? ' active' : '' }}"
                                href=" {{ route('page.searchCoursePage') }} ">選課</a>
                        </li>
                    @endif
                @endif
            </div>
            <div class="navbar-nav ">
                @if (auth()->check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.logout') }}">登出</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link{{ request()->routeIs('user.loginPage') ? ' active' : '' }}"
                            href="{{ route('user.loginPage') }}">登入</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->routeIs('user.signupPage') ? ' active' : '' }}"
                            href="{{ route('user.signupPage') }}">建立帳號</a>
                    </li>
                @endif
            </div>
        </div>
    </div>
</nav>
