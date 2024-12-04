
<?php $__env->startSection('scriptop'); ?>

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
 

<script src="<?php echo e(asset('js/js/tom-select.complete.min.js')); ?>"></script>
<link rel="stylesheet" href="<?php echo e(asset('/js/css/tom-select.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class = 'content'>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Thêm khóa học
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-12 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form method="post" action="<?php echo e(route('khoahoc.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="intro-y box p-5">
                    <div class="mt-3">
                        <label for="regular-form-1" class="form-label">Tên khóa học</label>
                        <input name="ten_khoa_hoc" type="text" class="form-control" placeholder="tên khóa học">
                    </div>
                    <div class="mt-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" id="image" name="image" />
                    </div>
                    <div class="mt-3">
                        <label for="" class="form-label">Mô tả</label>
                        <textarea class="form-control"   id="editor1" name="mota" ><?php echo e(old('summary')); ?></textarea>
                    </div>

                    <div class="text-right mt-5">
                        <button type="submit" class="btn btn-primary w-24">Lưu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script>
    var select = new TomSelect('#select-junk',{
        maxItems: null,
        allowEmptyOption: true,
        plugins: ['remove_button'],
        sortField: {
            field: "text",
            direction: "asc"
        },
        onItemAdd:function(){
                this.setTextboxValue('');
                this.refreshOptions();
            },
        create: true
        
    });
    select.clear();
</script>

<script>
 Dropzone.autoDiscover = false;
    
    // Dropzone class:
    // var myDropzone = new Dropzone("div#mydropzone", { url: "<?php echo e(route('upload.avatar')); ?>"});
        // previewsContainer: ".dropzone-previews",
        // Dropzone.instances[0].options.url = "<?php echo e(route('upload.avatar')); ?>";
        Dropzone.instances[0].options.multiple = false;
        Dropzone.instances[0].options.autoQueue= true;
        Dropzone.instances[0].options.maxFilesize =  1; // MB
        Dropzone.instances[0].options.maxFiles =1;
        Dropzone.instances[0].options.dictDefaultMessage = 'Drop images anywhere to upload (6 images Max)';
        Dropzone.instances[0].options.acceptedFiles= "image/jpeg,image/png,image/gif";
        Dropzone.instances[0].options.previewTemplate =  '<div class=" d-flex flex-column  position-relative">'
                                        +' <img    data-dz-thumbnail >'
                                        
                                    +' </div>';
        // Dropzone.instances[0].options.previewTemplate =  '<li><figure><img data-dz-thumbnail /><i title="Remove Image" class="icon-trash" data-dz-remove ></i></figure></li>';      
        Dropzone.instances[0].options.addRemoveLinks =  true;
        Dropzone.instances[0].options.headers= {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')};

        Dropzone.instances[0].on("addedfile", function (file ) {
        // Example: Handle success event
        console.log('File addedfile successfully!' );
        });
        Dropzone.instances[0].on("success", function (file, response) {
        // Example: Handle success event
        // file.previewElement.innerHTML = "";
        if(response.status == "true")
        $('#photo').val(response.link);
        console.log('File success successfully!' +response.link);
        });
        Dropzone.instances[0].on("removedfile", function (file ) {
        $('#photo').val('');
        console.log('File removed successfully!'  );
        });
        Dropzone.instances[0].on("error", function (file, message) {
        // Example: Handle success event
        file.previewElement.innerHTML = "";
        console.log(file);

        console.log('error !' +message);
        });
        console.log(Dropzone.instances[0].options   );

        // console.log(Dropzone.optionsForElement);

</script>

 
<script src="<?php echo e(asset('js/js/ckeditor.js')); ?>"></script>
<script>
      ClassicEditor
        .create( document.querySelector( '#editor2' ), 
        {
            ckfinder: {
                uploadUrl: '<?php echo e(route("upload.ckeditor")."?_token=".csrf_token()); ?>'
                }
                ,
                mediaEmbed: {previewsInData: true}

        })

        .then( editor => {
            console.log( editor );
        })
        .catch( error => {
            console.error( error );
        })

</script>

 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CODE\laravel\shoplite\resources\views/backend/khoahoc/create.blade.php ENDPATH**/ ?>