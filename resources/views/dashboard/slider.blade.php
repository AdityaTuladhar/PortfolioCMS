@extends('layouts.dashboard')

@section('title', 'Slider')

@section('slider-active', 'active')

@section('content')
  <div class="container">

    <div class="row ">

      <div class="col-lg-7 mx-auto">
        <div class="card mt-2 mx-auto p-4 bg-light">
          <div class="card-body bg-light">
            <div class="container">

              <form enctype="multipart/form-data"
                action="{{ route('slider.update', 1) }}" id="contact-form"
                role="form" method="POST">
                @csrf
                @method('put')
                {{-- <form  method="POST"></form> --}}
                <div class="controls">
                  <div class="row mb-2">
                    <div class="col-2"></div>
                    <div class="col-4">Image File</div>
                    <div class="col-4">Title</div>
                  </div>
                  @foreach ($sliders as $slider)
                    <div class="row">
                      <div class="col-2">
                        <div class="form-group">
                          <img
                            src="{{ asset('storage/images/' . $slider['source']) }}"
                            style="height: 45px;width:45px; ">
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <input id="form_file_{{ $slider['id'] }}"
                            onchange="onFileUpload('form_file_{{ $slider['id'] }}')"
                            @if (@isset($slider['source'])) value="{{ $slider['source'] }}" @endif
                            type="file" name="source-{{ $slider['id'] }}"
                            class="form-control"
                            placeholder="Please upload the image file *"
                            data-error="Image file is required.">

                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <input id="form_alt"
                            @if (@isset($slider['alternate'])) value="{{ $slider['alternate'] }}" @endif
                            type='text' name="alternative-{{ $slider['id'] }}"
                            class="form-control"
                            placeholder="Enter a title *"
                            required="required"
                            data-error="Title text is required.">
                        </div>
                      </div>
                      <div class="col-2">
                        <div class="form-group">
                          <button type="button"
                            onclick="changeAction({{ $slider['id'] }})"
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
                          <input type="file"
                            id="form_new_file_{{ $i }}"
                            onchange="onFileUpload('form_new_file_{{ $i }}')"
                            name="source-new-{{ $i }}"
                            class="form-control"
                            placeholder="Please upload the image file *"
                            required="required"
                            data-error="Image file is required.">

                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <input id="form_alt" type="text"
                            name="alternative-new-{{ $i }}"
                            class="form-control"
                            placeholder="Enter the alternative text *"
                            required="required"
                            data-error="Alternative text is required.">
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
                      <a href="{{ route('slider.index', ['count' => $count + 1]) }}"
                        class="btn btn-default btn-success btn-send  pt-2 btn-block">
                        Add Sliders
                      </a>
                    </div>
                    <div class="col-6">
                      <input type="submit"
                        class="btn btn-default btn-success btn-send  pt-2 btn-block"
                        value="Update Sliders">
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
    window.location.href = "/dashboard/slider?count=" + (count - 1);
  }

  function changeAction(id) {
    document.getElementById('deleteForm').action = "/dashboard/slider/" + id
  }


  function onFileUpload(uploadFieldId){
    var uploadField = document.getElementById(uploadFieldId);
    if (uploadField.files[0].size > 2097152) {
      alert("Select a file less than 2MB.");
      uploadField.value = "";
    }
  }
      
</script>
