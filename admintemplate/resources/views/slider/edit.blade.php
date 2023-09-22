@extends('layouts.app')

@section('title', 'Users')

@section('contents')
<div class="container">
    <h2>Edit Slider</h2>
    <form method="POST" action="{{ route('slider.update', $slider->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="image">Select Image:</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
            <img src="{{ asset($slider->image_path) }}" alt="Current Image" style="max-width: 200px; max-height: 200px; margin-top: 10px;">
        </div>

        <div class="form-group">
            <label for="width">Width:</label>
            <input type="number" name="width" id="width" class="form-control" value="{{ $slider->width }}" required>
        </div>

        <div class="form-group">
            <label for="height">Height:</label>
            <input type="number" name="height" id="height" class="form-control" value="{{ $slider->height }}" required>
        </div>

        <div class="form-group">
            <label for="dimensions">Dimensions (e.g., 1920x1080):</label>
            <input type="text" name="dimensions" id="dimensions" class="form-control" value="{{ $slider->dimensions }}" required>
        </div>

        <div class="form-group">
            <label for="published">Status:</label>
            <select name="published" id="published" class="form-control" required>
                <option value="1" {{ $slider->published ? 'selected' : '' }}>Published</option>
                <option value="0" {{ !$slider->published ? 'selected' : '' }}>Unpublished</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Slider</button>
    </form>
</div>
@endsection
