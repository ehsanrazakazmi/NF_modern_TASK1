
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.grid-js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/libs/gridjs/gridjs.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Roles
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Edit Roles
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0 flex-grow-1">Update Role</h4>
                    <a href="<?php echo e(route('admin.roles.index')); ?>" class="btn btn-outline-success waves-effect waves-light px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Role Index</a>
                </div>
                
                <div class="card-body">

                    <form method="POST" action="<?php echo e(route('admin.roles.update', $role->id)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                    
                    
                        <div class="form-floating">
                            <input type="text" class="form-control mt-3" id="name" name="name"
                                value="<?php echo e($role->name); ?>">
                            <label for="name">Role Name</label>

                            <button type="submit"
                                    class="btn rounded-pill btn-success waves-effect waves-light mt-3">Update</button>
                        </div>
                    </form>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Role Permissions</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    
                    
                    <div>
                        <form method="POST" action="<?php echo e(route('admin.roles.permissions', $role->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="sm:col-span-6">
                                <label for="permission"
                                    class="block text-sm font-medium text-gray-700">Select Permission</label>
                                <select id="permission" name="permission" autocomplete="permission-name"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($permission->name); ?>"><?php echo e($permission->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

            
                            <button type="submit" class="btn btn-success btn-label waves-effect right waves-light rounded-pill mt-2"><i class="ri-check-double-line label-icon align-middle rounded-pill fs-16 ms-2"></i> Assign</button>
                    </div>



                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    
    <!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('assets/libs/prismjs/prismjs.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/gridjs/gridjs.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/gridjs.init.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\modern\resources\views/admin/roles/edit.blade.php ENDPATH**/ ?>