@extends('layout')
@section('content')
<h2 class="mb-3">
    Add Post
    <a href="{{ route('posts-ajax.index') }}" class="btn btn-secondary btn-sm float-end">
        Back to List
    </a>
</h2>
<form id="postForm">
    @csrf
    <div class="mb-3">
        <label for="title">Title</label>
        <input type="text" name="title" placeholder="Title" class="form-control mb-3">
        <span class="text-danger" id="titleError"></span>
    </div>
    <div class="mb-3">
        <label for="description">Description</label>
        <textarea name="description" placeholder="Description" class="form-control mb-3"></textarea>
        <span class="text-danger" id="descriptionError"></span>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    <div id="success-msg"></div>
</form>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#postForm').on('submit', function(e) {
            e.preventDefault();
            $('#titleError').text('');
            $('#descriptionError').text('');
            $('#success-msg').html('');

            $.ajax({
                url: "{{ route('posts-ajax.store') }}",
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