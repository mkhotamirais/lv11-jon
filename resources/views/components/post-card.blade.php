@props(['post', 'full' => false])

<div class="card grid grid-cols-1 md:grid-cols-2 gap-4">
    {{-- title --}}
    <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://placehold.co/600x400/EEE/31343C/png?text=picture' }}"
        alt="{{ $post->title ?? 'post image' }}" class="object-cover object-center w-full h-full">

    <div class="flex flex-col">

        <a href="" class="hover:underline self-start">
            <h2 class="font-bold text-xl capitalize">{{ $post->title }}</h2>
        </a>

        {{-- author and date --}}
        <div class="text-xs font-light mb-4">
            <span>Posted {{ $post->created_at->diffForHumans() }} by</span> <a
                href="{{ route('posts.user', $post->user) }}"
                class="text-blue-500 font-medium hover:underline">{{ $post->user->username ?? 'Anonymous' }}</a>
        </div>
        {{-- body --}}
        @if ($full)
            <p>{{ $post->body }}</p>
        @else
            <p class="text-gray-600">
                <span>{{ Str::words($post->body, 15) }}</span>
                <a href="{{ route('posts.show', $post) }}"
                    class="text-blue-500 text-sm font-medium hover:underline">Read More
                    &rarr;</a>
            </p>
        @endif

        <div class="flex items-center justify-end gap-4 mt-6">
            {{ $slot }}
        </div>
    </div>

</div>
