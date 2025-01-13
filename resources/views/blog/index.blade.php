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
                            <p class="text-white" style="font-size: 1rem;">
                                By <span class="fw-bold">{{ $post->user->name }}</span> | Published on
                                <span>{{ date('d-m-Y', strtotime($post->updated_at)) }}</span>
                            </p>

                            <!-- Description -->
                            <p class="pt-6" style="color: #B3B3B3; font-size: 1rem; ">{{ $post->description }}</p>

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