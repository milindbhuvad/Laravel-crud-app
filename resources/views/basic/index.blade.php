@extends('layout')
@section('content')

<h2 class="mb-3">Posts</h2>
<a href="{{ route('basic.create') }}" class="btn btn-primary mb-3">Add Post</a>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th width="150">Action</th>
        </tr>
    </thead>
    <tbody>
@foreach($posts as $post)
    <tr>
        <td>{{ $post->title }}</td>
        <td>{{ $post->description }}</td>
        <td>
            <a href="{{ route('basic.edit', $post->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
            <a href="{{ route('basic.destroy', $post->id) }}" class="btn btn-sm btn-outline-danger">Delete</a>
        </td>
    </tr>
@endforeach
    </tbody>
</table>

@endsection