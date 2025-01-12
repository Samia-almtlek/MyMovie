<x-app-layout>


    <!-- Blog Header -->

    <div class="container-fluid text-center pt-5 pb-3">

        <h1 class="fw-bold text ">All Posts</h1>
    </div>

    @if (Auth::check() && Auth::user()->is_admin)
    <div class="container-fluid py-5">
        <div class="container">
            <a href="/blog/create" class=" btn btn-standard mt-3">Add a new post</a>
        </div>
        @endif
        @foreach ( $posts as $post)



        <!-- Blog Posts Section -->
        <div class="container-fluid py-5">
            <div class="container">
                <!-- Blog Card -->
                <div class="row align-items-center blog-card mb-5">
                    <!-- Image Section -->
                    <div class="col-md-6">
                        <img src="/images/{{$post -> image_path}}" alt="Post Image" class="img-fluid blog-image">
                    </div>

                    <!-- Content Section -->
                    <div class="col-md-6">
                        <!-- Tags -->
                        <div class="mb-3">
                            <a href="#" class="post-tag me-1">{{$post -> genre}}</a>
                            <a href="#" class="post-tag me-1">{{$post -> release_year}}</a>
                        </div>

                        <!-- Title -->
                        <h3 class="post-title mb-3">{{$post -> title}}</h3>



                        <div>
                            By: <span class="text-gray-500 italic">{{$post -> user->name}}
                            </span>
                            <br> At: <span class="text-gray-500 italic">{{date('d-m-y',strtotime($post->updated_at))}}

                            </span>
                        </div>

                        <!-- Full Content (hidden by default) -->
                        <div class="full-content">
                            <p>
                                {{$post -> description}}
                                <!-- Personal Review -->
                            <div class="personal-review mt-4">
                                <h3 class="post-title mb-3">My Personal Review</h3>
                                <p class="review-text">
                                    {{$post -> my_review}}
                                </p>
                            </div>
                        </div>

                        <!-- Read More Button -->
                        <a href="{{$post -> slug}}" class=" btn btn-standard mt-3">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach


    </div>
</x-app-layout>