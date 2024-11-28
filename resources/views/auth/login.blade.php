<x-layout>
    <h1 class="title">Login</h1>

    <div class="mx-auto max-w-screen-sm card">
        @if (session('status'))
            <x-flash-msg msg="{{ session('status') }}" />
        @endif

        @error('failed')
            <p class="p-2 rounded text-sm text-red-500 border border-red-500 bg-red-100">{{ $message }}</p>
        @enderror

        <form action="{{ route('login') }}" method="POST">
            @csrf

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
            {{-- remember --}}
            <div class="mb-4 flex justify-between items-center">
                <div class="flex items-center gap-2">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">remember me</label>
                </div>

                <a href="{{ route('password.request') }}" class="text-xs text-blue-500">Forgot your password?</a>
            </div>
            {{-- submit button --}}
            <button type="submit" class="btn">Login</button>
        </form>
    </div>

</x-layout>
