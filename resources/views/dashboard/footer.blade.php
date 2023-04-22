@extends("layouts.dashboard")

@section("title","Footer")

@section("footer-active", "active")

@section('content')
    <div class="container">

        <div class="row ">
            <div class="col-lg-7 mx-auto">
                <div class="card mt-2 mx-auto p-4 bg-light">
                    <div class="card-body bg-light">

                        <div class="container">
                            <form action="{{ route('footer.update', $footer['id']) }}" id="contact-form" role="form"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="controls">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_name">Footer Detail</label>
                                                <input id="form_name"
                                                    @if (@isset($footer['content'])) value="{{ $footer['content'] }}" @endif
                                                    type="text"
                                                    name="detail" class="form-control"
                                                    placeholder="Please enter footer content *" required="required"
                                                    data-error="Footer content is required.">

                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="submit"
                                                class="btn btn-default btn-success btn-send  pt-2 btn-block"
                                                value="Update Footer">
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