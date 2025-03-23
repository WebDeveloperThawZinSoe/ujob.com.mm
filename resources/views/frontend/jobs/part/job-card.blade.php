@php
// Remove HTML tags and special characters from the description
$cleanDescription = strip_tags($data->description);

// Split the cleaned description into an array of words
$descriptionWords = str_word_count($cleanDescription, 1);

// Select the first 20 words from the array
$shortDescription = implode(' ', array_slice($descriptionWords, 0, 10));

$skills = explode(', ', $data->skills);
@endphp
<style>
.card-grid-2 {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    /* Spreads content evenly from top to bottom */
    height: 100%;
    /* Ensures all cards have equal height */
    margin-bottom: 20px !important;
}

.card-block-info {
    flex-grow: 1;
    /* Makes the content expand */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    /* Ensures even spacing */
}

.card-2-bottom {
    margin-top: auto;
    /* Pushes the bottom section down */
}
</style>
<div class="card-grid-2 hover-up">
    <div class="card-grid-2-image-left">
        @if ($data->hightlight == 1)
        <span class="flash"></span>
        @endif

        <div class="image-box"><img src="{{asset('profile/'.$data->employer->user->image)}}" alt="jobBox"
                style="width: 50px"></div>
        <div class="right-info"><a class="name-job"
                href="{{route('frontend.employer.profile',$data->employer->company_name)}}">{{$data->employer->company_name}}</a><span
                class="location-small">{{$data->location->name}}</span></div>
    </div>
    <div class="card-block-info">
        <h6><a href="{{ $jobLink }}">{{$data->title}}</a></h6>
        <div class="mt-5"><span class="card-briefcase">{{$data->job_type}}</span><span
                class="card-time">{{ $data->created_at->diffForHumans() }}</span></div>
        <p class="font-sm color-text-paragraph mt-15" style="min-height: 65px;">{{ $shortDescription }}...</p>
        <div class="mt-30">
            @for ($i = 0; $i < min(3, count($skills)); $i++) <a class="btn btn-grey-small mr-5" href="#">
                {{ $skills[$i] }}</a>
                @endfor
        </div>
        <div class="card-2-bottom mt-30">
            <div class="row">
                @if($data->salary != null)
                <div class="col-lg-7 col-7">
                    <span class="card-text-price">{{ number_format($data->salary) }}</span> Ks
                </div>
                @else
                <div class="col-lg-7 col-7">
                    <span class="text-mute">Negotiate</span>
                </div>
                @endif

                <div class="col-lg-5 col-5 text-end">
                    @auth
                    @can('seeker')
                    @php
                    $currentDate = \Carbon\Carbon::now();
                    $jobDeadline = \Carbon\Carbon::parse($data->deadline);
                    $hasApplied = auth()->user()->appliedJobs->contains($data->id);
                    @endphp

                    @if ($jobDeadline->isFuture() && !$hasApplied)
                    <div class="btn btn-apply-now " data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm"
                        data-bs-jobName="{{ $data->title }}" data-bs-jobId="{{ $data->id }}">Apply now 1</div>
                    @endif
                    
                    @endcan
                    @endauth

                    

                </div>
            </div>
        </div>
    </div>
</div>