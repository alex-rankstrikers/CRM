<?php $__currentLoopData = $mea_regional; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mea_regional): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($mea_regional->id); ?>"><?php echo e($mea_regional->first_name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>