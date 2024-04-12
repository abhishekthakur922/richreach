@extends('frontend.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Posts List</h2>

        @if(session()->has('success'))
        <div class="alert alert-success success_msg">
            {{ session()->get('success') }}
        </div>
        @endif

        <a href="{{ url('/addPost') }}">
         <button type="button" class="btn btn-primary" style="float: right;margin-bottom: 2%;">Add Post</button>
        </a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sr.No.</th>
                    <th>User</th>
                    <th>title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
             @if(count($posts) > 0)
                @php
                  $serialNumber = 1;
                @endphp

                @foreach($posts as $post)
                <tr>
                 <td>{{ $serialNumber++ }}</td>
                 <td>{{ $post->user->name }}</td>
                 <td>{{ $post->title }}</td>
                 <td>
                 <a href="{{ url('/viewPost/' . $post->id) }}">
                    <button class="btn btn-sm btn-warning">View</button>
                 </a>

                 @if(auth()->check() && auth()->user()->id === $post->user_id)
                 <a href="{{ url('/editPost/' . $post->id) }}">
                    <button class="btn btn-sm btn-primary">Edit</button>
                 </a>
                 <a href="javascript:void(0);" class="delete" data-id="{{$post->id}}" data-toggle="modal" data-original-title="Delete" data-target="#delete">
                  <button class="btn btn-sm btn-danger">Delete</button>
                 </a>
                 @endif

                 </td>
                </tr>
                @endforeach
             @else
                <tr>
                 <td colspan="4">No records found</td>
                </tr>
             @endif
            </tbody>
        </table>
    </div>
</div>
@endsection