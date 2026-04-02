
@extends('layout')
@section('content')
<h2 class="mb-3">
    Edit Post
    <a href="{{ route('posts-ajax.index') }}" class="btn btn-secondary btn-sm float-end">
        Back to List
    </a>
</h2>

<form id="updateForm">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="title">Title</label>
        <input type="text" name="title" value="{{ $posts_ajax->title }}" class="form-control">
        <span class="text-danger" id="titleError"></span>
    </div>
    <div class="mb-3">
        <label for="description">Description</label>
        <textarea name="description" class="form-control">{{ $posts_ajax->description }}</textarea>
        <span class="text-danger" id="descriptionError"></span>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <div id="success-msg"></div>
</form>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#updateForm').on('submit', function(e) {
            e.preventDefault();
            $('#titleError').text('');
            $('#descriptionError').text('');
            $('#success-msg').html('');

            $.ajax({
                url: "{{ route('posts-ajax.update', $posts_ajax->id) }}",
                method: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    $('#success-msg').html(
                        '<div class="alert alert-success">' + response.success + '</div>'
                    );
                    $('#postForm')[0].reset();
                },
                error: function(xhr) {
                    $('#titleError').text(xhr.responseJSON.errors.title);
                    $('#descriptionError').text(xhr.responseJSON.errors.description);
                }
            });
        });
    });
</script>
@endsection