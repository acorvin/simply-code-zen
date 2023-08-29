<x-app-layout meta-title="'Simply Code Zen - Search Results '" . meta-description="Queried post search results">

    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Posts Section -->
        <section class="w-full md:w-2/3  px-3">
            <div class="flex flex-col">
                @foreach($posts as $post)
                    <div class="mb-6">
                        <a href="{{route('view', $post)}}">
                            <h2 class="text-lime-800 font-bold text-lg sm:text-xl mb-2">
                                {!! str_replace(request()->get('q'), '<span class="bg-yellow-300">'.request()->get('q').'</span>', $post->title) !!}
                            </h2>
                        </a>
                        <div>
                            {{$post->shortBody()}}
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $posts->links() }}

        </section>

    <!-- Sidebar Section -->
    <x-sidebar />

    </div>

</x-app-layout>
