<?php $__currentLoopData = $travel_desk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $travel_desk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($travel_desk->hl_mt_desk_id); ?>"><?php echo e($travel_desk->hl_master_travel_name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>