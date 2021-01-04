<?php $__env->startSection('title'); ?>
    Create Category
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
            Create new categroy
        </div>

    </div>

    <div class="card card-body"> 
        <form action="<?php echo e(route('category.save')); ?>" method="POST">
            <?php echo e(csrf_field()); ?>


            <div class="form-group">
                <label for="name">Catergory:</label>
                <input type="text" name="name" class="form-control" required placeholder="Enter category">
            </div>            

            <div class="form-group text-right">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>

        </form>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jackieriel/Projects/Blog/resources/views/pages/admin/category/create.blade.php ENDPATH**/ ?>