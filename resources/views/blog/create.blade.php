<x-app-layout>
    <div class="container-fluid text-center pt-5 pb-3">
        <h1 class="fw-bold text-danger">Create a New Post</h1>
    </div>

    <div class="container d-flex justify-content-center">
        <form action="/blog" method="POST" enctype="multipart/form-data" class=" shadow p-4 text-light rounded"
            style="background-color: #000; max-width: 600px; width: 100%; border: 1px solid #333;">
            @csrf
            <!-- Title Input -->
            <div class="mb-3">
                <label for="title" class="form-label fw-bold text-light">Title</label>
                <input type="text" id="title" name="title" placeholder="Enter title"
                    class="form-control bg-dark text-light border-secondary">
            </div>

            <!-- Description Input -->
            <div class="mb-3">
                <label for="description" class="form-label fw-bold text-light">Description</label>
                <textarea id="description" name="description" placeholder="Enter description" rows="4"
                    class="form-control bg-dark text-light border-secondary"></textarea>
            </div>

            <!-- Genre Input -->
            <div class="mb-3">
                <label for="genre" class="form-label fw-bold text-light">Genre</label>
                <input type="text" id="genre" name="genre" placeholder="Enter genre"
                    class="form-control bg-dark text-light border-secondary">
            </div>

            <!-- Release Year Input -->
            <div class="mb-3">
                <label for="release_year" class="form-label fw-bold text-light">Release Year</label>
                <select id="release_year" name="release_year" class="form-select bg-dark text-light border-secondary">
                    <option value="" disabled selected>Select a year</option>
                    <!-- السنوات -->
                    <option value="2025">2025</option>
                    <option value="2024">2024</option>
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                </select>
            </div>

            <!-- Personal Review -->
            <div class="mb-3">
                <label for="my_review" class="form-label fw-bold text-light">Personal Review</label>
                <textarea id="my_review" name="my_review" placeholder="Write your personal review" rows="4"
                    class="form-control bg-dark text-light border-secondary"></textarea>
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