<?php
 
  $setting =\App\Models\SettingDetail::find(1);
  $user = auth()->user();
  if($user)
  {
      $sql  = "select c.quantity, d.* from (SELECT * from shoping_carts where user_id = "
      .$user->id.") as c left join products as d on c.product_id = d.id where d.status = 'active'  ";
      $pro_carts =   \DB::select($sql ) ;
  }
  else
  {
      $pro_carts = [];
  }
  $cart_size= count($pro_carts);
?>

<?php $__env->startSection('head_css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
        <?php if(env('DEMOAPP') == 1): ?>
          <?php echo $__env->make(('frontend_tp2.layouts.modalpopup'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php echo $__env->make(('frontend_tp2.layouts.mode_slidebanner'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- end top menu banner -->
        <!-- end blog-banner -->
        <?php echo $__env->make('frontend_tp2.layouts.mod6pro', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('frontend_tp2.layouts.mod8randpro', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('frontend_tp2.layouts.bannerpromo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('frontend_tp2.layouts.mod8hotpro', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- end 8pro-righ-banner -->
        <?php echo $__env->make('frontend_tp2.layouts.mod_4_blog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend_tp2.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp1\htdocs\shop4\resources\views/frontend_tp2/index.blade.php ENDPATH**/ ?>