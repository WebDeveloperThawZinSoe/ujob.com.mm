@php
    $currentDate = now();
    $countAds = 0;
@endphp

@foreach($ads as $ad)
    @if($ad->location == $location )
        @if($currentDate->between($ad->start_date, $ad->end_date))
            <div class="container mt-4">
                <a href="{{ $ad->target_url }}">
                    <img src="{{ asset('ads/' . $ad->image_url) }}" alt="">
                </a>
            </div>
            @php
                $countAds = 1;
            @endphp
        
        @endif
    @endif
@endforeach
@if ($countAds == 0)
    <div class="container mt-4">
        <a href="{{ $ad->target_url }}">
            <img src="{{ asset('assets/imgs/ads-demo.png') }}" alt="">
        </a>
    </div>
@endif
