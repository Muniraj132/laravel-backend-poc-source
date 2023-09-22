@extends('layouts.app')
 
@section('title', 'Create Product')
 
@section('contents')
   <!-- Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" name="title" class="form-control" placeholder="Title">
                        </div>
                        <div class="col">
                            <input type="text" name="price" class="form-control" placeholder="Price">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" name="product_code" class="form-control" placeholder="Product Code">
                           </div>
                        <div class="col">
                            <textarea class="form-control" name="description" placeholder="Description"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="document.querySelector('#addProductModal form').submit();">Submit</button>
            </div>
        </div>
    </div>
</div>

@endsection