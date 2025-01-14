<x-app-layout>


    <!-- Main Container with Black Background -->
    <div class="container-fluid bg-black text-light py-5">
        <div class="container">
            @if(session()->has('EditSuccess'))
            <div class="alert alert-secondary" role="alert">
                {{session()->get('EditSuccess')}} </div>
            @endif
            <!-- Blog Card -->
            <div class="card p-4 shadow-lg"
                style="background-color: #181818; border: 2px solid #E50914; border-radius: 10px;">
                <div class="row">
                    <!-- Image Section -->
                    <div class="col-md-6">
                        <img src="/images/{{ $post->image_path }}" alt="{{ $post->title }}" class="img-fluid rounded">
                    </div>

                    <!-- Content Section -->
                    <div class="col-md-6">
                        <!-- Genre and Release Year -->
                        <div class="mb-3">
                            <span class="badge"
                                style="background-color: #E50914; font-size: 1.25rem; padding: 0.5rem 1rem;">
                                {{ $post->genre }}
                            </span>
                            <span class="badge"
                                style="background-color: #E50914; font-size: 1.25rem; padding: 0.5rem 1rem;">
                                {{ $post->release_year }}
                            </span>
                        </div>

                        <!-- Title -->
                        <h1 class="fw-bold" style="color: #E50914; font-size: 2.5rem;">{{ $post->title }}</h1>

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

                        <!-- Personal Review -->
                        <div class="mt-4">
                            <h4 class="fw-bold text-light" style="font-size: 1.5rem;">Personal Review:</h4>
                            <p style="font-size: 1.25rem;">{{ $post->my_review }}</p>
                        </div>
                        <!-- Edit Button -->
                        @if (Auth::check() && Auth::user()->is_admin && Auth::user()->id ==$post->user_id)
                        <a href="{{ route('blog.edit', $post->slug) }}" class="btn btn-standard mt-3 "
                            style="background-color: green; color: white;">Edit
                            Post</a>


                        <form action="/blog/{{$post->slug}}" method="post" class="inline-block">

                            @csrf
                            @method('delete')

                            <button type="submit" href="{{ route('blog.edit', $post->slug) }}"
                                class="btn btn-standard mt-3 " style="background-color: red; color: white;">
                                Delete </>
                        </form>

                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>