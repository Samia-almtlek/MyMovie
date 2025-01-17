<x-app-layout>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="container-fluid text-center pt-5 pb-3">
        <h1 class="fw-bold text-danger">Edit the post</h1>
    </div>

    <div class="container d-flex justify-content-center">
        <form action="/blog/{{$post->slug}}" method="POST" enctype="multipart/form-data"
            class="shadow p-4 text-light rounded" style=" max-width: 600px; width: 100%; border: 1px solid #333;">
            @csrf
            @method('PUT')
            <!-- Title Input -->
            <div class="mb-3">
                <label for="title" class="form-label fw-bold text-light">Title</label>
                <input type="text" id="title" name="title" value="{{$post->title}}"
                    class=" form-control bg-dark text-light border-secondary">
            </div>

            <!-- Description Input -->
            <div class="mb-3">
                <label for="description" class="form-label fw-bold text-light">Description</label>
                <textarea id="description" name="description" rows="4"
                    class="form-control bg-dark text-light border-secondary">{{$post->description}}</textarea>

            </div>

            <!-- Genre Input -->
            <div class="mb-3">
                <label for="genre" class="form-label fw-bold text-light">Genre</label>
                <input type="text" id="genre" name="genre" value={{$post->genre}}
                    class="form-control bg-dark text-light border-secondary">
            </div>

            <!-- Release Year Input -->
            <div class="mb-3">
                <label for="release_year" class="form-label fw-bold text-light">Release Year</label>
                <select id="release_year" name="release_year" class="form-select bg-dark text-light border-secondary">
                    <option value="" disabled selected>Select a year</option>
                    @for ($year = date('Y'); $year >= 2000; $year--)
                    <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>
            </div>

            <div class="mb-3">
                <label for="tags" class="form-label fw-bold text-light">Tags</label>
                <select name="tags[]" id="tags" class="form-select bg-dark text-light border-secondary" multiple>
                    @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}"
                        {{ in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                    @endforeach
                </select>
            </div>


            <!-- Personal Review -->
            <div class="mb-3">
                <label for="my_review" class="form-label fw-bold text-light">Personal Review</label>
                <textarea id="my_review" name="my_review" rows="4"
                    class="form-control bg-dark text-light border-secondary">
                    {{$post->my_review}}</textarea>
            </div>

            <!-- Image Upload -->
            <div class="mb-3">
                <label for="image" class="form-label fw-bold text-light">Upload Image</label>
                <input type="file" id="image" name="image" class="form-control bg-dark text-light border-secondary">
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-success btn-lg">Submit Post</button>
            </div>
        </form>
    </div>
</x-app-layout>