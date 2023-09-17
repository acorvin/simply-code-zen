<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class CommentItem extends Component
{
    public Comment $comment;

    public bool $editing = false;

    public bool $replying = false;

    protected $listeners = [
        'cancelEditing' => 'cancelEditing',
        'cancelUpdated' => 'cancelUpdated'
    ];

    public function mount(Comment $comment)
    {
        $this->comment = $comment;
    }
    public function render()
    {
        return view('livewire.comment-item');
    }

    public function deleteComment()
    {
        $user = auth()->user();
        if (!$user) {
            return $this->redirect('/login');
        }

        if ($this->comment->user_id != $user->id) {
            return response('Action unauthorized', 403);
        }

        $id = $this->comment->id;

        $this->comment->delete();
        $this->emitUp('commentDeleted', $id);
    }

    public function startCommentEdit()
    {
        $this->editing = true;
    }

    public function cancelEditing()
    {
        $this->editing = false;
    }

    public function cancelUpdated()
    {
        $this->editing = false;
    }

    public function startReply()
    {
        $this->replying= true;
    }
}
