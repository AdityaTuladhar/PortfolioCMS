@extends('layouts.dashboard')

@section('title', 'Details')

@section('details-active', 'active')

@section('content')
  <div class="container">

    <div class="row ">
      <div class="col-lg-7 mx-auto">
        <div class="card mt-2 mx-auto p-4 bg-light">
          <div class="card-body bg-light">

            <div class="container">
              <form action="{{ route('details.update', $details['id']) }}"
                id="contact-form" role="form" method="POST">
                @csrf
                @method('PUT')
                <div class="controls">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="form_name">Name</label>
                        <input id="form_name"
                          @if (@isset($details['name'])) value="{{ $details['name'] }}" @endif
                          pattern="^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$"
                          type="text" name="name" class="form-control"
                          placeholder="Please enter your full name *"
                          required="required" data-error="Full name is required.">

                      </div>

                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="form_name">Phone number</label>
                        <input id="form_name"
                          @if (@isset($details['phone'])) value="{{ $details['phone'] }}" @endif
                          pattern="^\d{10}$" type="text" name="phone"
                          class="form-control"
                          placeholder="Please enter your phone number *"
                          required="required"
                          data-error="Phone number is required.">

                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="form_lastname">Age</label>
                        <input id="form_lastname"
                          @if (@isset($details['age'])) value="{{ $details['age'] }}" @endif
                          pattern="^\d{1,3}$" type="text" name="age"
                          class="form-control"
                          placeholder="Please enter your age *"
                          required="required" data-error="Age is required.">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="form_email">Email</label>
                        <input id="form_email"
                          @if (@isset($details['email'])) value="{{ $details['email'] }}" @endif
                          type="email" name="email" class="form-control"
                          placeholder="Please enter your email *"
                          required="required"
                          data-error="Valid email is required.">

                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="form_need">Sex</label>
                        <select id="form_need" name="sex" class="form-control"
                          required="required"
                          data-error="Please specify your sex.">
                          <option value=""
                            @if (!@isset($details['sex'])) selected="selected" @endif
                            value="Male" disabled>--Select Your Sex--</option>
                          <option
                            @if (@isset($details['sex']) and $details['sex'] == 'Male') selected @endif
                            value="Male">Male</option>
                          <option
                            @if (@isset($details['sex']) and $details['sex'] == 'Female') selected @endif
                            value="Female">Female</option>
                        </select>

                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <input type="submit"
                        class="btn btn-default btn-success btn-send  pt-2 btn-block"
                        value="Update Details">
                    </div>

                  </div>

                </div>
              </form>

            </div>
          </div>
        </div>
        <!-- /.8 -->
      </div>
      <!-- /.row-->
    </div>

  </div>

@endsection
