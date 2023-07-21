<div class="container-fluid p-0">
    <img class="img-fluid" src="{{ asset('Images/Rectangle 619.png') }}" />
</div>

<div class="container pt-4">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <p class="user-p">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Molestie
                ultricies pretium, enim id amet, dapibus sit nullam. Vel, facilisi
                interdum morbi id.
            </p>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 pt-3">
            <div class="button-container d-flex">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <a href="{{ route('userProfile') }}" style="text-decoration: none; color: inherit;">
                            <button type="button"
                                class="btn border-2 border-primary text-primary rounded-0 user-btn ms-lg-4 mb-2 <?php echo basename($_SERVER['PHP_SELF']) == 'user-profile.php' || basename($_SERVER['PHP_SELF']) == 'edit-user.php' ? 'bg-primary text-light' : ''; ?>">
                                Profile
                            </button>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <a href="{{ route('album') }}" style="text-decoration: none; color: inherit;">
                            <button type="button"
                                class="btn border-2 border-primary text-primary rounded-0 user-btn ms-lg-3 mb-2 <?php echo basename($_SERVER['PHP_SELF']) == 'album.php' || basename($_SERVER['PHP_SELF']) == 'add-album.php' || basename($_SERVER['PHP_SELF']) == 'album-images.php' || basename($_SERVER['PHP_SELF']) == 'add-images.php' ? 'bg-primary text-light' : ''; ?>">
                                Album
                            </button>
                        </a>
                    </div>

                    <!-- Authentication -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="btn border-2 border-primary text-primary rounded-0 user-btn mb-2"
                                style="text-decoration: none; color: inherit;" href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<hr />
