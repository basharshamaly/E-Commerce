@extends('back.layout.auth-layout')

@section('title','login auth example')

@push('styles')
<style>
    /* جعل الصفحة في المنتصف بدون أن تملأ الشاشة بالكامل */
    .login-container {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        width: 100vw;
        background: #f4f6f9;
        padding: 20px;
    }
    
    /* تصغير حجم المحتوى */
    .login-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 80%;
        height: 70vh;
        max-width: 1100px;
        background: #fff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }
    
    /* توزيع الحجم بين الصورة والفورم */
    .login-image, .login-box {
        flex: 1;
    }

    /* التحكم بحجم الصورة */
    .login-image img {
        width: 100%;
        height: auto;
        max-height: 100%;
    }

    /* ضبط حجم الفورم */
    .login-box {
        padding: 20px;
        max-width: 450px;
    }

    /* استجابة للجوال */
    @media (max-width: 768px) {
        .login-wrapper {
            flex-direction: column;
            height: auto;
            text-align: center;
        }
        .login-image {
            width: 100%;
            max-width: 350px;
            margin-bottom: 20px;
        }
        .login-box {
            width: 100%;
        }
    }
</style>
@endpush
@section('content')
<div class="login-container">
    <div class="login-wrapper">
        <!-- صورة تسجيل الدخول -->
        <div class="login-image">
            <img src="{{ asset('back/vendors/images/login-page-img.png') }}" alt="Login Image" class="img-fluid">
        </div>

        <!-- فورم تسجيل الدخول -->
        <div class="login-box">
            <div class="login-title">
                <h2 class="text-center text-primary">Login To Dashboard</h2>
            </div>

            <form action="{{ route('seller.login-handler') }}" method="POST">
                @csrf

                @if (session('fail'))
                <div class="alert alert-danger">
                    {{ session('fail') }}
                </div>
                @endif
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <div class="input-group custom">
                    <input type="text" name="login_id" class="form-control form-control-lg @error('login_id') is-invalid @enderror" value="{{ old('login_id') }}" placeholder="Username/Email"/>
                    @error('login_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                    </div>
                </div>

                <div class="input-group custom">
                    <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="**********"/>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="input-group-append custom">
                        <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                    </div>
                </div>

                <div class="row pb-30">
                    <div class="col-6">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1"/>
                            <label class="custom-control-label" for="customCheck1">Remember</label>
                        </div>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{ route('seller.forgot-password') }}">Forgot Password?</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-group mb-0">
                            <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
                        </div>
                        <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
                        <div class="input-group mb-0">
                            <a class="btn btn-outline-primary btn-lg btn-block" href="register.html">Register To Create Account</a>
                        </div>
                    </div>
                </div>
            </form>
        </div> 
    </div>
</div>
@endsection

@push('scripts')
   
@endpush
