<article class="flex flex-col shadow my-4">
    <!-- Article Image -->
    <ar href="{{ route('view', $post) }}" class="hover:opacity-75">
        <img src="/storage/{{ $post->thumbnail }}" alt="blog post">

    <div class="bg-white flex flex-col justify-start p-6">
        <div class="flex gap-4">
            @foreach($post->categories as $category)
                <a href="{{ route('view', $post) }}" class="text-yellow-600 text-sm font-bold uppercase pb-4">
                    {{ $category->title }}
                </a>
            @endforeach
        </div>

        <a href="{{ route('view', $post) }}" class="text-3xl font-bold hover:text-gray-700 pb-4">
            {{ $post->title }}
        </a>
        @if ($showAuthor)
        <p class="text-sm pb-3">
            By <a href="#" class="font-semibold hover:text-gray-800">{{ $post->user->name }}</a>, Published on {{ $post->getFormattedDate() }} | {{ $post->read_time }}
        </p>
        @endif
        <a href="{{ route('view', $post) }}" class="pb-6">
            {{ $post->shortBody() }}
        </a>
        <a href="{{ route('view', $post) }}" class="uppercase text-gray-800 hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
    </div>
</article>
