<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{ route("home") }}">ExpenseTracker</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @if(\Illuminate\Support\Facades\Route::currentRouteName() == "home") active @endif" aria-current="page" href="{{ route("home") }}">Početna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->is("reports")) active @endif" aria-current="page" href="{{ route("reports") }}">Izvještaji</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
