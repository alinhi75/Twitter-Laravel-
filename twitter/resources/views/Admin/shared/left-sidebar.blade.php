<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="{{ Route::is('admin.dashboard') ? 'text-white bg-primary rounded' : ''}} nav-link"
                    href="{{route('admin.dashboard')}}">
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item">
                <a class="{{ Route::is('admin.users') ? 'text-white bg-primary rounded' : ''}} nav-link"
                    href="{{route('admin.users')}}">
                    <span>users</span></a>
            </li>

        </ul>
    </div>
</div>
