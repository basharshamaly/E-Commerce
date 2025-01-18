<?php $__env->startSection('title','page example'); ?>

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('content'); ?>

  <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('cat-sub-categories-list')->html();
} elseif ($_instance->childHasBeenRendered('pKXBa1H')) {
    $componentId = $_instance->getRenderedChildComponentId('pKXBa1H');
    $componentTag = $_instance->getRenderedChildComponentTagName('pKXBa1H');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('pKXBa1H');
} else {
    $response = \Livewire\Livewire::mount('cat-sub-categories-list');
    $html = $response->html();
    $_instance->logRenderedChild('pKXBa1H', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('table tbody#sortable_categories').sortable({
        cursor: 'move',
        update: function(event, ui) {
            var positions = [];
            $(this).children().each(function(index) {
                if ($(this).attr("data-ordering") != (index + 1)) {
                    $(this).attr("data-ordering", (index + 1)).addClass('updated');
                }
            });

            $(".updated").each(function() {
                positions.push([$(this).attr("data-index"), $(this).attr("data-ordering")]);
                $(this).removeClass("updated");
            });

            // إرسال البيانات إلى Livewire
            window.livewire.emit('updateCategoriesOrdering', positions);
        }
    });

    window.addEventListener('toastr', event => {
    toastr[event.detail.type](event.detail.message);
});

$(document).on('click', '.deleteCategory', function (e) {
    e.preventDefault();
    var category_id = $(this).data('id');
    Swal.fire({
        title: 'Are you sure?',
        showCloseButton: true,
        showCancelButton: true,
        html: 'You want to delete this category',
        cancelButtonText: 'Cancel',
        confirmButtonText: 'Yes, delete',
        width: 300,
        cancelButtonColor: '#d33',
        confirmButtonColor: '#3085d6',
        allowOutsideClick: false,
    }).then(function (result) {
        if (result.isConfirmed) {
            window.livewire.emit('deleteCategories', category_id);
        }
    });
});


</script>


<?php $__env->stopPush(); ?>

<?php echo $__env->make('back.pages.page-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\all think proparite laravel\E-Commerce\e-commerce\resources\views/back/pages/admin/cats-subcats-list.blade.php ENDPATH**/ ?>