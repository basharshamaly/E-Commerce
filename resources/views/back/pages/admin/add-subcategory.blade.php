@extends('back.pages.page-layout')

@section('title','page create subcategory')

@section('styles')

@endsection

@push('content')


 <div class="row">
    <div class="col-md-12">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h5 class="text-dark">Add SubCategory</h5>
                </div>
                <div class="pull-right">
                    <a href="{{ route('admin.category.cat-sub-cat-list') }}" class="btn btn-primary btn-sm " > <i class="ion-arrow-left-a"></i> Back to categories List </a>
                </div>
            </div>
            <form action="{{ route('admin.category.store-subcategory') }}" method="post" class="mt-3">
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
                    <label for="">Paerant Category</label>
                       <select id="parent_category" name="parent_category" class="form-control">
                        <option value="">
                          Not set Paerant Category
                        </option>
                        @foreach($categories as $category)
                        <option value="{{$category->id }}" {{ old('parent_category')==$category->id?'selected':'' }}>
                            {{ $category->category_name }}
                        </option>


                        @endforeach
                       </select>
                    @error('parent_category')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-7">
                <div class="form-group">
                    <label for="">SubCategory Name</label>
                    <input type="text" name="subcategory_name" id="subcategory_name" placeholder="enter subcategory_name" class="form-control" value="{{ old('subcategory_name') }}">
                    @error('subcategory_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-7">
                <div class="form-group">
                    <label for="">Is Child Of</label>
                        <select name="is_child_of" id="is_child_of" class="form-control">
                            <option value="0">------</option>
                            @foreach ($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                            @endforeach
                        </select>
                    @error('is_child_of')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

    </div>

        <button type="submit" class="btn btn-primary">CREATE</button>
        </form>
        </div>
    </div>
 </div>

@endpush

@push('scripts')

@endpush
