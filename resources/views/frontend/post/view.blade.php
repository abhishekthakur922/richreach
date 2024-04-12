@extends('frontend.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h3 style="text-align: center;">View Post</h3>

                   <div class="form-group">
                        <label for="exampleInputUser">User</label>
                        <input type="text" class="form-control" id="exampleInputUser" value="{{ $post->user->name }}" readonly>
                    </div> 
                   <div class="form-group">
                        <label for="exampleInputTitle">Title</label>
                        <input type="text" class="form-control" id="exampleInputTitle" value="{{ $post->title }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputContent">Content</label>
                        <textarea class="form-control" rows="10" cols="12" id="exampleInputContent" readonly>{{ $post->content }}</textarea>
                    </div>
                    <a href="{{ url('/posts') }}">
                      <button type="button" class="btn btn-primary" style="float: right;">Back</button>
                    </a>
            </div>
        </div>
    </div>
</div>
@endsection