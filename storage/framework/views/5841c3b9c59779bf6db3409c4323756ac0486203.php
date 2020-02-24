<?php $__currentLoopData = $eur_regional; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eur_regional): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($eur_regional->id); ?>"><?php echo e($eur_regional->first_name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>