<?php $__env->startSection('title','page Settings'); ?>

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('content'); ?>
<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Settings</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(route('admin.home')); ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                       Setting
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>


<div class="pd-20 card-box">
    <h5 class="h4 text-blue mb-20">Settings</h5>
   <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin-settings')->html();
} elseif ($_instance->childHasBeenRendered('CdGiLL7')) {
    $componentId = $_instance->getRenderedChildComponentId('CdGiLL7');
    $componentTag = $_instance->getRenderedChildComponentTagName('CdGiLL7');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('CdGiLL7');
} else {
    $response = \Livewire\Livewire::mount('admin-settings');
    $html = $response->html();
    $_instance->logRenderedChild('CdGiLL7', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
</div>


<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>

<script>
    $('input[type="file"][name="site_logo"][id="site_logo"]').ijaboViewer({

        preview:'#site_logo_image',
        imageShape='rectangular',
        allowedExtensions:['png','jpg'],
        onErrorShape:function(message,element){
       alert(message);

        },
        onInvalidType:function(message,element){
            alert(message);
        },

    });

    $('#change_site_logo').on('submit',function(element){
        element.preventDefault();
        var form=this;
    var formData=new FormDate(form);
    var inputFileVal=$(form).find('input[type="file"][name="site_logo"][id="site_logo"]').val();
    if(inputFileVal.length > 0){
        $.ajax({
            url:$(form).attr('action'),
            method:$(form).attr('method'),
            data:formData,
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function(){
                toastr.remove();
                $(form).find('span.error-text').text('');
            },
            success:function(response){
                 if(response.status==1){
                    toastr.success(response.msg);
                    
                    $('#site_logo_image').attr('src', response.new_logo_path);
                  
                 }else{
                    toastr.error(response.msg);
                 }
            },error:function(xhr, status, error){
                toastr.error('An error occurred. Please try again.'+error);

            }
        });
     
    }else{
     $(form).find('span.error-text').text('please select logo image file from type jpg,png');
     
    }
    
    });

    $('input[type="file"][name="site_favicon"][id="site_favicon"]').ijaboViewer({

        preview:'#site_favicon_image',
        imageShape:'square',
        allowedExtensions:['jpg','png'],
        onErrorShape:function(message,element){
            alert(message);
        },onInvalidType:function(message,element){
            alert(message);
        },

    });
    $('#site_favicon_form').on('submit',function(element){
        element.preventDefault();
        var form=this;
        var formData=new FormData(this);
        var inputFileVal=$(form).find('input[type="file"][name="site_favicon"][id="site_favicon"]').val();
        if(inputFileVal.length>0){
        $.ajax({
          url:$(form).attr('action'),
          methode:$(form).attr('methode'),
          data=formData,
          dataType: 'json',
          contentType: false,
          processData:false,
          beforeSend:function(){
            toastr.remove();
            $(form).find('span.error-text').text('');

          },
          success:function(response){
            if(response.status==1){
               toastr.success(response.msg);
               $('#site_favicon_image').attr('src', response.new_favicon_path);
            }else{
             toastr.error(response.msg);

            }
          },error:function(xhr, status, error){
                toastr.error('An error occurred. Please try again.'+error);

            }

        });
    }else{
        $(form).find('span.error-text').text('please select favicon image from datatype png ,jpg');



    }
    });
   
</script>
  

<?php echo $__env->yieldContent('sc'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('back.pages.page-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\all think proparite laravel\E-Commerce\e-commerce\resources\views/back/pages/admin/settings.blade.php ENDPATH**/ ?>