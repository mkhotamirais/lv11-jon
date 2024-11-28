<h1>hello {{ $user->username }}</h1>

<div>
    <h2>You created {{ $post->title }}</h2>
    <p>{{ $post->body }}</p>

    <img src="{{ $message->embed('storage/' . $post->image) }}" alt="{{ $post->title ?? 'image attachment' }}"
        width="100" height="100">
</div>
