<?php $__currentLoopData = $sa_regional; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sa_regional): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($sa_regional->id); ?>"><?php echo e($sa_regional->first_name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>