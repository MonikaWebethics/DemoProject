@extends('layouts.masterlayout')

@section('content')
    @include('include.userprofile-nav')

    <div class="py-5">
        <div class="container border rounded-2 ">
            <div class="row pb-5">
                <div class="col-12 text-center pt-4" style="background-color: #E8E8E8; height: 80px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-image"
                        viewBox="0 0 16 16">
                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                        <path
                            d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z" />
                    </svg>
                </div>
                <div class="col-ld-11 col-md-11 col-sm-12 d-flex align-items-center py-3">
                    <div class="float-left ">
                        <div class=" rounded-circle d-flex justify-content-center "
                            style=" background-color: #E8E8E8; width: 100px; height: 100px; padding-top: 35px; ">
                            <svg xmlns=" http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-image" viewBox="0 0 16 16">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                <path
                                    d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z" />
                            </svg>
                        </div>
                    </div>
                    <div class="userinfo ps-3">
                        <span class="fw-bold fs-5">
                            {{ auth()->user()->fname }} {{ auth()->user()->lname }} </span>
                        <p class="fs-6" style="color:#585C65">
                            {{ auth()->user()->email }} </p>
                    </div>
                </div>

                <form action="{{ route('user.profile.update') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="pb-2 ps-1" for="first name">FIRST Name</label>
                                <input type="text" name="fname" value="{{ auth()->user()->fname }} "
                                    class="form-control " style="background-color: #F9F9F9; height: 50px;"
                                    placeholder="Your First Name">
                            </div>
                            @error('fname')
                                <span class="invalid-feedback d-block pb-1 ps-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="pb-2 ps-1" for="Last Name">LAST Name</label>
                                <input type="text" name="lname" value="{{ auth()->user()->lname }} "
                                    class="form-control " style="background-color: #F9F9F9; height: 50px; "
                                    placeholder="Your Last Name">
                            </div>
                            @error('lname')
                                <span class="invalid-feedback d-block pb-1 ps-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>

                    <div class="row pt-4 ">
                        <div class="col-lg-6 ps-4">
                            <div class="form-group">
                                <label class="form-label">Gender</label>
                                <div class="mb-3  justify-content-between">
                                    <div class=" align-items-center justify-content-center">
                                        <fieldset class="form-group">
                                            <div class="row" style="width:50%">
                                                <div class="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            @if (auth()->user()->gender == 'Male') checked @endif value="Male">
                                                        <label class="form-check-label">
                                                            Male
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            @if (auth()->user()->gender == 'Female') checked @endif value="Female">
                                                        <label class="form-check-label">
                                                            Female
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            @error('gender')
                                <span class="invalid-feedback d-block pb-1 ps-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>



                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="pb-2 ps-1">Country</label>
                                <select id="country-dd" name="country_id" class="form-select"
                                    style="background-color: #F9F9F9; height: 50px;">
                                    <option value="" selected disabled>Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            @if (auth()->user()->country_id == $country->id) selected @endif>{{ $country->country }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('country_id')
                                <span class="invalid-feedback d-block pb-1 ps-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>


                        <div class="col-lg-6 ps-4">
                            <label class="form-label" style="padding-top: 10px">Hobbies</label>
                            <div class="mb-3">
                                <div class="align-items-center justify-content-center">
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hobbies[]"
                                                    @if (is_array(json_decode(auth()->user()->hobbies)) &&
                                                            in_array('Listening to music', json_decode(auth()->user()->hobbies))) checked @endif id="hobby1"
                                                    value="Listening to music">
                                                <label class="form-check-label">
                                                    Listening to music
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hobbies[]"
                                                    @if (is_array(json_decode(auth()->user()->hobbies)) && in_array('Reading', json_decode(auth()->user()->hobbies))) checked @endif id="hobby2"
                                                    value="Reading">
                                                <label class="form-check-label">
                                                    Reading
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hobbies[]"
                                                    @if (is_array(json_decode(auth()->user()->hobbies)) && in_array('Dancing', json_decode(auth()->user()->hobbies))) checked @endif id="hobby3"
                                                    value="Dancing">
                                                <label class="form-check-label">
                                                    Dancing
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hobbies[]"
                                                    @if (is_array(json_decode(auth()->user()->hobbies)) && in_array('Singing', json_decode(auth()->user()->hobbies))) checked @endif id="hobby4"
                                                    value="Singing">
                                                <label class="form-check-label">
                                                    Singing
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @error('hobbies')
                                <span class="invalid-feedback d-block pb-1 ps-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6 pt-3">
                            <div id="state-container" style="display: none;">
                                <div class="form-group">
                                    <label class="pb-2 ps-1">State</label>
                                    <select id="state-dd" name="state_id" class="form-select"
                                        style="background-color: #F9F9F9; height: 50px;">

                                    </select>
                                </div>
                                @error('state_id')
                                    <span class="invalid-feedback d-block pb-1 ps-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                    </div>


                    <div class="row pt-3 ps-1">
                        <div class="col-ld-12 col-md-12 col-sm-12 d-flex align-items-center ">
                            <button type="submit" name="update" class="btn btn-primary">
                                Edit
                            </button>
                        </div>
                    </div>
                </form>





                <div class="col-12 pt-5 ">
                    <div class="row ps-3">
                        <h5>My email Address</h5>
                    </div>
                    <div class="row ps-2">
                        <div class="col-ld-11 col-md-11 col-sm-12 d-flex align-items-center py-1">
                            <div class=" rounded-circle d-flex justify-content-center "
                                style=" background-color: #E8E8E8; width: 45px; height: 45px;  padding-top: 10px;">
                                <img height="24px" width="24px" src="{{ asset('Images/sms.png') }}">
                            </div>

                            <div class="userinfo ps-3 pt-2">
                                <span class=" fs-6">
                                    {{ auth()->user()->email }}
                                </span>
                                <p class="fs-6" style="color:#a7a6a6">1 month ago</p>
                            </div>
                        </div>
                    </div>
                    <div class="row ps-4 pb-3">
                        <button class="btn"
                            style="background-color: #F0F8FF;  border-radius: 8px; 
            width: 200px; height: 50px;">
                            <span
                                style="font-style: normal; font-weight: 400; font-size: 16px; 
            color: #4182F9;">+Add
                                Email Address</span></button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
