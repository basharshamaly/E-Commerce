@extends('back.layout.auth-layout')

@section('title','forgot-password page')

@push('styles')

@endpush

@section('content')


<div
    class="login-wrap d-flex align-items-center flex-wrap justify-content-center"
>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="{{ asset('/back/vendors/images/forgot-password.png') }}" alt="" />
            </div>
            <div class="col-md-6">
                <div class="login-box bg-white box-shadow border-radius-10">
                    <div class="login-title">
                        <h2 class="text-center text-primary">Forgot Password</h2>
                    </div>
                    <h6 class="mb-20">
                        Enter your email address to reset your password
                    </h6>
                    <form action="{{ route('admin.send-password-reset-link') }}" method="GET">
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
                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                placeholder="Email"
                            />
                           @error('email')
                           <div class="invalid invalid-feedback">
                                {{$message}}
                           </div>
                           @enderror
                            <div class="input-group-append custom">
                                <span class="input-group-text"
                                    ><i class="fa fa-envelope-o" aria-hidden="true"></i
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
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" >Submit</button
                                    >
                                </div>
                            </div>
                            <div class="col-2">
                                <div
                                    class="font-16 weight-600 text-center"
                                    data-color="#707373"
                                >
                                    OR
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="input-group mb-0">
                                    <a
                                        class="btn btn-outline-primary btn-lg btn-block"
                                        href="{{ route('admin.login') }}"
                                        >Login</a
                                    >
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
<script src="{{ asset('/back/vendors/scripts/core.js') }}"></script>
<script src="{{ asset('/back/vendors/scripts/script.min.js') }}"></script>
<script src="{{ asset('/back/vendors/scripts/process.js') }}"></script>
<script src="{{ asset('/back/vendors/scripts/layout-settings.js') }}"></script>




@endsection

@push('scripts')
   <script>
    fetch('{{ route('admin.send-password-reset-link') }}', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    body: JSON.stringify({ email: email })
});
</script>
@endpush
