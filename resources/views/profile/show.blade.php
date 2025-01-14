<x-app-layout>
    <div class="container mx-auto py-12 px-6 bg-white shadow-md rounded-lg">
        @if (session('status') === 'profile-updated')
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ __('Profile updated successfully.') }}
        </div>
        @endif

        <div class="flex flex-col md:flex-row items-center md:items-start space-y-6 md:space-y-0 md:space-x-8">
            <!-- صورة المستخدم -->
            <div class="flex-shrink-0">
                @if ($user->profile_photo)
                <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile Photo"
                    class="w-40 h-40 rounded-full shadow-lg">
                @else
                <img src="{{ asset('default-profile.png') }}" alt="Default Profile"
                    class="w-40 h-40 rounded-full shadow-lg">
                @endif
            </div>

            <!-- معلومات المستخدم -->
            <div class="flex flex-col">
                <h1 class="text-4xl font-bold text-black">{{ $user->username ?? $user->name }}</h1>
                <p class="text-gray-800 text-xl mt-6">
                    {{ $user->about_me ?? 'No description available.' }}
                </p>
                @if ($user->birthday)
                <p class="text-gray-700 text-lg mt-6">
                    <strong>Birthday:</strong> {{ $user->birthday }}
                </p>
                @endif
            </div>
        </div>

        <!-- رابط تعديل الملف الشخصي يظهر فقط لصاحب الحساب -->
        @if (Auth::id() === $user->id)
        <div class="mt-10 text-center">
            <a href="{{ route('profile.edit') }}"
                class="inline-block px-8 py-3 bg-red-600 text-white text-xl rounded-md shadow-md hover:bg-red-700 transition duration-300">
                Edit Profile
            </a>
        </div>
        @endif
    </div>
</x-app-layout>