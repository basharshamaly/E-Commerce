@extends('back.pages.page-layout')

@section('title','page example')

@section('styles')

@endsection

@push('content')



<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Profile</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('seller.home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Profile
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    @livewire('seller.seller-profile')
</div>
@endpush

@push('scripts')
   
<script>
   $('input[type="file"][id="sellerProfilePictureFile"]').kropify({
    preview: 'sellerProfilePicture',
    viewMode: 1,
    aspectRatio: 1,
    cancelButtonText: 'Cancel',
    resetButtonText: 'Reset',
    cropButtonText: 'Crop & update',
    processURL: '{{ route("seller.seller-profile-picture") }}',
    maxSize: 2097152, //2MB
    showLoader: true,
    animationClass: 'headShake',
    fileName: 'sellerProfilePictureFile', // ✅ هنا صار نفس اسم الحقل اللي تتوقعه PHP
    success: function (data) {
        if (data.status == 1) {
            livewire.emit('UpdateAdminSellerHeaderInfo');
            livewire.emit('UpdateSellerProfilePicture');
            toastr.success(data.msg);
        } else {
            toastr.error(data.msg);
        }
    },
    errors: function (error, text) {
        console.log(text);
    }
});

</script>

{{-- 
@yield('ssss') --}}
@endpush
