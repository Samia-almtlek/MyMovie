<x-app-layout>

    <!-- Hero Section -->
    <div class="bg-image">
        <h1>Welcome to your hub for movie news, reviews, and ratings.</h1>
        <p>Join a community that loves cinema as much as you do! <br> My Movie .. Start the new movie world</p>
        <a href="{{ route('blog.index') }}">Blog</a>
    </div>

    <div class="container-fluid my-0 content-section content-container">
        <div class="row align-items-center g-0">
            <!-- Image Section -->
            <div class="col-md-6">
                <img src="/images/who2.jpg" alt="About My Movie" class="img-fluid">
            </div>
            <!-- Text Section -->
            <div class="col-md-6 p-5">
                <h2 class="mb-3">About My Movie</h2>
                <p class="short-content">
                    Welcome to <strong>My Movie</strong>, a platform that combines passion for movies with personal
                    reviews
                    in a unique and distinctive way.
                </p>
                <div class="full-content" style="display: none;">
                    <!-- محتوى إضافي -->
                </div>
                <a href="{{ route('about') }}" class="btn btn-standard">Read More</a>
            </div>
        </div>
    </div>

    <!-- Recent Posts Section -->
    <div class="recent-posts py-5">
        <div class="container my-5">
            <div class="row align-items-center g-0 content-container">
                @if ($latestPost)
                <!-- Text Section -->
                <div class="col-md-6 p-5">
                    <h2 class="section-title mb-4" style="color: #E50914;">Recent Posts</h2>
                    <div class="mb-3">

                        <span class="post-tag me-1">{{ $latestPost->genre }}</span>
                        <span class="post-tag me-1">{{ $latestPost->release_year }}</span>
                    </div>
                    <h3 class="post-title mb-3">{{ $latestPost->title }}</h3>
                    <!-- Tags Section -->
                    @if ($latestPost->tags->isNotEmpty())
                    <div class="mb-3">
                        <h5 class="fw-bold" style="color: #F4F1DE;">Tags:</h5>
                        @foreach ($latestPost->tags as $tag)
                        <span class="badge"
                            style="background-color:rgb(200, 129, 16); color: #FFFFFF; padding: 0.4rem 0.8rem;">
                            {{ $tag->name }}
                        </span>
                        @endforeach
                    </div>
                    @endif

                    <!-- Author and Date -->
                    <p class="text-white" style="font-size: 1.25rem;">
                        By <a href="{{ route('profile.show', $latestPost->user->id) }}"
                            class="fw-bold text-decoration-none"
                            style="color: #E50914;">{{ $latestPost->user->username }}</a>
                        | Published on
                        <span>{{ date('d-m-Y', strtotime($latestPost->updated_at)) }}</span>
                    </p>

                    <!-- Short Content -->
                    <p class="short-content">
                    <h4 class="fw-bold text-light" style="font-size: 1.5rem;">
                        Description:</h4>
                    {{ Str::limit($latestPost->description, 150) }}
                    </p>
                    <div class="personal-review mt-4">
                        <h3 class="post-title mb-3">My Personal Review</h3>
                        <p class="review-text">
                            {{ Str::limit($latestPost->my_review, 100) }}
                        </p>
                    </div>
                    <a href="{{ route('blog.show', $latestPost->slug) }}" class="btn btn-standard">Read More</a>
                </div>
                <!-- Image Section -->
                <div class="col-md-6">
                    <img src="/images/{{ $latestPost->image_path }}" alt="Post Image" class="img-fluid">
                </div>
                @else
                <p>No recent posts available.</p>
                @endif
            </div>
        </div>
    </div>

    <script src="/resources/js/app.js"></script>
</x-app-layout>