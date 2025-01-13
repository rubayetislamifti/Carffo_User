@extends('layout.app') <!-- Adjust to your layout file if different -->

@section('title', 'Login | '.config('app.name') )

@section('content')
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center hero__text">
                        <h4>Login to Your Account</h4>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
{{--                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
                            </div>
                        @endif
                            @if(session('error'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    {{--                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
                                </div>
                            @endif
                        <form action="{{route('loggin')}}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="email">Email Address</label>
                                <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Enter your email" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                            </div>

                            <div class="form-group mb-3">
                                {!! htmlFormSnippet() !!}
                                @error('g-recaptcha-response')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <div class="form-check">
                                    <a class="no-hover" href="">Forget Password?</a>
                                </div>
                            </div>

                            <button type="submit" class="primary-btn w-100">Login</button>
                        </form>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <p>Don't have an account? <a href="{{route('register')}}" class="no-hover">Register here</a></p>
                </div>
            </div>
        </div>

@endsection
