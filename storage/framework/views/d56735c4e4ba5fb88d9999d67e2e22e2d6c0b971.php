<?php $__currentLoopData = $apac_regional; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apac_regional): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($apac_regional->id); ?>"><?php echo e($apac_regional->first_name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>