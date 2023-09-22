 <?php $__env->startSection('title', 'Show Product'); ?> <?php $__env->startSection('contents'); ?>
<h1 class="mb-0">Detail Product</h1>
<hr />
<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <div class="card-body">
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Title" value="<?php echo e($product->title); ?>" readonly />
                </div>
                <div class="col mb-3">
                    <label class="form-label">Price</label>
                    <input type="text" name="price" class="form-control" placeholder="Price" value="<?php echo e($product->price); ?>" readonly />
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">product_code</label>
                    <input type="text" name="product_code" class="form-control" placeholder="Product Code" value="<?php echo e($product->product_code); ?>" readonly />
                </div>
                <div class="col mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description" placeholder="Descriptoin" readonly><?php echo e($product->description); ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Created At</label>
                    <input type="text" name="created_at" class="form-control" placeholder="Created At" value="<?php echo e($product->created_at); ?>" readonly />
                </div>
                <div class="col mb-3">
                    <label class="form-label">Updated At</label>
                    <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="<?php echo e($product->updated_at); ?>" readonly />
                </div>
            </div>
            <div class="row">
                <center>
                <div class="col-md-4">
                    <button class="btn btn-warning">Update</button>
                    <button class="btn btn-secondary" id="cancelButton">Cancel</button>
                </div>
            </center>
            </div>  
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
     $("#cancelButton").click(function() {
            var newUrl = "<?php echo e(route('products')); ?>"; 
            window.location.href = newUrl;
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Loreto Sisters\admintemplate\resources\views/products/show.blade.php ENDPATH**/ ?>