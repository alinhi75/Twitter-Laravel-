<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="{{ Route::is('dashboard') ? 'text-white bg-primary rounded' : ''}} nav-link"
                    href="{{route('dashboard')}}">
                    <span>Home</span></a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::is('feed') ? 'text-white bg-primary rounded' : ''}} nav-link"
                    href="{{route('feed')}}">
                    @section('title', 'Feed')
                    <span>Feed</span></a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::
                        is('terms') ? 'text-white bg-primary rounded' : ''}} nav-link" href="{{ route('terms') }}">
                    <span>Terms</span></a>
            </li>


        </ul>
    </div>
    <div>
        <div class="card-body pt-3">
            <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('lang', 'en') }}">
                        <span>English</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('lang', 'es') }}">
                        <span>Español</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('lang', 'fr') }}">
                        <span>Français</span></a>
                </li>

            </ul>
    </div>
    </div>
</div>
