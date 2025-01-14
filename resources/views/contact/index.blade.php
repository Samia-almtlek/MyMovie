<x-app-layout>
    <div class="container mt-5">
        <h1 class="text-center text-danger">Contact Us</h1>

        @if (session('success'))
        <div class="alert alert-success mt-4">
            {{ session('success') }}
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger mt-4">
            {{ session('error') }}
        </div>
        @endif

        <form method="POST" action="{{ route('contact.send') }}" class="mt-5">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Your Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Subject -->
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" name="subject" id="subject" class="form-control" value="{{ old('subject') }}"
                    required>
                @error('subject')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Message -->
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea name="message" id="message" rows="5" class="form-control"
                    required>{{ old('message') }}</textarea>
                @error('message')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-danger px-4 py-2">Send Message</button>
            </div>
        </form>
    </div>
</x-app-layout>