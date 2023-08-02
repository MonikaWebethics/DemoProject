@extends('layouts.masterlayout')

@section('content')
    <div class="container pt-5">
        <div class="row d-flex align-items-center">
            <div class="col text-center">
                <h2 class="index-h2">Blog Posts</h2>
            </div>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                <p>{{ session()->get('message') }}</p>
            </div>
        @endif
        <div class="form-group">
            <input type="text" name="search" id="blogsearch" class="form-control" placeholder="Search Blog Posts" />
        </div>
    </div>


    <div class="container px-5 py-4">
        <div id="result" style="display: none">
            <div class="row" id="blogList">
            </div>
        </div>
        <div class="blog-data-wrapper">
            <div class="row pt-5">
                @include('blog.posts')
            </div>
        </div>
        <div class="text-center">
            <button type="button" class="btn btn-primary btn-lg load-more-blog">Load More Posts...</button>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- For Blog Page -->
<script>
    var BLOG_ENDPOINT = "{{ route('blog') }}";
    var blogPage = 1;

    $(document).ready(function() {
        // Load more blog posts
        $(".load-more-blog").click(function() {
            blogPage++;
            loadMoreBlog(blogPage);
        });

        // Function to load more blog posts using AJAX
        function loadMoreBlog(page) {
            $.ajax({
                    url: BLOG_ENDPOINT + "?page=" + page,
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
                            <h4>There are no more posts for now.</h4>
                        </div>
                    </div>
                </div>
            `);
                        $(".load-more-blog").hide();
                        return;
                    }
                    $('.auto-load').hide();
                    $(".blog-data-wrapper").append("<div class='row'>" + htmlContent + "</div>");
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    alert('No response from server');
                });
        }

        // Search functionality
        $(document).on('keyup', '#blogsearch', $.debounce(1500, function() {
            var search = $(this).val();
            if (search === "") {
                $("#blogList").html("");
                $("#result").hide();
                $(".blog-data-wrapper").show();
                $(".load-more-blog").show();
            } else {
                $.ajax({
                    url: "{{ route('search.blog') }}",
                    method: "GET",
                    data: {
                        search: search
                    },
                    success: function(data) {
                        saveRequest = null;
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
                        $(".blog-data-wrapper").hide();
                        $(".load-more-blog").hide();

                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX request failed:", status, error);
                    }
                })
            }
        }));
    });
</script>
