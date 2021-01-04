<?php $__env->startSection('title'); ?>
    Update Category
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
     <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.errors','data' => []]); ?>
<?php $component->withName('errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

    <div class="card">
        <div class="card-header">
            Update categroy
        </div>

    </div>

    <div class="card card-body"> 
        <form action="<?php echo e(route('category.update', $category->id)); ?>" method="POST">
            <?php echo e(csrf_field()); ?>


            <div class="form-group">
                <label for="name">Catergory:</label>
                <input type="text" name="name" value="<?php echo e($category->name); ?>" class="form-control" required placeholder="Enter category">
            </div>            

            <div class="form-group text-right">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>

        </form>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jackieriel/Projects/Blog/resources/views/pages/admin/category/update.blade.php ENDPATH**/ ?>