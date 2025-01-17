<x-app-layout>
    <div class="container mt-5">
        <h1 class="text-danger text-center" style="color: #E50914;">FAQs</h1>

        <!-- Forms to add qustions just for admin -->
        @if (Auth::check() && Auth::user()->is_admin)
        <div class="mb-4">
            <!-- Form to add new category-->
            <h3 class="text-primary" style="color: #E50914;">Add a New Category</h3>
            <form action="{{ route('categories.store') }}" method="POST" class="mb-4">
                @csrf
                <div class="mb-3">
                    <label for="category_name" class="form-label" style="color: #000000;">Category Name</label>
                    <input type="text" class="form-control" id="category_name" name="name"
                        placeholder="Enter category name"
                        style="background-color: #FFFFFF; color: #000000; border: 1px solid #E50914;" required>
                </div>
                <button type="submit" class="btn btn-success">Add Category</button>
            </form>

            <!-- Add question-->
            <h3 class="text-primary" style="color: #E50914;">Add a New FAQ</h3>
            <form action="{{ route('faq.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="question" class="form-label" style="color:#000000;">Question</label>
                    <input type="text" class="form-control" id="question" name="question" placeholder="Enter question"
                        style="background-color: #FFFFFF; color: #000000; border: 1px solid #E50914;" required>
                </div>
                <div class="mb-3">
                    <label for="answer" class="form-label" style="color:#000000;">Answer</label>
                    <textarea class="form-control" id="answer" name="answer" rows="4" placeholder="Enter answer"
                        style="background-color: #FFFFFF; color: #000000; border: 1px solid #E50914;"
                        required></textarea>
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label" style="color: #000000;">Category</label>
                    <select class="form-control" id="category_id" name="category_id" required
                        style="background-color: #FFFFFF; color: #000000; border: 1px solid #E50914;">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        @endif

        <!-- View categories and qustions-->
        @foreach ($categories as $category)
        <div class="mt-4">
            <h3 class="text-primary" style="color: #E50914;">{{ $category->name }}</h3>
            <ul class="list-group">
                @foreach ($category->faqs as $faq)
                <li class="list-group-item d-flex flex-column"
                    style="background-color: #FFFFFF; color: #000000; border: 1px solid #E50914;">
                    <!-- qustion -->
                    <div class="question" style="cursor: pointer;" onclick="toggleAnswer(this)">
                        <strong style="color: #E50914;">{{ $faq->question }}</strong>
                    </div>
                    <!-- answer -->
                    <div class="answer" style="display: none; margin-top: 10px; color: #000000;">
                        <p>{{ $faq->answer }}</p>
                    </div>


                    @if (Auth::check() && Auth::user()->is_admin)
                    <div class="btn-left mt-2">
                        <!-- edit -->
                        <a href="{{ route('admin.faq.edit', $faq->id) }}" class="btn btn-success btn-sm">Edit</a>

                        <!-- delete -->
                        <form action="{{ route('admin.faq.destroy', $faq->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                    @endif
                </li>
                @endforeach
            </ul>
        </div>
        @endforeach
    </div>

    <!-- Script toggle -->
    <script>
    function toggleAnswer(element) {
        const answer = element.nextElementSibling;
        if (answer.style.display === "none" || answer.style.display === "") {
            answer.style.display = "block";
        } else {
            answer.style.display = "none";
        }
    }
    </script>
</x-app-layout>