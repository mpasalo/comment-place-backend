<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\SecondaryComment;
use App\Models\TertiaryComment;
use Illuminate\Http\Request;

class TertiaryCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SecondaryComment $secondary)
    {
        $comments = TertiaryComment::whereSecondaryCommentId($secondary->id)->get();

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
        TertiaryComment::create([
            'secondary_comment_id'   => $request['parent_id'],
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
     * @param  \App\Models\TertiaryComments  $tertiaryComments
     * @return \Illuminate\Http\Response
     */
    public function show(TertiaryComments $tertiaryComments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TertiaryComments  $tertiaryComments
     * @return \Illuminate\Http\Response
     */
    public function edit(TertiaryComments $tertiaryComments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TertiaryComments  $tertiaryComments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TertiaryComments $tertiaryComments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TertiaryComments  $tertiaryComments
     * @return \Illuminate\Http\Response
     */
    public function destroy(TertiaryComments $tertiaryComments)
    {
        //
    }
}
