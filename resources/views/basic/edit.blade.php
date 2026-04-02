
@extends('layout')
@section('content')
<h2 class="mb-3">Edit Post</h2>

<form action="{{ route('basic.update', $post->id) }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="title">Title</label>
        <input type="text" name="title" value="{{ $post->title }}" class="form-control">
        <span class="text-danger">{{ $errors->first('title') }}</span>
    </div>
    <div class="mb-3">
        <label for="description">Description</label>
        <textarea name="description" class="form-control">{{ $post->description }}</textarea>
        <span class="text-danger">{{ $errors->first('description') }}</span>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection