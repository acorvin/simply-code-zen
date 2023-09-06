<div>
    <form x-data="{
        focused: false
    }">
        <div class="mb-4">
            <textarea @click="focused = true" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-lime-800 focus:ring-0" :rows="focused ? '4' : '1' " placeholder="Leave a comment"></textarea>
        </div>

        <div :class="focused ? '' : 'hidden'">
            <button type="submit" class="bg-slate-800 text-white font-bold text-sm uppercase rounded hover:bg-slate-700 px-4 py-3">Add Comment</button>
            <button @click="focused = false" type="button" class="bg-white text-dark font-bold text-sm uppercase rounded hover:bg-slate-700 hover:text-white px-4 py-3">Cancel</button>
        </div>
    </form>
</div>
