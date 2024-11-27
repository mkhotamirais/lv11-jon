<x-layout>

    <h1 class="title">Latest Posts</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach ($posts as $post)
            <x-post-card :post="$post" />
        @endforeach
    </div>

    <div>
        {{ $posts->links() }}
    </div>

</x-layout>
