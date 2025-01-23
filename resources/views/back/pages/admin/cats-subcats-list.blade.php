@extends('back.pages.page-layout')

@section('title','page example')

@section('styles')

@endsection

@push('content')

  @livewire('cat-sub-categories-list')

@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // ترتيب التصنيفات الرئيسية
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

            if (positions.length > 0) {
                // إرسال البيانات إلى Livewire
                window.livewire.emit('updateCategoriesOrdering', positions);
            }
        }
    });

    // ترتيب التصنيفات الفرعية
    $('table tbody#subcategories_sortable').sortable({
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

            if (positions.length > 0) {
                // إرسال البيانات إلى Livewire
                window.livewire.emit('updateSubCategoriesOrdering', positions);
            }
        }
    });

    // ترتيب تصنيفات الأطفال
    $('table ul#child_subcategories_sortable').sortable({
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

            if (positions.length > 0) {
                // إرسال البيانات إلى Livewire
                window.livewire.emit('updateChildSubCategoriesOrdering', positions);
            }
        }
    });

    // Toast الرسائل
    window.addEventListener('toastr', event => {
        toastr[event.detail.type](event.detail.message);
    });

    // تأكيد الحذف باستخدام SweetAlert
    $(document).on('click', '.deleteCategory', function(e) {
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
        }).then(function(result) {
            if (result.isConfirmed) {
                window.livewire.emit('deleteCategories', category_id);
            }
        });
    });
</script>



@endpush
