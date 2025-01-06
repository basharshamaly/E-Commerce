@extends('back.layout.auth-layout')

@section('title','restePassword page')

@push('styles')
@endpush
@section('content')


<body>

    <div
        class="login-wrap d-flex align-items-center flex-wrap justify-content-center"
    >
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="/back/vendors/images/forgot-password.png" alt="" />
                </div>
                <div class="col-md-6">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Reset Password</h2>
                        </div>
                        <h6 class="mb-20">Enter your new password, confirm and submit</h6>
                        <form action="{{ route('admin.reset-password-handler') }}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

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
                                <input
                                    type="password"
                                    name="new_password"
                                    value="{{ old('new_password') }}"
                                    class="form-control form-control-lg @error('new_password') is-invalid @enderror "
                                    placeholder="New Password"
                                />
                                @error('new_password')
                                    <div class="invalid invalid-feedback">
                                        {{ $message }}
                                    </div>
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
                                      name="confirm_new_password"
                                    class="form-control form-control-lg @error('confirm_new_password') is-invalid @enderror"
                                    placeholder="Confirm New Password"
                                />
                                @error('confirm_new_password')
                                    <div class="invalid invalid-feedback">
                                        {{ $message }}
                                    </div>
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
                                        <!--
                                        use code for form submit
                                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
                                    -->
                                        <button
                                            class="btn btn-primary btn-lg btn-block"
                                            href="index.html"
                                            type="submit"
                                            >Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- js -->
    <script src="/back/vendors/scripts/core.js"></script>
    <script src="/back/vendors/scripts/script.min.js"></script>
    <script src="/back/vendors/scripts/process.js"></script>
    <script src="/back/vendors/scripts/layout-settings.js"></script>

</body>

@endsection


@push('scripts')

@endpush
