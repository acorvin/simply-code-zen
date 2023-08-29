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


            <!-- Search Posts -->
            <div>
                <form class="mb-6" method="get" action="{{route('search')}}">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only white:text-gray-900">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input name="q" value="{{request()->get('q')}}" type="search" id="q" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-200 rounded-lg bg-gray-50 focus:ring-gray-300 focus:border-gray-300 dark:bg-white-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-gray-300 dark:focus:border-gray-200" placeholder="Search posts">
                        <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-lime-800 hover:bg-lime-600 focus:ring-4 focus:outline-none focus:ring-lime-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-lime-800 dark:hover:bg-lime-700 dark:focus:ring-lime-800">Search</button>
                    </div>
                </form>

                <!-- Popular Posts -->
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
