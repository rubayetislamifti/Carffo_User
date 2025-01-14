@extends('layout.app')

@section('title',config('app.name'))

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded">
                <div class="card-header hero__text text-center">
                    <h4>Edit Profile</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{route('profileEdit.create')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="fname" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="fname" name="fname"
                                       value="{{ old('fname', Auth::user()->userInfo->fname ?? '') }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="lname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lname" name="lname"
                                       value="{{ old('lname', Auth::user()->userInfo->lname ?? '') }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                       value="{{ old('email', Auth::user()->email) }}" required disabled>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Secondary Email Address</label>
                                <input type="email" class="form-control" id="email" name="semail"
                                       value="{{ old('semail', Auth::user()->userInfo->semail ?? '') }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="contact" name="contact"
                                   value="{{ old('contact', Auth::user()->userInfo->phone ?? '') }}">
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3">{{ old('address', Auth::user()->userInfo->shipaddress ?? '') }}</textarea>
                        </div>


                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <select class="form-control w-100" id="city" name="city">
                                <option value="">Select City</option>
                                @php
                                    $districts = [
                                        'Dhaka','Faridpur','Gazipur','Gopalganj','Jamalpur','Kishoreganj',
                                        'Madaripur','Manikganj','Munshiganj','Mymensingh','Narayanganj','Narsingdi',
                                        'Netrokona','Rajbari','Shariatpur','Sherpur','Tangail','Bogra',
                                        'Joypurhat','Naogaon','Natore','Nawabganj','Pabna','Rajshahi',
                                        'Sirajganj','Dinajpur','Gaibandha','Kurigram','Lalmonirhat','Nilphamari',
                                        'Panchagarh','Rangpur','Thakurgaon','Barguna','Barisal','Bhola',
                                        'Jhalokati','Patuakhali','Pirojpur','Bandarban','Brahmanbaria',
                                        'Chandpur',
                                        'Chittagong',
                                        'Comilla',
                                        'Cox\s Bazar',
                                        'Feni',
                                        'Khagrachari',
                                        'Lakshmipur',
                                        'Noakhali',
                                        'Rangamati',
                                        'Habiganj',
                                        'Maulvibazar',
                                        'Sunamganj',
                                        'Sylhet',
                                        'Bagerhat',
                                        'Chuadanga',
                                        'Jessore',
                                        'Jhenaidah',
                                        'Khulna',
                                        'Kushtia',
                                        'Magura',
                                        'Meherpur',
                                        'Narail',
                                        'Satkhira'
                                    ];
                                @endphp
                                @foreach ($districts as $district)
                                    <option value="{{ $district }}" {{ old('city', Auth::user()->userInfo->city ?? '') == $district ? 'selected' : '' }}>
                                        {{ $district }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                                <label for="country" class="form-label">Coutry</label>
                                <input type="text" class="form-control" id="country" name="country"
                                       value="{{ old('country', Auth::user()->userInfo->country ?? '') }}">
                            </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="primary-btn">Save Changes</button>
                            <a href="#" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
