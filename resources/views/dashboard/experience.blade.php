@extends('layouts.dashboard')

@section('title', 'Experience')

@section('experience-active', 'active')

@section('content')
  <div class="container">

    <div class="row ">

      <div class="col-lg-7 mx-auto">
        <div class="card mt-2 mx-auto p-4 bg-light">
          <div class="card-body bg-light">
            <div class="container">

              <form action="{{ route('experience.update', 1) }}" id="contact-form"
                role="form" method="POST">
                @csrf
                @method('put')
                {{-- <form  method="POST"></form> --}}
                <div class="controls">
                  <div class="controls">
                    <div class="row mb-2">
                      <div class="col-6">Experience</div>
                      <div class="col-4">Date</div>
                    </div>
                    @foreach ($experiences as $experience)
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <input id="form_name"
                              @if (@isset($experience['info'])) value="{{ $experience['info'] }}" @endif
                              type="text"
                              name="experience-{{ $experience['id'] }}"
                              class="form-control"
                              placeholder="Please enter your experience title *"
                              required="required"
                              data-error="Experience title is required.">

                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <input id="form_date"
                              @if (@isset($experience['date'])) value="{{ explode(' ', $experience['date'])[0] }}" @endif
                              type='date' name="date-{{ $experience['id'] }}"
                              class="form-control" placeholder="Enter the date *"
                              required="required" data-error="Date is required.">
                          </div>
                        </div>
                        <div class="col-2">
                          <div class="form-group">
                            <button type="button"
                              onclick="changeAction({{ $experience['id'] }})"
                              class="btn btn-danger text-white"
                              data-toggle="modal" data-target="#exampleModal">
                              &#x2715;
                            </button>
                          </div>
                        </div>
                      </div>
                    @endforeach
                    @for ($i = 0; $i < $count; $i++)
                      <div class="row" id="temp-row-{{ $i }}">
                        <div class="col-6">
                          <div class="form-group">
                            <input id="form_name" type="text"
                              name="experience-new-{{ $i }}"
                              class="form-control"
                              placeholder="Please enter your experience title *"
                              required="required"
                              data-error="Experience title is required.">

                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <input id="form_date" type="date"
                              name="date-new-{{ $i }}"
                              class="form-control" placeholder="Enter the date *"
                              required="required" data-error="Date is required.">
                          </div>
                        </div>
                        <div class="col-2">
                          <div class="form-group">
                            <button type="button"
                              onclick="destroyDiv('temp-row-{{ $i }}','{{ $count }}')"
                              class="btn btn-danger">&#x2715;</button>
                          </div>
                        </div>
                      </div>
                    @endfor
                    <div class="row">
                      <div class="col-6">
                        <a href="{{ route('experience.index', ['count' => $count + 1]) }}"
                          class="btn btn-default btn-success btn-send  pt-2 btn-block">
                          Add Experiences
                        </a>
                      </div>
                      <div class="col-6">
                        <input type="submit"
                          class="btn btn-default btn-success btn-send  pt-2 btn-block"
                          value="Update Experiences">
                      </div>
                    </div>

                  </div>
              </form>
              <div class="modal fade w-100" id="exampleModal" tabindex="-1"
                role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Are you sure
                        you want to delete?</h5>
                      <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span>&times;</span>
                      </button>
                    </div>
                    <div class="modal-footer">
                      <form id='deleteForm' method="POST">
                        @csrf
                        @method('delete')
                        <input type='submit' class="btn btn-danger text-white"
                          value="Delete">
                      </form>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- /.8 -->
      </div>
      <!-- /.row-->
    </div>

  </div>

  <!-- Modal -->

@endsection
<script>
  function destroyDiv(divId, count) {
    console.log(count);
    var x = document.getElementById(divId);
    x.parentNode.removeChild(x);
    window.location.href = "/dashboard/experience?count=" + (count - 1);
  }

  function changeAction(id) {
    document.getElementById('deleteForm').action = "/dashboard/experience/" + id
  }
</script>
