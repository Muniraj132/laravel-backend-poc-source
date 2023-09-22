@extends('layouts.app')
 
@section('title', 'Edit Product')
 
@section('contents')
    
<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <div class="card-body">
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $product->title }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Price</label>
                <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $product->price }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Product Code</label>
                <input type="text" name="product_code" class="form-control" placeholder="Product Code" value="{{ $product->product_code }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Images</label>
                
                {{-- @foreach(json_decode($product->images) as $image) --}}
                    <img src="{{ asset('new_images/'.$product->images) }}" alt="Product Image" width="50">
                {{-- @endforeach --}}
                <input type="file" name="images[]" class="form-control-file" multiple>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" placeholder="Description">{{ $product->description }}</textarea>
            </div>
        </div>
        <div class="row">
            <center>
            <div class="col-md-4">
                <button class="btn btn-warning">Update</button>
                <label class="btn btn-secondary" style="margin-top:6px;" id="cancelButton">Cancel</label>
            </div>
        </center>
        </div>
    </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    $(document).ready(function() {
     $("#cancelButton").click(function() {
            var newUrl = "{{ route('products') }}"; 
            window.location.href = newUrl;
        });
    });
</script>
@endsection
