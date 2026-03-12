<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorepostRequest;
use App\Http\Requests\UpdatepostRequest;
use App\Models\post;
use App\Models\User;

class PostController extends Controller
{
   
    public function index()
    {
        return view("posts.index" , [ "posts" => post::paginate(20) ]) ;
    }


    public function create()
    {
        $users = User::all() ;
        return view("posts.create" , ["users" => $users]) ;
    }

  
    public function store(StorepostRequest $request)
    {
        if($request->img){
             $imgPath = $request->file('img')->store('posts', 'public');
        }
        post::create([
            "title" => $request->title,
            "img" => $imgPath ,
            "content" => $request->content,
            "user_id" => $request->user_id,
            "discrption" => $request->discrption
        ]) ;

        return redirect()->route("posts.index" )->with("status" , "datat added sucsuse") ;
    }

  
    public function show(post $post)
    {
        return view("posts.show" , [
           "post" => $post 
        ]) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        $users = User::all() ;
        return view("posts.edit" , ["post" => $post , "users" => $users]) ;
    }

 
    public function update(UpdatepostRequest $request, post $post)
    {
           if($request->img){
             $imgPath = $request->file('img')->store('posts', 'public');
           }else{
            $imgPath = $post->img ;
           }

        $post->update([
            "title" => $request->title,
            "img" => $imgPath ,
            "content" => $request->content,
            "user_id" => $request->user_id,
            "discrption" => $request->discrption
        ]) ;
        return redirect()->route("posts.index")->with("status" , "datat upated sucsuse") ;
    }

  
    public function destroy(post $post)
    {
        $post->delete() ;
        return redirect()->route("posts.index" )->with("status" , "datat deleted sucsuse") ;
    }

    public function deletedPosts(){
        return view("posts.delete" , [ "posts" => post::onlyTrashed()->paginate(20) ]) ;
    }

    public function forceDelete(string $id){
        $post = Post::withTrashed()->findOrFail($id);

        $post->forceDelete();

        return back();
    }

    public function back(string $id){
        post::withTrashed()->where('id', $id)
        ->restore();
        return back();
    }

}

