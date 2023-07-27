@extends('layouts.masterlayout')

@section('content')
    @include('include.userprofile-nav')

    <div class="container py-5">
        <div class="row pb-4 ">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <div id="searchResults"></div>

        <div class="row">
            <div id="user-profile" class="col-lg-4 col-md-4 col-sm-12 me-lg-5 me-md-3 py-5" style="background-color: #F2F2F2;">
                <div class="user-main">
                    <img class="img-fluid" src="../Images/Rectangle 620.png">
                    <h2 class="text-center pt-2" id="name">{{ $user->fname }} {{ auth()->user()->lname }}</h2>
                    <h6 class="text-user text-center pt-2" id="email">{{ $user->email }}</h6>
                    <h6 class="text-user text-center pt-2" id="country1">{{ $country->country }}</h6>
                    <div class="text-center pt-3">

                        <a id="edit" href="{{ route('user.profile.edit') }}"
                            style="text-decoration: none; color: inherit;">
                            <button class="btn btn-primary rounded-0 me-2 mb-2">Edit</button>
                        </a>
                        <a id="change" href="{{ route('change.password.form') }}">
                            <button type="button" class="btn btn-outline-primary rounded-0 mb-2">Change Password</button>
                        </a>

                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 p-5" style="background-color: #F2F2F2;">
                <div class="row userfont">
                    <div class="col-6 pt-lg-5 ps-lg-0 ps-4 fs-5 fw-normal">First Name</div>
                    <div class="col-6 pt-lg-5 ps-lg-0 ps-4 fs-5 fw-normal" id="first-name">{{ $user->fname }}</div>
                    <div class="col-6 pt-lg-3 ps-lg-0 ps-4 fs-5 fw-normal"> Last name </div>
                    <div class="col-6 pt-lg-3 ps-lg-0 ps-4 fs-5 fw-normal" id="last-name">{{ $user->lname }}</div>
                    <div class="col-6 pt-lg-3 ps-lg-0 ps-4 fs-5 fw-normal">Gender </div>
                    <div class="col-6 pt-lg-3 ps-lg-0 ps-4 fs-5 fw-normal" id="gender">{{ $user->gender }}</div>
                    <div class="col-6 pt-lg-3 ps-lg-0 ps-4 fs-5 fw-normal">Country</div>
                    <div class="col-6 pt-lg-3 ps-lg-0 ps-4 fs-5 fw-normal" id="country">{{ $country->country }}
                    </div>
                    <div class="col-6 pt-lg-3 ps-lg-0 ps-4 fs-5 fw-normal">State</div>
                    <div class="col-6 pt-lg-3 ps-lg-0 ps-4 fs-5 fw-normal" id="state">{{ $state->state }}</div>
                    <div class="col-6 pt-lg-3 ps-lg-0 ps-4 fs-5 fw-normal">Hobbies</div>
                    <div class="col-6 pt-lg-3 ps-lg-0 ps-4 fs-5 fw-normal" id="hobbies">
                        {{ implode(', ', json_decode($user->hobbies)) }}</div>


                </div>
            </div>
        </div>
    </div>
@endsection
