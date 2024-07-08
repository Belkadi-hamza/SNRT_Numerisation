<main class="d-flex w-100">
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-breadcrumb ps-3 py-2 rounded">
                        <li class="breadcrumb-item item">
                            <a class="item" href="{{ route('home') }}">Home</a>
                        </li>

                        @if (Request::segment(1) != null && Request::segment(2) == null)
                            <li class="breadcrumb-item item" aria-current="page">
                                {{ ucfirst(Request::segment(1)) }}
                            </li>
                        @else
                            {{-- @if (Request::segment(1) != null && Request::segment(2) != null)
                                <li class="breadcrumb-item item" aria-current="page">
                                    <a class="item"
                                        href="{{ route(Request::segment(1) . '.index') }}">{{ ucfirst(Request::segment(1)) }}</a>
                                </li>
                            @endif --}}

                            @if (Route::has(Request::segment(1) . '.index'))
                                <li class="breadcrumb-item item" aria-current="page">
                                    <a class="item" href="{{ route(Request::segment(1) . '.index') }}">
                                        {{ ucfirst(Request::segment(1)) }}
                                    </a>
                                </li>
                                
                            @else
                            <li class="breadcrumb-item item" aria-current="page">
                                {{ ucfirst(Request::segment(1)) }}
                            </li>
                            @endif
                        @endif

                        @if (Request::segment(2) != null && Request::segment(2) === 'profile')
                            <li class="breadcrumb-item item2">
                                <a class="item" href="#">Profile</a>
                            </li>
                        @elseif (Request::segment(2) != null && Request::segment(2) !== 'profile')
                            <li class="breadcrumb-item item2" aria-current="page">{{ ucfirst(Request::segment(2)) }}
                            </li>
                        @endif

                        @if (Request::segment(3) != null && Request::segment(3) === 'edit')
                            <li class="breadcrumb-item item2">
                                <a class="item" href="#">Pro Edit</a>
                            </li>
                        @elseif (Request::segment(3) != null && Request::segment(3) !== 'edit')
                            <li class="breadcrumb-item item2" aria-current="page">{{ ucfirst(Request::segment(3)) }}
                            </li>
                        @endif
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</main>
