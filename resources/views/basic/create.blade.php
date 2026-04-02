@extends('layout')
@section('content')
<h2 class="mb-3">Add Post</h2>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('basic.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="title">Title</label>
        <input type="text" name="title" placeholder="Title" class="form-control mb-3" value="{{ old('title') }}">
        <span class="text-danger">{{ $errors->first('title') }}</span>
    </div>
    <div class="mb-3">
        <label for="description">Description</label>
        <textarea name="description" placeholder="Description" class="form-control mb-3">{{ old('description') }}</textarea>
        <span class="text-danger">{{ $errors->first('description') }}</span>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection