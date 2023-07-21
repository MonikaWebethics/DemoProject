@extends('layouts.masterlayout')

@section('content')
    @include('include.userprofile-nav')

    <div class="container py-5">

        <div class="pass-main">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <img class="img-fluid" src="Images/Rectangle (1).png" />
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12" style="background-color: #fcfcfc">
                    <div class="forget-main pt-5">
                        <form method="POST" action="{{ route('change.password') }}">
                            @csrf
                            <div>
                                <label for="InputEmail1" class="form-label fw-bold label-log pt-4"
                                    style="color: #6b6c6f">Current Password
                                </label>
                                <div class="mb-3 d-flex  border border-1">
                                    <span class="py-lg-2 ps-lg-3 py-2 ps-2">
                                        <svg width="27" height="15" viewBox="0 0 27 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M21.6763 14.2268C20.3722 14.2268 19.3052 13.1598 19.3052 11.8557V9.48454H14.0887C13.1402 12.3299 10.4134 14.2268 7.44949 14.2268C5.31547 14.2268 3.30001 13.2783 1.87733 11.6185C0.573208 9.95875 0.0989849 7.7062 0.454655 5.57218C1.04744 2.84538 3.30001 0.711347 6.02682 0.118564C6.50104 0.0395261 6.97527 0 7.44949 0C10.4134 0 13.1402 1.89691 14.0887 4.74227H24.0474C25.3516 4.74227 26.4186 5.80928 26.4186 7.1134C26.4186 8.41753 25.3516 9.48454 24.0474 9.48454V11.8557C24.0474 13.1598 22.9804 14.2268 21.6763 14.2268ZM7.44949 4.74227C6.14537 4.74227 5.07836 5.80928 5.07836 7.1134C5.07836 8.41753 6.14537 9.48454 7.44949 9.48454C8.75362 9.48454 9.82063 8.41753 9.82063 7.1134C9.82063 5.80928 8.75362 4.74227 7.44949 4.74227Z"
                                                fill="#C8C8C8"></path>
                                        </svg>
                                    </span>
                                    <span class="input-style d-flex align-items-center justify-content-center">
                                        <input type="password" name="current_password"
                                            class="form-control border border-0 @error('current_password') is-invalid @enderror"
                                            placeholder="Current password" />
                                    </span>
                                </div>
                                @error('current_password')
                                    <span class="invalid-feedback d-block pb-1 ps-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <span class="text-danger">

                            </span>
                            <div>
                                <label for="InputEmail1" class="form-label fw-bold label-log pt-4"
                                    style="color: #6b6c6f">New Password
                                </label>
                                <div class="mb-3 d-flex  border border-1">
                                    <span class="py-lg-2 ps-lg-3 py-2 ps-2">
                                        <svg width="27" height="15" viewBox="0 0 27 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M21.6763 14.2268C20.3722 14.2268 19.3052 13.1598 19.3052 11.8557V9.48454H14.0887C13.1402 12.3299 10.4134 14.2268 7.44949 14.2268C5.31547 14.2268 3.30001 13.2783 1.87733 11.6185C0.573208 9.95875 0.0989849 7.7062 0.454655 5.57218C1.04744 2.84538 3.30001 0.711347 6.02682 0.118564C6.50104 0.0395261 6.97527 0 7.44949 0C10.4134 0 13.1402 1.89691 14.0887 4.74227H24.0474C25.3516 4.74227 26.4186 5.80928 26.4186 7.1134C26.4186 8.41753 25.3516 9.48454 24.0474 9.48454V11.8557C24.0474 13.1598 22.9804 14.2268 21.6763 14.2268ZM7.44949 4.74227C6.14537 4.74227 5.07836 5.80928 5.07836 7.1134C5.07836 8.41753 6.14537 9.48454 7.44949 9.48454C8.75362 9.48454 9.82063 8.41753 9.82063 7.1134C9.82063 5.80928 8.75362 4.74227 7.44949 4.74227Z"
                                                fill="#C8C8C8"></path>
                                        </svg>
                                    </span>
                                    <span class="input-style d-flex align-items-center justify-content-center">
                                        <input type="password" name="password"
                                            class="form-control border border-0 @error('password') is-invalid @enderror"
                                            placeholder="New password" />
                                    </span>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback d-block pb-1 ps-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <span class="text-danger">
                            </span>
                            <div>
                                <label for="InputEmail1" class="form-label fw-bold label-log pt-4"
                                    style="color: #6b6c6f">Confirm Password
                                </label>
                                <div class="mb-3 d-flex  border border-1">
                                    <span class="py-lg-2 ps-lg-3 py-2 ps-2">
                                        <svg width="27" height="15" viewBox="0 0 27 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M21.6763 14.2268C20.3722 14.2268 19.3052 13.1598 19.3052 11.8557V9.48454H14.0887C13.1402 12.3299 10.4134 14.2268 7.44949 14.2268C5.31547 14.2268 3.30001 13.2783 1.87733 11.6185C0.573208 9.95875 0.0989849 7.7062 0.454655 5.57218C1.04744 2.84538 3.30001 0.711347 6.02682 0.118564C6.50104 0.0395261 6.97527 0 7.44949 0C10.4134 0 13.1402 1.89691 14.0887 4.74227H24.0474C25.3516 4.74227 26.4186 5.80928 26.4186 7.1134C26.4186 8.41753 25.3516 9.48454 24.0474 9.48454V11.8557C24.0474 13.1598 22.9804 14.2268 21.6763 14.2268ZM7.44949 4.74227C6.14537 4.74227 5.07836 5.80928 5.07836 7.1134C5.07836 8.41753 6.14537 9.48454 7.44949 9.48454C8.75362 9.48454 9.82063 8.41753 9.82063 7.1134C9.82063 5.80928 8.75362 4.74227 7.44949 4.74227Z"
                                                fill="#C8C8C8"></path>
                                        </svg>
                                    </span>
                                    <span class="input-style d-flex align-items-center justify-content-center">
                                        <input type="password" name="password_confirmation"
                                            class="form-control border border-0 " placeholder="Confirm Password" />
                                    </span>
                                </div>
                            </div>
                            <span class="text-danger">

                            </span>

                            <div class="d-grid gap-6 mx-auto pt-2">
                                <button type="submit" class="cst-log">
                                    {{ __('Change Password') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
