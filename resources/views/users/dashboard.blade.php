<x-layout>
    <h1 class="title">Welcome {{ auth()->user()->username }}, you have {{ $posts->total() }} posts</h1>

    <div class="card mb-4">
        <h2 class="font-bold mb-2">Your Posts</h2>

        {{-- Session messages --}}
        @if (session('success'))
            <x-flash-msg msg="{{ session('success') }}" />
        @elseif (session('delete'))
            <x-flash-msg msg="{{ session('delete') }}" bg="bg-red-500" />
        @endif
        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            {{-- title --}}
            <div class="mb-4">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}"
                    class="input @error('title') !ring-red-500 @enderror">
                @error('title')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- body --}}
            <div class="mb-4">
                <label for="body">Body</label>
                <textarea name="body" id="body" rows="5" class="input @error('body') !ring-red-500 @enderror">{{ old('body') }}</textarea>
                @error('body')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Post image --}}
            <div class="mb-4">
                <label for="image">Cover Foto</label>
                <input type="file" name="image" id="image">
                @error('image')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- submit button --}}
            <button class="btn">Create</button>
        </form>

    </div>

    {{-- User posts --}}
    <h2 class="title">Your Latest Posts</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach ($posts as $post)
            <x-post-card :post="$post">
                {{-- update button --}}
                <a href="{{ route('posts.edit', $post) }}"
                    class="bg-green-500 text-white px-2 py-1 text-xs rounded-md">Edit</a>
                {{-- delete button --}}
                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 text-white px-2 py-1 text-xs rounded-md">Delete</button>
                </form>
            </x-post-card>
        @endforeach
    </div>

    <div>
        {{ $posts->links() }}
    </div>
</x-layout>
