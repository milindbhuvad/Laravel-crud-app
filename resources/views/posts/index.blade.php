@extends('layout')
@section('content')

<h2 class="mb-3">Posts</h2>
<a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Add Post</a>
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
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
            </form>
        </td>
    </tr>
@endforeach
    </tbody>
</table>

@endsection