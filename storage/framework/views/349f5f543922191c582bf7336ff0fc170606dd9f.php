

<?php if(count($errors) > 0): ?>
    <ul class="list-group">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item text-danger">
                <?php echo e($error); ?>

            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

<?php endif; ?>


<?php /**PATH /home/jackieriel/Projects/Blog/resources/views/components/errors.blade.php ENDPATH**/ ?>