<?php $__currentLoopData = $master_tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $master_tasks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($master_tasks->hl_mt_id); ?>"><?php echo e($master_tasks->task_name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>