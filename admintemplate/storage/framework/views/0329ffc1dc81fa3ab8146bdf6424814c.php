

<?php $__env->startSection('title', 'Edit User'); ?>

<?php $__env->startSection('contents'); ?>
<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <div class="card-body">
            <div class="container">
                <div id="editMode">
                    <!-- Edit User Data in Edit Mode -->
                    <h2>Edit User</h2>
                    <form action="<?php echo e(route('users.update', $user->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo e($user->name); ?>" />
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo e($user->email); ?>" />
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label class="form-label">Role</label>
                                    <select name="role" class="form-control">
                                        <option value="admin" <?php echo e(($user->role === 'admin') ? 'selected' : ''); ?>>Admin</option>
                                        <option value="user" <?php echo e(($user->role === 'user') ? 'selected' : ''); ?>>User</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo e($user->password); ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <center>
                            <div class="col-md-4">
                                <button class="btn btn-warning">Update</button>
                                <button type="button" class="btn btn-secondary" id="cancelButton">Cancel</button>
                            </div>
                        </center>
                        </div>
                    </form>
                </div>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Loreto Sisters\admintemplate\resources\views/users/edit.blade.php ENDPATH**/ ?>