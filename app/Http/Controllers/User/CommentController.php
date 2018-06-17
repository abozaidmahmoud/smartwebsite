<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\admin\comments;
use App\model\admin\post;

class CommentController extends Controller
{
    
    public function index()
    {
     
    }

    
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
       $this->validate(request(),[
            'comment_body'=>'required'
       ]); 

       $comment=new comments();
       $comment->user_id=request('user_id');
       $comment->comment=request('comment_body');
       $comment->post_id=request('post_id');
       $comment->save();
       return json_encode($comment);


    }

    
    public function show($id)
    {
          $comments=post::find($id)->comments;
          
         return json_encode($comments);
    }

   
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
