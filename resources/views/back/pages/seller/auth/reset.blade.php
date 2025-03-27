@extends('back.layout.auth-layout')

@section('title','latout auth example')

@push('styles')
@endpush
@section('content')


<div class="container">
    <div class="row align-items-center">
        <div class="col-md-6">
            <img src="{{ asset('back/vendors/images/forgot-password.png') }}" alt="" />
        </div>
        <div class="col-md-6">
            <div class="login-box bg-white box-shadow border-radius-10">
                <div class="login-title">
                    <h2 class="text-center text-primary">Reset Password</h2>
                </div>
                <h6 class="mb-20">Enter your new password, confirm and submit</h6>
                <form action="{{ route('seller.reset-password-handler') }}" method="POST">
                    @csrf
                    <x-alert-form\>
                        <input type="hidden" name="token" value="{{request()->token}}">
                    <div class="input-group custom">
                        <input
                            type="password"
                            class="form-control form-control-lg"
                            placeholder="New Password"
                            name="new_password"
                            value="{{ old('new_password') }}"
                        />
                        @error('new_password')
                             <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="input-group-append custom">
                            <span class="input-group-text"
                                ><i class="dw dw-padlock1"></i
                            ></span>
                        </div>
                    </div>
                    <div class="input-group custom">
                        <input
                            type="password"
                            class="form-control form-control-lg"
                            placeholder="Confirm New Password"
                            name="confirm_new_password"
                            value="{{ old('confirm_new_password') }}"

                        />
                        @error('confirm_new_password')
                        <span class="text-danger">{{$message}}</span>
                   @enderror
                        <div class="input-group-append custom">
                            <span class="input-group-text"
                                ><i class="dw dw-padlock1"></i
                            ></span>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-5">
                            <div class="input-group mb-0">

                                {{-- use code for form submit --}}
                                <button class="btn btn-primary btn-lg btn-block" type="submit">
                                    submit
                                </button>



                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

@endpush
