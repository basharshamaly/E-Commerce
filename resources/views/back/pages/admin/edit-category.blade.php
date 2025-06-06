@extends('back.pages.page-layout')

@section('title','page create category')

@section('styles')

@endsection

@push('content')
   

 <div class="row">
    <div class="col-md-12">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h5 class="text-dark">Edit Category</h5>
                </div>
                <div class="pull-right">
                    <a href="{{ route('admin.category.cat-sub-cat-list') }}" class="btn btn-primary btn-sm " > <i class="ion-arrow-left-a"></i> Back to categories List </a>
                </div>
            </div>
            <form action="{{ route('admin.category.update-category',$categories->id) }}" method="post" enctype="multipart/form-data" class="mt-3">
                @method('PUT')
            @csrf
            @if(Session::has('success'))
            <div class="alert alert-success">
                <strong>Success:</strong> {!! Session::get('success') !!}
            </div>
        @endif
        
        @if(Session::has('fail'))
            <div class="alert alert-danger">
                <strong>Error:</strong> {!! Session::get('fail') !!}
            </div>
        @endif
        
        <div class="row">
            <div class="col-md-7">
                <div class="form-group">
                    <label for="">Category Name</label>
                    <input type="text" name="category_name" id="category_name" placeholder="enter category_name" class="form-control" value="{{ $categories->category_name }}">
                    @error('category_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-7">
                <div class="form-group">
                    <label for="">Category Image</label>
                    <input type="file" name="category_image" id="category_image" placeholder="enter category_image" class="form-control" value="{{ old('category_image') }}">
                    @error('category_image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-7">
                <div class="avatar mb-3 ">
                    <label class="d-block font-weight-bold mb-2">Current Image</label>
                    <img 
                    src="{{ asset('images/categories/' . $categories->category_image) }}" 
                    alt="Category Image Preview" 
                    id="category_image_preview" 
                    class="img-thumbnail" 
                    style="width: 100px; height: 100px; object-fit: cover;"
                >
                


     
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        </form>
        </div>
    </div>
 </div>

@endpush

@push('scripts')
   <script>
    $('input[type="file"][name="category_image"]').ijaboViewer({
        preview:'#category_image_preview',
        allowedExtensions:['jpg','png','jpeg','svg'],
        imageShape:'square',
        onErrorShape:function(message,element){
            alert(message);
        },OnInvalidType:function(message,element){
            alert(message);
        },OnSuccess:function(message,element){},
    })
   </script>
@endpush
