<!-- Modal -->
<div class="modal modal-right fade " id="filter">
  <div class="modal-dialog" >
    <div class="modal-content">
      <form action="{{route('admin.jobs.index')}}" method="get">
        
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Filter Jobs</h5>
          
        </div>
        
        <div class="modal-body" style="overflow-y: auto; overflow-x: hidden;">
          
          <div class="form-group">
            <label for="">Job Title</label>
            <input type="text"
            class="form-control" name="title" id="title" value="{{request()->get('title','')}}" aria-describedby="helpId" placeholder="">
          </div>
          
          
          <div class="form-group">
            <label for="category_id">Categories</label>
            <select class="select2" name="category_id" id="category_id">
              <option value="">Select</option>
              @foreach ($categories as $cat_data)
              <option value="{{$cat_data->id}}">{{$cat_data->name}}</option>
              @endforeach
              
            </select>
          </div>

          <div class="form-group">
            <label for="location_id">Locations</label>
            <select class="select2" name="location_id" id="location_id">
              <option value="">Select</option>
              @foreach ($locations as $loc_data)
              <option value="{{$loc_data->id}}">{{$loc_data->name}}</option>
              @endforeach
              
            </select>
          </div>
          
          {{-- <div class="form-group">
            <label for="client_id">Client</label>
            <select class="select2" name="client_id" id="client_id">
              <option value="">Select</option>
              @foreach ($clients as $cli_data)
              <option value="{{$cli_data->id}}">{{$cli_data->name}}</option>
              @endforeach
              
            </select>
          </div> --}}
          
          <div class="row">
            <div class="col-md-12">
              
              <div class="form-group">
                <label for="job_type">Job Type</label>
                <select class="form-control" name="job_type" id="job_type" style="text-transform:capitalize;">
                  @if (request()->get('job_type'))
                  <option value="{{request()->get('job_type','')}}">{{request()->get('job_type','')}}</option>
                  @else
                  <option value="">Select Job Type</option>
                  @endif
                  <option value="Full Time">Full Time</option>
                  <option value="Part Time">Part Time</option>
                  <option value="Remote">Remote</option>
                  <option value="Freelance">Freelance</option>
                </select>
              </div>
            </div>
            
          </div>
          
        </div>
        <div class="modal-footer" style="position: sticky; background-color: white;">
          <a type="button" class="btn btn-default mr-3" href="{{route('admin.jobs.index')}}">Reset</a>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        
      </form>
    </div>
  </div>
</div>