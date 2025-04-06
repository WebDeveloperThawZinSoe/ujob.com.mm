@php
    $currentDate = now();
    $filteredAds = $ads->filter(function ($ad) use ($currentDate, $location) {
        return $ad->location == $location && $currentDate->between($ad->start_date, $ad->end_date);
    });
@endphp

@if ($filteredAds->count() > 0)
    <div id="adsCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($filteredAds as $index => $ad)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <a href="{{ $ad->target_url }}">
                        <img src="{{ asset('ads/' . $ad->image_url) }}" class="d-block w-100" alt="Ad Image">
                    </a>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#adsCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#adsCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
@else
    <div class="container mt-4">
        <a href="#">
            <img src="{{ asset('assets/imgs/ads-demo.png') }}" class="d-block w-100" alt="Default Ad">
        </a>
    </div>
@endif
