<?php $__env->startSection('title'); ?>
    Categories
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <table class="table table-hover">
        <thead>
            <th>Category Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>

        <tbody>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($category->name); ?></td>
                    <td><a href="<?php echo e(route('category.edit', $category->id)); ?>" class="btn btn-xs btn-info"><span
                                class="fa fa-pencil text-white"></span></a></td>
                    <td><a href="<?php echo e(route('category.delete', $category->id)); ?>"
                            onclick="return confirm('Do you really want to delete this category?')"
                            class="btn btn-xs btn-danger"><span class="fa fa-trash text-white"></span></a></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jackieriel/Projects/Blog/resources/views/pages/admin/category/index.blade.php ENDPATH**/ ?>