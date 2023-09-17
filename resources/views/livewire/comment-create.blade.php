<div>
    <form class="mb-6" x-data="{
        focused: false,
            isEdit: {{ $commentModal ? 'true' : 'false' }}
            init() {
            if (this.isEdit)
                this.$refs.input.focus()

            $wire.on('commentCreated', ()=>{
            this.focused = false;
            })
        }
    }">
        <div class="mb-4">
            <textarea x-ref="input" wire:model="comment" @click="focused = true" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-lime-800 focus:ring-0" :rows="isEdit || focused ? '4' : '1' " placeholder="Leave a comment"></textarea>
        </div>

        <div :class="isEdit || focused ? '' : 'hidden'">
            <button wire:click="createComment" type="submit" class="bg-slate-800 text-white font-bold text-sm uppercase rounded hover:bg-slate-700 px-4 py-3">Add Comment</button>

            <button @click="focused = false; isEdit = false; $wire.emitUp('cancelEditing')" type="button" class="bg-white text-dark font-bold text-sm uppercase rounded hover:bg-slate-700 hover:text-white px-4 py-3">Cancel</button>
        </div>
    </form>
</div>
