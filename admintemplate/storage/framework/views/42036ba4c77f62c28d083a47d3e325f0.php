

<?php $__env->startSection('title', 'Users'); ?>

<?php $__env->startSection('contents'); ?>
<div class="container">
    <h2>Edit Slider</h2>
    <form method="POST" action="<?php echo e(route('slider.update', $slider->id)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="form-group">
            <label for="image">Select Image:</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
            <img src="<?php echo e(asset($slider->image_path)); ?>" alt="Current Image" style="max-width: 200px; max-height: 200px; margin-top: 10px;">
        </div>

        <div class="form-group">
            <label for="width">Width:</label>
            <input type="number" name="width" id="width" class="form-control" value="<?php echo e($slider->width); ?>" required>
        </div>

        <div class="form-group">
            <label for="height">Height:</label>
            <input type="number" name="height" id="height" class="form-control" value="<?php echo e($slider->height); ?>" required>
        </div>

        <div class="form-group">
            <label for="dimensions">Dimensions (e.g., 1920x1080):</label>
            <input type="text" name="dimensions" id="dimensions" class="form-control" value="<?php echo e($slider->dimensions); ?>" required>
        </div>

        <div class="form-group">
            <label for="published">Status:</label>
            <select name="published" id="published" class="form-control" required>
                <option value="1" <?php echo e($slider->published ? 'selected' : ''); ?>>Published</option>
                <option value="0" <?php echo e(!$slider->published ? 'selected' : ''); ?>>Unpublished</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Slider</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Loreto Sisters\admintemplate\resources\views/slider/edit.blade.php ENDPATH**/ ?>