@extends('layout.app') <!-- Adjust to your layout file if different -->

@section('title', 'Register | '.config('app.name'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center hero__text">
                    <h4>Register Account</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('registration')}}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="email">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Enter your username" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
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


                        <button type="submit" class="primary-btn w-100">Register</button>
                    </form>
                </div>
            </div>
            <div class="text-center mt-3">
                <p>Already have an account? <a href="{{route('login')}}" class="no-hover">Login here</a></p>
            </div>
        </div>
    </div>

@endsection

