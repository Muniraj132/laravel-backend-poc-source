

<?php $__env->startSection('title', 'Users'); ?>

<?php $__env->startSection('contents'); ?>

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
            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($slider->id); ?></td>
                <td>
                    <img src="<?php echo e(asset($slider->image_path)); ?>" alt="Slider Image" style="max-width: 100px;">
                </td>
                <td><?php echo e($slider->height); ?></td>
                <td><?php echo e($slider->width); ?></td>
                <td><?php echo e($slider->dimensions); ?></td>
                <td><?php echo e($slider->published ? 'Published' : 'Unpublished'); ?></td>
                <td>
                    <a href="<?php echo e(route('slider.edit', $slider->id)); ?>" class="btn btn-primary">Edit</a>
                    <form action="<?php echo e(route('slider.destroy', $slider->id)); ?>" method="POST" style="display: inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Loreto Sisters\admintemplate\resources\views/slider/index.blade.php ENDPATH**/ ?>