<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class Comments extends Component
{
    public Post $post;

    public $comments;

    protected $eventListeners = [
        'commentCreated' => 'commentCreated',
        'commentDeleted' => 'commentDeleted'
    ];

    public function mount(Post $post)
    {
        $this->post = $post;

        $this->comments = $this->selectComments();
    }

    public function render()
    {

        return view('livewire.comments');
    }

    public function commentCreated(int $id)
    {
        $comment = Comment::where('id', '=', $id)->first();
        if (!$comment->parent_id){
            $this->comments = $this->comments->prepend($comment);
        }
    }

    public function commentDeleted(int $id)
    {
        $this->comments = $this->comments->reject(function ($comment) use ($id) {
            return $comment->id == $id;
        });
    }

    private function selectComments()
    {
        return Comment::where('post_id', '=', $this->post->id)
            ->with(['post', 'user', 'comments'])
            ->whereNull('parent_id')
            ->orderByDesc('created_at')
            ->get();
    }
}
