@extends('layouts.app')

@section('title', 'Users')

@section('contents')
<div class="container">
    <h2>Delete Slider</h2>
    <p>Are you sure you want to delete this slider?</p>
    <form method="POST" action="{{ route('slider.destroy', $slider->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
        <a href="{{ route('slider.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
