<?php $__currentLoopData = $na_regional; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $na_regional): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($na_regional->id); ?>"><?php echo e($na_regional->first_name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>