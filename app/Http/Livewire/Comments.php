<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class Comments extends Component
{
    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {

        $comments = Comment::where('post_id', '=', $this->post->id)->get();


        return view('livewire.comments', compact('comments'));
    }
}
