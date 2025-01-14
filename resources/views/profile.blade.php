@extends('layout.app')

@section('title',config('app.name'))

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-header hero__text text-center">
                        <h4>User Profile</h4>
                    </div>
                    <div class="card-body p-4">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p><strong>Name:</strong> {{ Auth::user()->userInfo->fname ?? 'Not Provided' }} {{ Auth::user()->userInfo->lname ?? 'Not Provided' }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p><strong>Contact:</strong> {{ Auth::user()->userInfo->phone ?? 'Not provided' }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Address:</strong> {{ Auth::user()->userInfo->shipaddress ?? 'Not provided' }}</p>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-4">
                            <a href="{{route('profileEdit')}}" class="primary-btn">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

