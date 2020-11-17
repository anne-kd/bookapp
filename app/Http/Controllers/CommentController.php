<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{   
   
    public function store(Request $request)
    {   
        $request->validate([
            'comment' => 'required',
            'bookid' => 'required'
        ]);
        $request['user'] = Auth::user()->name;
        $request['userid'] = Auth::user()->id;
        Comment::create($request->all());
        
        return redirect()->route('books.index');
    }

}
