<x-app-layout meta-description="A blog for every coder looking for sustainable learning.">

    <div class="container max-w-5xl mx-auto py-6">
        <!-- Posts Section -->
{{--        <section class="w-full md:w-2/3 flex flex-col items-center px-3">--}}

{{--            @foreach($posts as $post)--}}
{{--                <x-post-item :post="$post"></x-post-item>--}}
{{--            @endforeach--}}

{{--            {{ $posts->onEachSide(1)->links() }}--}}

{{--            <!-- Pagination -->--}}
{{--            <div class="flex items-center py-8"></div>--}}

{{--        </section>--}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Latest Posts -->
            <div class="col-span-2">
                <h2 class="text-lg sm:text-xl font-bold text-slate-500 uppercase pb-1 border-b-2 border-slate-500 mb-3">Latest Posts</h2>
                <div>
                    <x-post-item :post="$latestPosts" />
                </div>
            </div>
            <!-- Popular Posts -->
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-slate-500 uppercase pb-1 border-b-2 border-slate-500 mb-3">Popular Posts</h2>

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

        <div class="grid grid-cols-1 md:grid-cols- gap-4">
            <!-- Recommended Posts -->
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-slate-500 uppercase pb-1 border-b-2 border-slate-500 mb-3">Recommended Posts</h2>
                <div class="grid grid-cols-1 md:grid-cols-3">
                    @foreach($recommendedPosts as $post)
                        <x-post-item :post="$post" :showAuthor="false"/>
                    @endforeach
                </div>

            </div>
            <!-- Latest Categories -->
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-slate-500 uppercase pb-1 border-b-2 border-slate-500 mb-3">Latest Categories</h2>
            </div>
        </div>


    </div>
{{--    <!-- Sidebar Section -->--}}
{{--    <x-sidebar />--}}

</x-app-layout>
