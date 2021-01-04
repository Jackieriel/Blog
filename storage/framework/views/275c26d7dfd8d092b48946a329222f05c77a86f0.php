<?php $__env->startSection('title'); ?>
    All Post
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
            All post
        </div>

        <table class="table table-hover">
            <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Update</th>
                 <th>Delete</th>
            </thead>

            <tbody>
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><img src="<?php echo e($post->featured); ?>" alt="<?php echo e($post->title); ?>" width="90px" height="50" ></td>
                        <td><?php echo e($post->title); ?></td>
                        <td>
                            <a href="<?php echo e(route('post.edit', $post->id)); ?>" class="btn btn-xs btn-info"><span
                            class="fa fa-pencil text-white"></span></a>
                        </td>
                        <td>
                            <a href="<?php echo e(route('post.delete', $post->id)); ?>"
                            onclick="return confirm('Do you really want to delete this category?')"
                            class="btn btn-xs btn-danger"><span class="fa fa-trash text-white"></span></a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>

        </table>

    </div>

   
  

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jackieriel/Projects/Blog/resources/views/pages/admin/posts/index.blade.php ENDPATH**/ ?>