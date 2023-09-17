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
    public ?Comment $parentComment = null;

    public function mount(Post $post, $commentModal = null, $parentComment = null)
    {
        $this->post = $post;
        $this->commentModal = $commentModal;
        $this->comment = $commentModal ? $commentModal->comment : '';
        $this->parentComment = $parentComment;
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

        if ($this->commentModal){
            if ($this->commentModal->user_id != $user->id ){
                return response('Action unauthorized', 403);
            }

            $this->commentModal->comment = $this->comment;
            $this->commentModal->save();

            $this->comment = '';
            $this->emitUp('commentUpdated');
        }else {
            $comment = Comment::create([
                'comment' => $this->comment,
                'post_id' => $this->post->id,
                'user_id' => $user->id,
                'parent_id' => $this->parentComment?->id
            ]);

            $this->emitUp('commentCreated', $comment->id);
            $this->comment = '';
        }
    }
}
