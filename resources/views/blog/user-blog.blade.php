@extends('layouts.masterlayout')

@section('content')
    <div class="container py-5">
        <div class="row d-flex align-items-center">
            <div class="col text-center">
                <h2 class="index-h2">Blog Posts</h2>
            </div>
            <div class="col-auto ml-auto">
                <a href="{{ route('create') }}" style="text-decoration: none; color: inherit;">
                    <button class="btn btn-primary rounded-0" style="width: 156px; height: 45px;">Create Post</button>
                </a>
            </div>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                <p>{{ session()->get('message') }}</p>
            </div>
        @endif
        <div class="form-group">
            <input type="text" name="search" id="usersearch" class="form-control" placeholder="Search Blog Posts" />
        </div>
    </div>

    <div class="container px-5 py-4">
        <div id="result" style="display: none">
            <div class="row" id="blogList">
            </div>
        </div>
        <div class="user-blog-data-wrapper">
            <div class="row pt-5">
                @include('blog.user-posts')
            </div>
        </div>
        <div class="text-center">
            <button type="button" class="btn btn-primary btn-lg load-more-user-blog">Load More Posts...</button>
        </div>

        <div class="auto-load text-center" style="display: none;">
            <div class="d-flex justify-content-center">
                <div class="spinner-border" role="status">
                    <span></span>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function confirmDelete(event) {
        event.preventDefault();
        if (confirm('Are you sure you want to delete this post?')) {
            document.getElementById('deleteForm').submit();
        }
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- For User Blog Page -->
<script>
    // Variables for User Blog Page
    var USER_BLOG_ENDPOINT = "{{ route('user.blog') }}";
    var userBlogPage = 1;
    $(document).ready(function() {
        // Load more user blog posts
        $(".load-more-user-blog").click(function() {
            userBlogPage++;
            loadMoreUserBlog(userBlogPage);
        });

        // Function to load more user blog posts using AJAX
        function loadMoreUserBlog(page) {
            $.ajax({
                    url: USER_BLOG_ENDPOINT + "?page=" + page,
                    dataType: "json",
                    type: "get",
                    beforeSend: function() {
                        $('.auto-load').show();
                    }
                })
                .done(function(response) {
                    var htmlContent = response.html;
                    if (htmlContent === '') {
                        $('.auto-load').html(`
                <div class="col-12 py-5 text-center">
                    <div class="py-3">
                        <div class="alert alert-info">
                            <h4>There are no more posts.</h4>
                        </div>
                    </div>
                </div>
            `);

                        $(".load-more-user-blog").hide();
                        return;
                    }
                    $('.auto-load').hide();
                    $(".user-blog-data-wrapper").append("<div class='row'>" + htmlContent + "</div>");
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    alert('No response from server');
                });
        }

        // Search functionality for User Blog Page
        $(document).on('keyup', '#usersearch', $.debounce(1500, function() {
            var search = $(this).val();
            if (search === "") {
                $("#blogList").html("");
                $("#result").hide();
                $(".user-blog-data-wrapper").show();
                $(".load-more-user-blog").show();
            } else {
                $.ajax({
                    url: "{{ route('user.search') }}",
                    method: "GET",
                    data: {
                        search: search
                    },
                    success: function(data) {
                        if (data.trim() === "") {
                            $("#blogList").html(`
                                <div class="col-12 py-5 text-center">
                                    <div class="py-5">
                                        <div class="alert alert-danger">
                                            <h4>No results found.</h4>
                                        </div>
                                    </div>
                                </div>
                            `);
                        } else {
                            $("#blogList").empty().html(data);
                        }
                        $("#result").show();
                        $(".user-blog-data-wrapper").hide();
                        $(".load-more-user-blog").hide();
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX request failed:", status, error);
                    }
                });
            }
        }));
    });
</script>
