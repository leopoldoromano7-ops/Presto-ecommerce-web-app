<nav class="navbar navbar-expand-lg navbar-custom fixed-top shadow-sm">
    <div class="container">
        
        <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('homepage') }}">
            <img src="{{ asset('/logo/logo.png') }}" alt="Logo" class="logo-nav me-2">
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link mt-2" href="{{ route('homepage') }}">{{ __('ui.home') }}</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link mt-2" href="{{ route('announces_index') }}">{{ __('ui.AllAds') }}</a>
                </li>


                @auth
                    <li class="nav-item d-lg-none mt-2">
                        <a class="btn btn-announce w-100 d-flex justify-content-center align-items-center" href="{{ route('announces_create') }}">
                            <i class="fa-solid fa-plus me-2"></i>
                            {{ __('ui.PostAnAd') }}
                        </a>
                    </li>
                @endauth    

            </ul>   
        </div>
        
        <ul class="navbar-nav mb-2 mb-lg-0 d-none d-lg-flex">

            @auth
            <li class="nav-item">
                <a class="btn btn-announce mt-2 me-3 d-flex align-items-center" href="{{ route('announces_create') }}">
                    <i class="fa-solid fa-plus me-2"></i>
                    {{ __('ui.PostAnAd') }}
                </a>
            </li>
            
            <li class="nav-item dropdown mt-2">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle me-2"></i>
                    {{Auth::user()->name}}
                    
                    @if(Auth::user()->is_revisor) 
                    <span class="position-absolute start-25 translate-middle badge p-1 rounded-pill bg-yellow">
                        {{\App\Models\Announce::toBeRevisedCount()}}
                    </span>
                    @endif
                </a>
                
                <ul class="dropdown-menu dropdown-menu-end">
                    @if(Auth::user()->is_revisor)
                    <li>
                        <a class="dropdown-item" href="{{ route('revisors_index') }}">
                            <i class="bi bi-shield-check me-2"></i>{{ __('ui.Revisor') }}
                        </a>
                    </li>
                    @endif
                    
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="bi bi-box-arrow-right me-2"></i>{{ __('ui.logOut') }}
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
            
            @else
            <li class="nav-item dropdown mt-2">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle me-2"></i> {{ __('ui.Login') }}
                </a>
                
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right me-2"></i> {{ __('ui.logIn') }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('register') }}"><i class="bi bi-person-plus me-2"></i>{{ __('ui.Register') }}</a></li>
                </ul>
            </li>
            @endauth 
            
            <li class="nav-item dropdown mt-2">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-globe2"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item d-flex align-items-center" href="#"><x-_locale lang="it" /> IT</a></li>
                    <li><a class="dropdown-item d-flex align-items-center" href="#"><x-_locale lang="uk" /> EN</a></li>
                    <li><a class="dropdown-item d-flex align-items-center" href="#"><x-_locale lang="cn" /> CN</a></li>
                </ul>
            </li>
        </ul>

            {{-- mobile --}}
        <div class="d-lg-none ms-auto">

            <div class="dropdown">
                <a class="nav-link" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle fs-4"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-end">

                    @auth
                    <li class="dropdown-header">
                        {{ Auth::user()->name }}
                    </li>

                    @if(Auth::user()->is_revisor)
                    <li>
                        <a class="dropdown-item d-flex justify-content-between" href="{{ route('revisors_index') }}">
                            <i class="bi bi-shield-check"></i>{{ __('ui.Revisor') }}
                            <span class="badge bg-yellow">
                                {{ \App\Models\Announce::toBeRevisedCount() }}
                            </span>
                        </a>
                    </li>
                    @endif
                    @endauth

                    <li><hr class="dropdown-divider"></li>

                    {{--  LINGUA --}}
                    <li class="dropdown-submenu">
                        <a class="dropdown-item lang-toggle d-flex justify-content-between align-items-center" href="#">
                            <span>
                                <i class="bi bi-globe2 me-2"></i>{{ __('ui.language') }}
                            </span>
                            <i class="bi bi-chevron-right"></i>
                        </a>

                        <ul class="submenu list-unstyled">
                            <li>
                                    <button type="submit"class=" lang-item w-100 {{ app()->getLocale() == 'it' ? 'active' : '' }}">
                                        <x-_locale lang="it" />
                                        <span>Italiano</span>
                                        @if(app()->getLocale() == 'it')
                                            <span class="check">✔</span>
                                        @endif
                                    </button>
                            </li>

                            <li>
                                    <button type="submit"class=" lang-item w-100 {{ app()->getLocale() == 'uk' ? 'active' : '' }}">
                                        <x-_locale lang="uk" />
                                        <span>English</span>
                                        @if(app()->getLocale() == 'uk')
                                            <span class="check">✔</span>
                                        @endif
                                    </button>
                            </li>

                            <li>
                                <button type="submit"class="lang-item lang-item-active w-100 {{ app()->getLocale() == 'cn' ? 'active' : '' }}">
                                    <x-_locale lang="cn" />
                                    <span>漢語</span>
                                    @if(app()->getLocale() == 'cn')
                                    <span class="check">✔</span>
                                    @endif
                                </button>
                            </li>
                            
                        </ul>
                    </li>

                    <li class="lang-divider"></li>
                    
                    @auth
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item">{{ __('ui.logOut') }}</button>
                        </form>
                    </li>
                    @else
                    <li><a class="dropdown-item" href="{{ route('login') }}">{{ __('ui.logIn') }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('register') }}">{{ __('ui.Register') }}</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav>
