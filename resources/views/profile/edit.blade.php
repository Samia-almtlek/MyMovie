<x-app-layout>
    @if (session('status') === 'profile-updated')
    <div class="text-green-600 text-center py-4">
        {{ __('Profile updated successfully.') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="text-red-600 text-center py-4">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="container mx-auto py-12 px-6 bg-white shadow-md rounded-lg">
        <h2 class="text-3xl font-bold text-black mb-8 text-center">{{ __('Edit Profile') }}</h2>
        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('patch')

            <!-- اسم المستخدم -->
            <div>
                <x-input-label for="username" :value="__('Username')" />
                <x-text-input id="username" name="username" type="text" class="mt-1 block w-full bg-white text-black"
                    :value="old('username', $user->username)" />
                <x-input-error class="mt-2" :messages="$errors->get('username')" />
            </div>

            <!-- عيد الميلاد -->
            <div>
                <x-input-label for="birthday" :value="__('Birthday')" />
                <x-text-input id="birthday" name="birthday" type="date" class="mt-1 block w-full bg-white text-black"
                    :value="old('birthday', $user->birthday)" />
                <x-input-error class="mt-2" :messages="$errors->get('birthday')" />
            </div>

            <!-- صورة الملف الشخصي -->
            <div>
                <x-input-label for="profile_photo" :value="__('Profile Photo')" />
                <input id="profile_photo" name="profile_photo" type="file"
                    class="mt-1 block w-full bg-white text-black" />
                @if ($user->profile_photo)
                <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile Photo"
                    class="mt-4 w-24 h-24 rounded-full shadow-md">
                @endif
                <x-input-error class="mt-2" :messages="$errors->get('profile_photo')" />
            </div>

            <!-- حولي -->
            <div>
                <x-input-label for="about_me" :value="__('About Me')" />
                <textarea id="about_me" name="about_me"
                    class="mt-1 block w-full bg-white text-black rounded-md shadow-md">{{ old('about_me', $user->about_me) }}</textarea>
                <x-input-error class="mt-2" :messages="$errors->get('about_me')" />
            </div>

            <!-- زر الحفظ -->
            <div class="text-center">
                <x-primary-button class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-md text-lg font-bold">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>