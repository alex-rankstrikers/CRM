     <?php echo $__env->make('layouts.login-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>    
     	<?php echo $__env->yieldContent('content'); ?>
  		<?php echo $__env->yieldContent('footer'); ?>
     <?php echo $__env->make('layouts.login-footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	