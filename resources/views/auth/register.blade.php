<x-layout>
    <h1 class="title">Register</h1>

    <div class="mx-auto max-w-screen-sm card">
        <form action="{{ route('register') }}" method="POST">
            @csrf

            {{-- username --}}
            <div class="mb-4">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="{{ old('username') }}"
                    class="input @error('username') !ring-red-500 @enderror">
                @error('username')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            {{-- email --}}
            <div class="mb-4">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="{{ old('email') }}"
                    class="input @error('email') !ring-red-500 @enderror">
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            {{-- password --}}
            <div class="mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" id="password"
                    class="input @error('password') !ring-red-500 @enderror">
                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            {{-- confirm password --}}
            <div class="mb-4">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="input @error('password') !ring-red-500 @enderror">
            </div>
            {{-- subscribe --}}
            <div class="mb-4 flex items-center gap-2">
                <input type="checkbox" name="subscribe" id="subscribe">
                <label for="subscribe">Subscribe to our newsletter</label>
            </div>
            {{-- submit button --}}
            <button type="submit" class="btn">Register</button>
        </form>
    </div>

</x-layout>
