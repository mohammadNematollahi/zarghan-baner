<?php

namespace App\Http\Livewire\Admin\CheckArticle\Comment;

use App\Models\Comment;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $comments = Comment::latest()->get();
        dd($comments);
        return view('livewire.admin.check-article.comment.index' , compact("comments"));
    }

    public function destroy($id)
    {
        Comment::find($id)->delete();
    }

    public function status($id)
    {
        $comment = Comment::find($id);
        $status = $comment->status == 1 ? 0 : 1;
        $comment->status = $status;
        $comment->save();
    }
}
