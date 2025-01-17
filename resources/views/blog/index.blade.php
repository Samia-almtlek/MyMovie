<x-app-layout>

    @if(session()->has('DeleteSuccess'))
    <div class="alert alert-secondary" role="alert">
        {{session()->get('DeleteSuccess')}} </div>
    @endif
    <!-- Blog Header -->
    <div class="container-fluid text-center bg-black pt-6 pb-3" style="background-color: #000;">
        <h1 class="fw-bold text pt-12" style="color: #E50914;">All Posts</h1>
    </div>



    @if (Auth::check() && Auth::user()->is_admin)
    <div class="container-fluid py-3" style="background-color: #000;">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="{{ route('admin.panel') }}" class="btn btn-standard mt-3 px-4 py-3"
                style="font-size: 1.25rem; font-weight: bold;">
                Admin Panel
            </a>
        </div>
    </div>
    @endif

    <!-- Blog Posts Section -->
    @if(session()->has('PostSuccess'))
    <div class="alert alert-secondary" role="alert">
        {{session()->get('PostSuccess')}} </div>
    @endif
    <div class="container-fluid bg-black text-light py-5" style="background-color: #000;">
        <div class="row gy-4">
            @foreach ($posts as $post)
            <div class="col-md-6">
                <div class="card blog-card shadow-lg"
                    style="background-color: #181818; color: #FFFFFF; border: 2px solid #E50914;">
                    <div class="row g-0 align-items-center">
                        <!-- Image Section -->
                        <div class="col-md-5">
                            <img src="/images/{{ $post->image_path }}" alt="Post Image" class="img-fluid rounded">
                        </div>

                        <!-- Content Section -->
                        <div class="col-md-7 p-4">
                            <!-- Tags -->
                            <div class="mb-3">
                                <span class="badge"
                                    style="background-color: #E50914; font-size: 1rem; padding: 0.4rem 0.8rem;">
                                    {{ $post->genre }}
                                </span>
                                <span class="badge"
                                    style="background-color: #E50914; font-size: 1rem; padding: 0.4rem 0.8rem;">
                                    {{ $post->release_year }}
                                </span>
                            </div>

                            <!-- Title -->
                            <a href="{{ route('blog.show', $post->slug) }}"
                                style="text-decoration: none; color: #E50914;">
                                <h3 class="fw-bold" style="font-size: 2rem;">{{ $post->title }}</h3>
                            </a>


                            <!-- Author and Date -->
                            <p class="text-white" style="font-size: 1.25rem;">
                                By <a href="{{ route('profile.show', $post->user->id) }}"
                                    class="fw-bold text-decoration-none"
                                    style="color: #E50914;">{{ $post->user->username }}</a>
                                | Published on
                                <span>{{ date('d-m-Y', strtotime($post->updated_at)) }}</span>
                            </p>

                            <!-- Description -->
                            <div class="mt-4">
                                <h4 class="fw-bold text-light" style="font-size: 1.5rem;">Description:</h4>
                                <p style="font-size: 1.25rem;">{{ $post->description }}</p>
                            </div>
                            <!-- Tags Input -->
                            <div class="mb-3">
                                <strong class="fw-bold" style="color: #F4F1DE;">Tags:</strong>
                                @foreach ($post->tags as $tag)
                                <span class="badge"
                                    style="background-color:rgb(200, 129, 16); color: #FFFFFF; padding: 0.4rem 0.8rem;">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                            <!-- Personal Review -->
                            <div class="personal-review mt-4">
                                <h5 class="fw-bold">My Personal Review</h5>

                                <!-- Read More Button -->
                                <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-standard mt-3">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>