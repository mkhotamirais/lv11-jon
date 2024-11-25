<x-layout>

    <a href="{{ route('dashboard') }}" class="block mb-2 text-xs text-blue-500">&larr; Go back to your dashboard</a>
    <div class="card mb-4">

        <h2 class="font-bold mb-2">Edit Posts</h2>

        {{-- Session messages --}}
        @if (session('success'))
            <x-flash-msg msg="{{ session('success') }}" />
        @elseif (session('delete'))
            <x-flash-msg msg="{{ session('delete') }}" bg="bg-red-500" />
        @endif

        <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- title --}}
            <div class="mb-4">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ $post->title }}"
                    class="input @error('title') !ring-red-500 @enderror">
                @error('title')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- body --}}
            <div class="mb-4">
                <label for="body">Body</label>
                <textarea name="body" id="body" rows="5" class="input @error('body') !ring-red-500 @enderror">{{ $post->body }}</textarea>
                @error('body')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- current cover photo if exist --}}
            @if ($post->image)
                <label>Current cover photo</label>
                <figure class="h-40 w-64 rounded-md mb-4 overflow-hidden">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title ?? 'post image' }}"
                        width="400" height="400" class="w-full h-full object-cover origin-center">
                </figure>
            @endif

            <div class="mb-4">
                <label for="image">Cover Foto</label>
                <input type="file" name="image" id="image">
                @error('image')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- submit button --}}
            <button class="btn">Update</button>
        </form>

    </div>

</x-layout>
