<?php
    $sql_rand_blog = "SELECT * from blogs where  status = 'active' and cat_id != 'null' order by rand() LIMIT 4";
    $rand_blogs=   \DB::select($sql_rand_blog) ;
    
?>

<div class="!relative">
    <div class="shape bg-dot primary rellax !w-[7rem] !h-[10rem] !absolute z-[1] opacity-50 !bg-[radial-gradient(#3f78e0_2px,transparent_2.5px)]"
     data-rellax-speed="1" style="top: 0; left: -1.7rem;">
    </div>
    <div class="swiper-container dots-closer blog grid-view !mb-6" data-margin="0" 
            data-dots="true" data-items-xl="4" data-items-md="2" data-items-xs="1">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php $__currentLoopData = $rand_blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $cat = \App\Models\BlogCategory::find($blog->cat_id);
                        ?>
                        <div class="swiper-slide">
                            <div class="item-inner">
                                <article>
                                    <div class="card">
                                         
                                        <div class="project item xl:w-12/12 lg:w-12/12 md:w-12/12 w-full flex-[0_0_auto] px-[5px] mt-[15px] max-w-full drinks events">
                                            <figure class="card-img-top overlay overlay-1 hover-scale group" style=" height:200px; overflow:hidden; padding:0px">
                                                <a href="<?php echo e(route('front.page.view',$blog->slug)); ?>"> 
                                                    <img   class="!transition-all !duration-[0.35s] !ease-in-out group-hover:scale-105"
                                                    src="<?php echo e($blog->photo); ?>" 
                                                    alt="<?php echo e($blog->title); ?>">
                                                </a>
                                                
                                            </figure>
                                        </div>
                                        <div  style="max-height:260px; overflow:hidden" class="card-body flex-[1_1_auto] p-[40px] xl:p-[1.75rem_1.75rem_1rem_1.75rem] lg:p-[1.75rem_1.75rem_1rem_1.75rem] md:p-[1.75rem_1.75rem_1rem_1.75rem] sm:pb-4 xsm:pb-4  ">
                                            <div class="post-header">
                                                <div class="inline-flex mb-[.4rem] uppercase tracking-[0.02rem] text-[0.7rem] font-bold primarytextcolor relative align-top pl-[1.4rem] before:content-[''] before:absolute before:inline-block before:translate-y-[-60%] before:w-3 before:h-[0.05rem] before:left-0 before:top-2/4 leading_title_color">
                                                
                                                <a href="<?php echo e(route('front.category.view',$cat->slug)); ?>" class="hover" rel="category"><?php echo e($cat->title); ?></a>
                                                </div>
                                                <!-- /.post-category -->
                                                <h2 class="post-title h3 !mt-1 !mb-3"><a class="title_color" href="<?php echo e(route('front.page.view',$blog->slug)); ?>"><?php echo e($blog->title); ?></a></h2>
                                            </div>
                                            <!-- /.post-header -->
                                            <div  class="!relative">
                                                <p><?php echo e($blog->summary); ?></p>
                                            </div>
                                        <!-- /.post-content -->
                                        </div>
                                        <!--/.card-body -->
                                         
                                        <!-- /.card-footer -->
                                    </div>
                                <!-- /.card -->
                                </article>
                                <!-- /article -->
                            </div>
                            <!-- /.item-inner -->
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!--/.swiper-slide -->
                </div>
                    <!--/.swiper-wrapper -->
            </div>
                <!-- /.swiper -->
        </div>
                <!-- /.swiper-container -->
    </div>
</div><?php /**PATH D:\CODE\laravel\shoplite\resources\views/frontend_tp/layouts/mod_4_blog.blade.php ENDPATH**/ ?>