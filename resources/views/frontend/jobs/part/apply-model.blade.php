<div class="modal fade" id="ModalApplyJobForm" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content apply-job-form">
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="modal-body pl-30 pr-30 pt-50">
          <div class="text-center">
            <p class="font-sm text-brand-2">Job Application </p>
            <h4 class="mt-10 mb-5 text-brand-1 text-capitalize" id="modalJobTitle">Job Title Here</h4>
            <p class="font-sm text-muted mb-30">Please fill in your information and send it to the employer.</p>
          </div>
          <form class="login-register text-start mt-20 pb-30" action="{{route('frontend.seeker.jobs.apply')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="job_id" id="dataId" />
            <div class="form-group">
              <label class="form-label" for="input-1">Full Name *</label>
              <input class="form-control" id="input-1" type="text" required name="user_name" placeholder="Kaung Kaung">
            </div>
            <div class="form-group">
              <label class="form-label" for="input-2">Email *</label>
              <input class="form-control" id="input-2" type="email" required name="user_email" placeholder="kaung@gmail.com">
            </div>
            <div class="form-group">
              <label class="form-label" for="number">Contact Number *</label>
              <input class="form-control" id="number" type="text" required name="user_phone" placeholder="(+959) 123 123 1245">
            </div>
            <div class="form-group">
              <label class="form-label" for="des">Cover Letter</label>
             
              <textarea class="form-control"  name="cover_letter" id="" cols="30" rows="30"></textarea>
            </div>
            <div class="form-group">
              <label class="form-label" for="file">Upload Resume</label>
              <input class="form-control" id="file" name="user_cv" type="file" required>
              <p class="form-text text-muted">Only alown 10MB and (PDF, Word) file type.</p>
              
            </div>
            <div class="login_footer form-group d-flex justify-content-between">
              <label class="cb-container">
                <input type="checkbox"><span class="text-small">Agree to our terms and policy</span><span class="checkmark"></span>
              </label><a class="text-muted" href="/">Learn more</a>
            </div>
            <div class="form-group">
              <button class="btn btn-default hover-up w-100" type="submit" name="login">Apply Job</button>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </div>