<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\post;
use Illuminate\Http\Request;

class comments extends Controller
{
 
    public function index()
    {
        
    }

  
    public function create()
    {
        
    }

  
    public function store(Request $request)
    {
        Comment::create([
            "commentable_type" => post::class ,
            "commentable_id"  => $request->post_id ,
            "comment" => $request->comment 
        ]) ;

        return redirect()->route("posts.show" , $request->post_id) ;
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Comment::where("id" , $id)->update([
             "comment" => $request->comment 
        ]) ;
        return redirect()->back() ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete() ;
        return redirect()->back() ;
    }
}
