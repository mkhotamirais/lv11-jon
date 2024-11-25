<x-layout>

    <h1 class="title">{{ $user->username }}'s Posts ({{ $posts->total() }})</h1>

    {{-- User's posts --}}

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach ($posts as $post)
            <x-post-card :post="$post" />
        @endforeach
    </div>

    <div>
        {{ $posts->links() }}
    </div>
</x-layout>
