<x-app-layout :meta-title="'Code Zen - Posts by category ' . $category->title" meta-description="Posts by subject category">

    <!-- Posts Section -->
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">

        @foreach($posts as $post)
            <x-post-item :post="$post"></x-post-item>
        @endforeach

        {{ $posts->onEachSide(1)->links() }}

        <!-- Pagination -->
        <div class="flex items-center py-8"></div>

    </section>

    <!-- Sidebar Section -->
    <x-sidebar />

</x-app-layout>
