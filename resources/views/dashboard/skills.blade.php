@extends('layouts.dashboard')

@section('title', 'Skills')

@section('skills-active', 'active')

@section('content')
  <div class="container">
    <div class="row ">
      <div class="col-lg-7 mx-auto">
        <div class="card mt-2 mx-auto p-4 bg-light">
          <div class="card-body bg-light">
            <div class="container">
              <form action="{{ route('skills.update', 1) }}" id="contact-form"
                role="form" method="POST">
                @csrf
                @method('put')
                {{-- <form  method="POST"></form> --}}
                <div class="controls">
                  <div class="row mb-2">
                    <div class="col-6">Skill</div>
                    <div class="col-4">Rating</div>
                  </div>
                  @foreach ($skills as $skill)
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <input id="form_name"
                            @if (@isset($skill['skill'])) value="{{ $skill['skill'] }}" @endif
                            type="text" name="skill-{{ $skill['id'] }}"
                            class="form-control"
                            placeholder="Please enter your skill *"
                            required="required" data-error="Skill is required.">

                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <input id="form_lastname"
                            @if (@isset($skill['rating'])) value="{{ $skill['rating'] }}" @endif
                            pattern="[1-5]" type="text"
                            name="rating-{{ $skill['id'] }}" class="form-control"
                            placeholder="Rate from 1 to 5 *" required="required"
                            data-error="Rate is required.">
                        </div>
                      </div>
                      <div class="col-2">
                        <div class="form-group">
                          <button type="button"
                            onclick="changeAction({{ $skill['id'] }})"
                            class="btn btn-danger text-white" data-toggle="modal"
                            data-target="#exampleModal">
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
                            name="skill-new-{{ $i }}"
                            class="form-control"
                            placeholder="Please enter your skill *"
                            required="required" data-error="Skill is required.">

                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <input id="form_lastname" pattern="[1-5]" type="text"
                            name="rating-new-{{ $i }}"
                            class="form-control" placeholder="Rate from 1 to 5 *"
                            required="required" data-error="Rate is required.">
                        </div>
                      </div>
                      <div class="col-1 align-self-end">
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
                      <a href="{{ route('skills.index', ['count' => $count + 1]) }}"
                        class="btn btn-default btn-success btn-send  pt-2 btn-block">
                        Add Skills
                      </a>
                    </div>
                    <div class="col-6">
                      <input type="submit"
                        class="btn btn-default btn-success btn-send  pt-2 btn-block"
                        value="Update Skills">
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
                        you want to delete?
                      </h5>
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
    window.location.href = "/dashboard/skills?count=" + (count - 1);
  }

  function changeAction(id) {
    document.getElementById('deleteForm').action = "/dashboard/skills/" + id;
  }
</script>
