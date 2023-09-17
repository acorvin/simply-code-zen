<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class CommentCreate extends Component
{

    public string $comment = '';

    public Post $post;

    public ?Comment $commentModal = null;

    public function mount(Post $post, $commentModal = null)
    {
        $this->post = $post;
        $this->commentModal = $commentModal;
        $this->comment = $commentModal ? $commentModal->comment : '';
    }

    public function render()
    {
        return view('livewire.comment-create');
    }

    public function createComment()
    {
        $user = auth()->user();

        if(!$user) {
            return redirect('login');
        }
        $comment = Comment::create([
            'comment' => $this->comment,
            'post_id' => $this->post->id,
            'user_id' => $user->id
        ]);

        $this->emitUp('commentCreated', $comment->id);
        $this->comment = '';
    }
}
