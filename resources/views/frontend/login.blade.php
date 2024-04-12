@extends('frontend.layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h3 style="text-align: center;">Login</h3>

                @if(session()->has('error'))
                <div class="alert alert-danger error_msg">
                  {{ session()->get('error') }}
                </div>
                @endif

                <form method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email Address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter Email Address">

                        @if ($errors->has('email'))
                          <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword" placeholder="Enter Password">

                        @if ($errors->has('password'))
                          <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection