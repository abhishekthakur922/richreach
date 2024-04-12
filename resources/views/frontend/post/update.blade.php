@extends('frontend.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h3 style="text-align: center;">Update Post</h3>

                @if(session()->has('success'))
                <div class="alert alert-success success_msg">
                  {{ session()->get('success') }}
                </div>
                @endif

                <form method="POST">
                   @csrf
                    <div class="form-group">
                        <label for="exampleInputTitle">Title</label>
                        <input type="text" class="form-control" name="title" id="exampleInputTitle" placeholder="Enter Title" value="{{ $post->title }}">

                        @if ($errors->has('title'))
                          <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputContent">Content</label>
                        <textarea class="form-control" rows="10" cols="12" name="content" id="exampleInputContent" placeholder="Enter Content">{{ $post->content }}</textarea>

                        @if ($errors->has('content'))
                          <span class="text-danger">{{ $errors->first('content') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ url('/posts') }}">
                      <button type="button" class="btn btn-primary" style="float: right;">Back</button>
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection