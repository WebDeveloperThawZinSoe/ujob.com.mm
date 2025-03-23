@php
                        // Remove HTML tags and special characters from the description
                        $cleanDescription = strip_tags($data->description);

                        // Split the cleaned description into an array of words
                        $descriptionWords = str_word_count($cleanDescription, 1);

                        // Select the first 20 words from the array
                        $shortDescription = implode(' ', array_slice($descriptionWords, 0, 10));
                    @endphp

                    <div class="col-xl-12 col-12">
                        <div class="card-grid-2 hover-up">
                          @if ($data->hightlight == 1)
                            <span class="flash"></span>
                          @endif
                          <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <div class="card-grid-2-image-left">
                                <div class="image-box"><img style="width: 50px" src="{{asset('profile/'.$data->employer->user->image)}}" alt="jobBox"></div>
                                <div class="right-info"><a class="name-job" href="{{route('frontend.employer.profile',$data->employer->company_name)}}">{{$data->employer->company_name}}</a><span class="location-small">{{$data->location->name}}</span></div>
                              </div>
                            </div>
                            <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
                              <div class="pl-15 mb-15 mt-30">
                                @foreach(explode(', ', $data->skills) as $skill)
                                    <a class="btn btn-grey-small mr-5" href="#">{{ $skill }}</a>
                                @endforeach
                            </div>
                            </div>
                          </div>
                          <div class="card-block-info">
                            <h4><a href="{{$jobLink}}">{{$data->title}}</a></h4>
                            <div class="mt-5">
                                <span class="card-briefcase">{{$data->job_type}}</span>
                                <span class="card-time"><span>{{ $data->created_at->diffForHumans() }}</span></span></div>
                            <p class="font-sm color-text-paragraph mt-10">{{ $shortDescription }}...</p>
                            <div class="card-2-bottom mt-20">
                              <div class="row">
                                <div class="col-lg-7 col-7"><span class="card-text-price">{{$data->salary}}</span>  Month</div>
                                <div class="col-lg-5 col-5 text-end">
                                  @auth
                                  @can('seeker')
                                      @php
                                          $currentDate = \Carbon\Carbon::now();
                                          $jobDeadline = \Carbon\Carbon::parse($data->deadline);
                                          $hasApplied = auth()->user()->appliedJobs->contains($data->id);
                                      @endphp
                      
                                      @if ($jobDeadline->isFuture() && !$hasApplied)
                                          <div class="btn btn-apply-now " data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm" data-bs-jobName="{{ $data->title }}" data-bs-jobId="{{ $data->id }}">Apply now</div>
                                      @endif
                                  @endcan
                                @endauth
                                @guest 
                <a href="/login" class="btn btn-apply-icon btn-apply btn-apply-big hover-up btn-apply-now" style="color:white !important;">Login First</a>
                @endguest
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>