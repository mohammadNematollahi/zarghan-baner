<?php

namespace App\Http\Controllers\Admin\CheckArticle\NotConfirmed\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.check-article.not-confirmed.comment.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function show($id)
    {
        return view("admin.check-article.comment.show");
    }

    
}
