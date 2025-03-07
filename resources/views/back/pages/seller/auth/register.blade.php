@extends('back.layout.auth-layout')

@section('title','register auth example')

@push('styles')
@endpush

@section('content')

 <div class="login-box bg-white box-shadow border-radius-10">

    <div class="login-title">
        <h2 class="text-center text-primary">
            Create Seller Account 
        </h2>
    </div>

    <form action="{{ route('seller.createSeller') }}" method="post">
        @csrf
        <x-alert-form\>
            <div class="form-group">
              <label for="">FullName</label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Enter Full Name" value="{{ old('name') }}">
             @error('name')
                 <span class="text-danger ml-2">{{ $message }}</span>
             @enderror
            </div>

            <div class="form-group">
              <label for="">Email</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="Enter  Email" value="{{ old('email') }}">
                @error('email')
                <span class="text-danger ml-2">{{ $message }}</span>
            @enderror
            </div>
            <div class="form-group">
              <label for="">Password</label>
                <input class="form-control" type="password" name="password" id="password" placeholder="Enter  password">
                @error('password')
                <span class="text-danger ml-2">{{ $message }}</span>
            @enderror
            </div>
            <div class="form-group">
              <label for="">Confirm_Password</label>
                <input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="Enter  password">
                @error('confirm_password')
                <span class="text-danger ml-2">{{ $message }}</span>
            @enderror
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="input-group mb-0">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Create Account</button>
                    </div>
                </div>
            </div>

            <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373" style="color: rgb(112,115,115);">
             OR
            </div>
            <div class="input-group mb-0">
                <a href="{{ route('seller.login') }}" class="btn btn-outline-primary btn-lg btn-block">SignIn</a>
            </div>
            
    </form>
 </div>
         
@endsection 

@push('scripts')
   
@endpush
