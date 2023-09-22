@extends('layouts.app')

@section('title', 'Users')

@section('contents')
<div class="container">
    <h2>Create Slider</h2>
    <form method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="image">Select Image:</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
            <img id="image-preview" src="" alt="Image Preview" style="max-width: 200px; max-height: 200px; margin-top: 10px;">
        </div>

        <div class="form-group">
            <label for="width">Width:</label>
            <input type="number" name="width" id="width" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="height">Height:</label>
            <input type="number" name="height" id="height" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="dimensions">Dimensions (e.g., 1920x1080):</label>
            <input type="text" name="dimensions" id="dimensions" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="published">Status:</label>
            <select name="published" id="published" class="form-control" required>
                <option value="1">Published</option>
                <option value="0">Unpublished</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Slider</button>
    </form>
</div>

<script>
    // Preview uploaded image
    document.getElementById('image').addEventListener('change', function(e) {
        const imagePreview = document.getElementById('image-preview');
        const file = e.target.files[0];
        const reader = new FileReader();

        reader.onload = function() {
            imagePreview.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
