<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Comment;
use App\Models\Record;

class CommentsController extends Controller
{

  public function store(Request $request,$id){
  	$request->validate(Comment::$rules);
		$formData = $request->except(['_token']);
  	$record = Record::find($id);

		$body = $formData['body'];
		$record_id = $id;
		$user_id = Auth::user()->id;

		$comment = new Comment(['body' => $body,'record_id' => $record_id, 'user_id' => $user_id]);

  	$record->comments()->save($comment);

  	return back();
  }

  public function delete($id){
    $comment = Comment::find($id);
    $comment->delete();

    return back();
  }
}
