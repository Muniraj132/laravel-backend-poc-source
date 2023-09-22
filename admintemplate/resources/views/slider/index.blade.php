@extends('layouts.app')

@section('title', 'Users')

@section('contents')

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Height</th>
                <th>Width</th>
                <th>Dimensions</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sliders as $slider)
            <tr>
                <td>{{ $slider->id }}</td>
                <td>
                    <img src="{{ asset($slider->image_path) }}" alt="Slider Image" style="max-width: 100px;">
                </td>
                <td>{{ $slider->height }}</td>
                <td>{{ $slider->width }}</td>
                <td>{{ $slider->dimensions }}</td>
                <td>{{ $slider->published ? 'Published' : 'Unpublished' }}</td>
                <td>
                    <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('slider.destroy', $slider->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection