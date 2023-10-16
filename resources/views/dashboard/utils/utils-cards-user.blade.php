<div class="card">
    <div class="card-body py-4 px-4">
        <div class="d-flex align-items-center">
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div class="avatar avatar-xl">
                <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
            </div>
            @endif
            <div class="ms-3 name">
                <h5 class="font-bold">{{ Auth::user()->name }}</h5>
                <h6 class="text-muted mb-0">{{ Auth::user()->email }}</h6>
            </div>
        </div>
    </div>
</div>