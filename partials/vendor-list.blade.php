@foreach ($vendorlists as $vendor)
<div class="col-md-4">
    <div class="card custom-card" style="cursor:pointer">
        <a href="{{ route('frontend.details', ['id' => $vendor->id]) }}" target="_blank">
            @if ($vendor->userServiceGalleries->isNotEmpty() && $vendor->userServiceGalleries->first()->media_link)
            <img class="card-img" src="{{ asset('img/image/' . $vendor->userServiceGalleries->first()->media_link) }}"
                alt="Service Image">
            @else
            <img class="card-img" src="{{ asset('img/image/dummy.png') }}" alt="Dummy Image">
            @endif

            <div class="w-100 mt-2 mb-1">
                <div class="card-top d-flex justify-content-between">
                    <h5>{{ $vendor->title }}</h5>
                </div>
                <span>
                    <i class="bi bi-geo-alt-fill">&nbsp;</i>
                    {{ $vendor->location ?? 'Unknown Location' }}
                </span>
            </div>

            <span class="price mt-2" style="font-size: 18px;">₹
                {{ number_format($vendor->price, 2) }}</span>
            <div class="tags d-flex align-items-center">
                @if ($vendor->is_freelance)
                <p title="Freelance Artist">Freelance Artist</p>
                @endif
                @if ($vendor->offers_trial)
                <p title="Offers Paid Trial">Offers Paid Trial</p>
                @endif
            </div>
        </a>
    </div>
</div>
@endforeach

@if ($vendorlists->hasMorePages())
<div class="text-center mt-3">
    <button id="load-more" class="btn btn-primary" data-page="{{ $vendorlists->currentPage() + 1 }}"
        style="background-color: #dc3545; border-color: #dc3545;">Load More</button>
</div>

@endif

<style>
    .card-img {
    width: 100%; /* Ensures the image takes the full width of the card */
    height: 200px; /* Set a fixed height */
    object-fit: cover; /* Ensures images maintain aspect ratio while covering the area */
    border-radius: 5px; /* Optional: Adds a slight border radius for aesthetics */
}

</style>

