<x-app-layout>
    <div class="container mt-5">
        <h1 class="text-danger text-center">Edit FAQ</h1>

        <form action="{{ route('admin.faq.update', $faq->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="question" class="form-label">Question</label>
                <input type="text" class="form-control" id="question" name="question" value="{{ $faq->question }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="answer" class="form-label">Answer</label>
                <textarea class="form-control" id="answer" name="answer" rows="4" required>{{ $faq->answer }}</textarea>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if($faq->category_id == $category->id) selected @endif>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update FAQ</button>
        </form>
    </div>
</x-app-layout>