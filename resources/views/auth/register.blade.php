@extends('layouts.masterlayout')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 p-4">
                <img class="img-fluid" src="../Images/Illustration (2).png" />
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12" style="background-color: #fcfcfc">
                <div class="log-main pt-3 pe-lg-5">
                    <h2 class="pb-3 text-center">Signup to your account</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- First Name -->
                        <label for="First Name" class="form-label fw-bold label-log"
                            style="color: #6b6c6f">{{ __('First Name') }}</label>
                        <div class="mb-3 d-flex border border-1">
                            <!-- Input Icon -->
                            <span class="py-lg-2 ps-lg-3 py-2 ps-2" style="color: #c8c8c8">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor"
                                    class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd"
                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg>
                            </span>
                            <!-- Input Field -->
                            <span class="input-style d-flex align-items-center justify-content-center">
                                <input id="fname" type="text" placeholder="Johan"
                                    class="form-control border border-0 " name="fname" value="{{ old('fname') }}"
                                    autocomplete="fname" autofocus>
                            </span>
                        </div>
                        <!-- First Name Error -->
                        @error('fname')
                            <span class="invalid-feedback d-block pb-1 ps-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <!-- Last Name -->
                        <div>
                            <label for="last name" class="form-label fw-bold label-log"
                                style="color: #6b6c6f">{{ __('Last Name') }}</label>
                            <div class="mb-3 d-flex  border border-1">
                                <span class="py-lg-2 ps-lg-3 py-2 ps-2" style="color: #c8c8c8">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="20"
                                        fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                        <path fill-rule="evenodd" fill="#C8C8C8"
                                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                    </svg>
                                </span>
                                <span class="input-style d-flex align-items-center justify-content-center">
                                    <input id="lname" type="text" placeholder="Deo"
                                        class="form-control border border-0 " name="lname" value="{{ old('lname') }}"
                                        autocomplete="lname" autofocus>

                                </span>
                            </div>
                        </div>
                        @error('lname')
                            <span class="invalid-feedback d-block pb-1 ps-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <!-- Email -->
                        <div>
                            <label for="InputEmail" class="form-label fw-bold label-log"
                                style="color: #6b6c6f">{{ __('Email Address') }}</label>
                            <div class="mb-3 d-flex  border border-1">
                                <span class="py-lg-2 ps-lg-3 py-2 ps-2">
                                    <svg width="25" height="20" viewBox="0 0 25 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M22.0516 19.6488H3.08256C1.77844 19.6488 0.711426 18.5817 0.711426 17.2776V3.05082C0.711426 1.7467 1.77844 0.679688 3.08256 0.679688H22.0516C23.3558 0.679688 24.4228 1.7467 24.4228 3.05082V17.2776C24.4228 18.5817 23.3558 19.6488 22.0516 19.6488ZM3.08256 5.89618V17.2776H22.0516V5.89618L12.5671 11.824L3.08256 5.89618ZM3.08256 3.05082L12.5671 8.97866L22.0516 3.05082H3.08256Z"
                                            fill="#C8C8C8"></path>
                                    </svg>
                                </span>
                                <span class="input-style d-flex align-items-center justify-content-center">
                                    <input id="email" type="email" placeholder="Your e-mail"
                                        class="form-control border border-0 " name="email" value="{{ old('email') }}"
                                        autocomplete="email">
                                </span>
                            </div>
                        </div>
                        @error('email')
                            <span class="invalid-feedback d-block pb-1 ps-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <!-- Password -->
                        <div>
                            <label for="InputPassword1" class="form-label fw-bold label-log"
                                style="color: #6b6c6f">{{ __('Password') }}</label>
                            <div class=" mb-3 d-flex justify-content-between    border border-1">

                                <span class="py-lg-2 ps-lg-3 py-2 ps-2">
                                    <svg width="27" height="15" viewBox="0 0 27 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21.6763 14.2268C20.3722 14.2268 19.3052 13.1598 19.3052 11.8557V9.48454H14.0887C13.1402 12.3299 10.4134 14.2268 7.44949 14.2268C5.31547 14.2268 3.30001 13.2783 1.87733 11.6185C0.573208 9.95875 0.0989849 7.7062 0.454655 5.57218C1.04744 2.84538 3.30001 0.711347 6.02682 0.118564C6.50104 0.0395261 6.97527 0 7.44949 0C10.4134 0 13.1402 1.89691 14.0887 4.74227H24.0474C25.3516 4.74227 26.4186 5.80928 26.4186 7.1134C26.4186 8.41753 25.3516 9.48454 24.0474 9.48454V11.8557C24.0474 13.1598 22.9804 14.2268 21.6763 14.2268ZM7.44949 4.74227C6.14537 4.74227 5.07836 5.80928 5.07836 7.1134C5.07836 8.41753 6.14537 9.48454 7.44949 9.48454C8.75362 9.48454 9.82063 8.41753 9.82063 7.1134C9.82063 5.80928 8.75362 4.74227 7.44949 4.74227Z"
                                            fill="#C8C8C8"></path>
                                    </svg>
                                </span>


                                <span class="input-style d-flex align-items-center justify-content-center">
                                    <input id="password" type="password" placeholder="Enter password"
                                        class="form-control border border-0 " name="password"
                                        autocomplete="new-password">
                                </span>

                                <span class="pe-lg-3 py-2 pe-2 ms-auto">
                                    <svg width="20" height="14" viewBox="0 0 20 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9.86571 13.7637C7.73169 13.7637 5.59767 13.1709 3.93787 11.8668C2.15952 10.6812 0.855383 9.02144 0.144043 7.12453C0.855383 5.22763 2.15952 3.56783 3.93787 2.38227C5.59767 1.07814 7.73169 0.485352 9.86571 0.485352C11.9997 0.485352 14.1337 1.07814 15.7935 2.38227C17.5719 3.56783 18.876 5.22763 19.5874 7.12453C18.876 9.02144 17.5719 10.6812 15.7935 11.8668C14.1337 13.1709 11.9997 13.7637 9.86571 13.7637ZM9.86571 2.61939C7.37602 2.61939 5.47909 4.63484 5.47909 7.12453C5.47909 9.61422 7.37602 11.6297 9.86571 11.6297C12.3554 11.6297 14.2523 9.61422 14.2523 7.12453C14.2523 4.63484 12.3554 2.61939 9.86571 2.61939ZM9.86571 9.7328C8.44303 9.7328 7.25745 8.54721 7.25745 7.12453C7.25745 5.70185 8.44303 4.39774 9.86571 4.39774C11.2884 4.39774 12.5925 5.70185 12.5925 7.12453C12.5925 8.54721 11.2884 9.7328 9.86571 9.7328Z"
                                            fill="#C8C8C8"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback d-block pb-1 ps-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <!-- password-confirm -->
                        <div>
                            <label for="InputPassword1" class="form-label fw-bold label-log"
                                style="color: #6b6c6f">{{ __('Confirm Password') }}</label>
                            <div class=" mb-3 d-flex justify-content-between    border border-1">

                                <span class="py-lg-2 ps-lg-3 py-2 ps-2">
                                    <svg width="27" height="15" viewBox="0 0 27 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21.6763 14.2268C20.3722 14.2268 19.3052 13.1598 19.3052 11.8557V9.48454H14.0887C13.1402 12.3299 10.4134 14.2268 7.44949 14.2268C5.31547 14.2268 3.30001 13.2783 1.87733 11.6185C0.573208 9.95875 0.0989849 7.7062 0.454655 5.57218C1.04744 2.84538 3.30001 0.711347 6.02682 0.118564C6.50104 0.0395261 6.97527 0 7.44949 0C10.4134 0 13.1402 1.89691 14.0887 4.74227H24.0474C25.3516 4.74227 26.4186 5.80928 26.4186 7.1134C26.4186 8.41753 25.3516 9.48454 24.0474 9.48454V11.8557C24.0474 13.1598 22.9804 14.2268 21.6763 14.2268ZM7.44949 4.74227C6.14537 4.74227 5.07836 5.80928 5.07836 7.1134C5.07836 8.41753 6.14537 9.48454 7.44949 9.48454C8.75362 9.48454 9.82063 8.41753 9.82063 7.1134C9.82063 5.80928 8.75362 4.74227 7.44949 4.74227Z"
                                            fill="#C8C8C8"></path>
                                    </svg>
                                </span>

                                <span class="input-style d-flex align-items-center justify-content-center">
                                    <input id="password-confirm" type="password" placeholder="Enter password"
                                        class="form-control border border-0" name="password_confirmation"
                                        autocomplete="new-password">

                                </span>
                                <span class="pe-lg-3 py-2 pe-2 ms-auto">
                                    <svg width="20" height="14" viewBox="0 0 20 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9.86571 13.7637C7.73169 13.7637 5.59767 13.1709 3.93787 11.8668C2.15952 10.6812 0.855383 9.02144 0.144043 7.12453C0.855383 5.22763 2.15952 3.56783 3.93787 2.38227C5.59767 1.07814 7.73169 0.485352 9.86571 0.485352C11.9997 0.485352 14.1337 1.07814 15.7935 2.38227C17.5719 3.56783 18.876 5.22763 19.5874 7.12453C18.876 9.02144 17.5719 10.6812 15.7935 11.8668C14.1337 13.1709 11.9997 13.7637 9.86571 13.7637ZM9.86571 2.61939C7.37602 2.61939 5.47909 4.63484 5.47909 7.12453C5.47909 9.61422 7.37602 11.6297 9.86571 11.6297C12.3554 11.6297 14.2523 9.61422 14.2523 7.12453C14.2523 4.63484 12.3554 2.61939 9.86571 2.61939ZM9.86571 9.7328C8.44303 9.7328 7.25745 8.54721 7.25745 7.12453C7.25745 5.70185 8.44303 4.39774 9.86571 4.39774C11.2884 4.39774 12.5925 5.70185 12.5925 7.12453C12.5925 8.54721 11.2884 9.7328 9.86571 9.7328Z"
                                            fill="#C8C8C8"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        @error('password_confirmation')
                            <span class="invalid-feedback d-block pb-1 ps-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <!-- Country -->
                        <label class="form-label fw-bold label-log" style="color: #6b6c6f">{{ __('Country') }}</label>
                        <div class="mb-3 d-flex justify-content-between border border-1">
                            <span class="py-lg-2 ps-lg-3 py-2 ps-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#C8C8C8"
                                    class="bi bi-globe-central-south-asia" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0ZM4.882 1.731a.482.482 0 0 0 .14.291.487.487 0 0 1-.126.78l-.291.146a.721.721 0 0 0-.188.135l-.48.48a1 1 0 0 1-1.023.242l-.02-.007a.996.996 0 0 0-.462-.04 7.03 7.03 0 0 1 2.45-2.027Zm-3 9.674.86-.216a1 1 0 0 0 .758-.97v-.184a1 1 0 0 1 .445-.832l.04-.026a1 1 0 0 0 .152-1.54L3.121 6.621a.414.414 0 0 1 .542-.624l1.09.818a.5.5 0 0 0 .523.047.5.5 0 0 1 .724.447v.455a.78.78 0 0 0 .131.433l.795 1.192a1 1 0 0 1 .116.238l.73 2.19a1 1 0 0 0 .949.683h.058a1 1 0 0 0 .949-.684l.73-2.189a1 1 0 0 1 .116-.238l.791-1.187A.454.454 0 0 1 11.743 8c.16 0 .306.084.392.218.557.875 1.63 2.282 2.365 2.282a.61.61 0 0 0 .04-.001 7.003 7.003 0 0 1-12.658.905Z" />
                                </svg>
                            </span>
                            <span class="d-flex align-items-center justify-content-center flex-grow-1">
                                <div class="form-group border-0 w-100">
                                    <select name="country" class="form-select h-100 bg-transparent border-0 fw-bold"
                                        style="outline: none; box-shadow: none; color: #C8C8C8;">
                                        <option value="" selected disabled>Select Country</option>
                                        <option value="India" @if (old('country') == 'India') selected @endif>India
                                        </option>
                                        <option value="United States" @if (old('country') == 'United States') selected @endif>
                                            United States</option>
                                        <option value="Canada" @if (old('country') == 'Canada') selected @endif>Canada
                                        </option>
                                    </select>
                                </div>
                            </span>
                        </div>
                        @error('country')
                            <span class="invalid-feedback d-block pb-1 ps-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        {{-- <!-- state -->
          <div id="statesContainer"></div>
          <input type="hidden" id="selectedStateID" name="selected_state_id" value=""> --}}


                        <!-- Gender -->
                        <label class="form-label fw-bold label-log" style="color: #6b6c6f">{{ __('Gender') }}</label>
                        <div class="mb-3  justify-content-between">
                            <div class=" align-items-center justify-content-center">
                                <fieldset class="form-group">
                                    <div class="row" style="width:50%">
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    value="Female" @if (old('gender') == 'Female') checked @endif>
                                                <label class="form-check-label" style="color: #909192; font-weigth:15px">
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    value="Male" @if (old('gender') == 'Male') checked @endif>
                                                <label class="form-check-label" style="color: #909192; font-weigth:15px">
                                                    Male
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        @error('gender')
                            <span class="invalid-feedback d-block pb-1 ps-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <!-- Hobbies -->
                        <label class="form-label fw-bold label-log" style="color: #6b6c6f">{{ __('Hobbies') }}</label>
                        <div class="mb-3  justify-content-between">
                            <div class=" align-items-center justify-content-center">
                                <div class="form-group row" style="color: #909192;">
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hobbies[]"
                                                    value="Listening to music"
                                                    @if (is_array(old('hobbies')) && in_array('Listening to music', old('hobbies'))) checked @endif>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Listening to music
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hobbies[]"
                                                    value="Reading" @if (is_array(old('hobbies')) && in_array('Reading', old('hobbies'))) checked @endif>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Reading
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hobbies[]"
                                                    value="Dancing" @if (is_array(old('hobbies')) && in_array('Dancing', old('hobbies'))) checked @endif>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Dancing
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hobbies[]"
                                                    value="Singing" @if (is_array(old('hobbies')) && in_array('Singing', old('hobbies'))) checked @endif>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Singing
                                                </label>
                                            </div>
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

                        <div class="mb-3 form-check d-flex">
                            <div class="p-2">
                                <input type="checkbox"
                                    class="form-check-input rounded-1 border-2 checkboxsize border-secondary"
                                    id="exampleCheck1" />
                                <label class="form-check-label lh-sm checkboxtext py-lg-1 ps-lg-1 ps-2 py-1"
                                    for="exampleCheck1" style="color: #6b6c6f">I have read the
                                    <u class="fw-bold" style="color: #6b6c6f">Terms &amp; Conditions</u></label>
                            </div>
                        </div>
                        <div class="d-grid gap-6 mx-auto">
                            <button type="submit" class="cst-log"> {{ __('Register') }}</button>
                        </div>
                        <div class="pt-2 d-grid gap-6 mx-auto">
                            <button type="button"
                                class="btn border-secondary d-flex justify-content-center align-items-center">
                                <i class="fab fa-google pe-3"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                        height="20" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                        <path
                                            d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                                    </svg></i>
                                <h6 class="pt-2">Continue with Google</h6>
                            </button>
                        </div>
                        <p class="pt-3 text-center">
                            <span class="fw-bold">Already Have an account? <a
                                    href="{{ route('login') }}">{{ __('Login') }}</a></span>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    @endsection
