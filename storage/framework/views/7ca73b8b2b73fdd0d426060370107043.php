

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">Login User</div>
                <div class="card-body">
                    <?php if(session('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session('error')); ?>

                    </div>
                    <?php endif; ?>
                    <form method="POST" action="<?php echo e(route('user.login.submit')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\primadata-register-webapp\resources\views/auth/user-login.blade.php ENDPATH**/ ?>