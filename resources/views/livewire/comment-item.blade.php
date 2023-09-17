<div>
    <div class="flex mb-4 gap-3">

        <div class="w-10 h-10 flex items-center justify-center bg-gray-200 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>

        </div>

        <div>
            <div>
                <a class="text-yellow-600 font-semibold" href="#">{{ $comment->user->name  }}</a>
                - <span class="text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
            </div>

            @if($editing)
                <livewire:comment-create :comment-modal="$comment"/>
            @else
                <div class="text-gray-700 text-sm">
                    {{ $comment->comment }}
                </div>
            @endif

            <div class="flex gap-3">

                <a wire:click.prevent="startReply" class="text-yellow-600 text-sm" href="#">Reply</a>

                @if (\Illuminate\Support\Facades\Auth::id() == $comment->user_id)
                <a wire:click.prevent="startCommentEdit" class="text-yellow-700 text-sm" href="">Edit</a>
                <a wire:click.prevent="deleteComment" class="text-red-700 text-sm" href=" ">Delete</a>
                @endif
            </div>
            @if($replying)
            <livewire:comment-create :post="$comment->post" :parent-comment="$comment" />
            @endif

            @if($comment->comments->count())
                <div class="mt-4">
                    @foreach($comment->comments as $childComment)
                        <livewire:comment-item :comment="$childComment" wire:key="comment-{{ $childComment->id }}-{{ $comment->comments->count() }}" />
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
