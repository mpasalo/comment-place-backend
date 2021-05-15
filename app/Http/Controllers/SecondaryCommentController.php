<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\SecondaryComment;
use Illuminate\Http\Request;

class SecondaryCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Comment $comment)
    {
        $comments = SecondaryComment::whereCommentId($comment->id)->get();

        return response()->json(['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        SecondaryComment::create([
            'comment_id'   => $request['parent_id'],
            'user_name' => $request['user_name'],
            'body'      => $request['comment']
        ]);

        return response()->json([
            'message' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SecondaryComments  $secondaryComments
     * @return \Illuminate\Http\Response
     */
    public function show(SecondaryComments $secondaryComments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SecondaryComments  $secondaryComments
     * @return \Illuminate\Http\Response
     */
    public function edit(SecondaryComments $secondaryComments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SecondaryComments  $secondaryComments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SecondaryComments $secondaryComments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SecondaryComments  $secondaryComments
     * @return \Illuminate\Http\Response
     */
    public function destroy(SecondaryComments $secondaryComments)
    {
        //
    }
}
