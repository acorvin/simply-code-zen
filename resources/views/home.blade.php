<x-app-layout meta-description="A blog for every coder looking for sustainable learning.">

    <div class="container max-w-5xl mx-auto py-6">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-4">
            <!-- Latest Posts -->
            <div class="col-span-2">
                <h2 class="text-lg sm:text-xl font-bold text-slate-500 uppercase pb-1 border-b-2 border-slate-500 mb-4">Latest Posts</h2>
                <div>
                    <x-post-item :post="$latestPosts" />
                </div>
            </div>
            <!-- Popular Posts -->
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-slate-500 uppercase pb-1 border-b-2 border-slate-500 mb-4">Popular Posts</h2>

                @foreach($popularPosts as $post)
                    <div class="grid grid-cols-4 gap-2">
                        <a href="{{ route('view', $post) }}" class="pt-2">
                            <img src="{{$post->getThumbnail()}}" alt="{{ $post->title }}">
                        </a>
                        <div class="col-span-3 mb-4">
                            <a href="{{ route('view', $post) }}">
                                <h3 class="uppercase text-bold whitespace nowrap truncate">{{ $post->title }}</h3>
                            </a>
                            <div class="text-sm">{{ $post->shortbody(8) }}</div>
                            <a href="{{ route('view', $post) }}" class="text-xs uppercase text-gray-600 hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mb-8">
            <!-- Recommended Posts -->
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-slate-500 uppercase pb-1 border-b-2 border-slate-500 mb-3">Recommended Posts</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    @foreach($recommendedPosts as $post)
                            <x-post-item :post="$post" :showAuthor="false"/>
                    @endforeach
                </div>

            </div>

            <!-- Latest Categories -->
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-slate-500 uppercase pb-1 border-b-2 border-slate-500 mb-3">Latest Categories</h2>
                <div>
                    @foreach($categories as $category)
                        <div class="mb-6">
                            <h3 class="text-xl font-bold uppercase mb-4">{{ $category->title }}</h3>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                                @foreach($category->publishedPosts()->limit(3)->get() as $post)
                                    <x-post-item :post="$post" :show-author="false" />
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
