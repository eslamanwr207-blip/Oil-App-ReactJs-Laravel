<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm p-3">
    <div class="container-fluid container">
        <!-- Logo -->

        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav" style="text-align: center">
            <ul class="navbar-nav ms-auto" style="text-align: right" >
                <li class="nav-item"><a class="nav-link" href="/dashboard">{{__('word.home')}}</a></li>
                <li class="nav-item"><a class="nav-link" href="/dashboard/categories">{{__('word.categories')}}</a></li>
                <li class="nav-item"><a class="nav-link" href="/dashboard/products">{{__('word.products')}}</a></li>
                <li class="nav-item"><a class="nav-link" href="/dashboard/orders">{{__('word.orders')}}</a></li>
                <li class="nav-item"><a class="nav-link" href="/dashboard/settings">{{__('word.settings')}}</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        {{ __('word.language') }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('/en/dashboard/') }}">English</a></li>
                        <li><a class="dropdown-item" href="{{ url('/ar/dashboard/') }}">العربية</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
