
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">

        <a class="navbar-brand" href="{{ route('home') }}">
            My Awesome Site
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNav"
                aria-controls="mainNav"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="mainNav">
            <div class="d-flex flex-column flex-lg-row gap-2">

                <a href="{{ route('home') }}"
                   class="btn btn-sm {{ request()->routeIs('home') ? 'btn-light' : 'btn-outline-light' }}">
                    Home
                </a>

                <a href="{{ route('subjects.index') }}"
                   class="btn btn-sm {{ request()->routeIs('subjects.*') ? 'btn-light' : 'btn-outline-light' }}">
                    All Subjects
                </a>

            </div>
        </div>
    </div>
</nav>
