@extends('books.layout')
  
@section('content')
        
        <div class="col-lg-8 col-sm-12 wrapper">
            @foreach($books as $book)
            <div class="post">
                <div class="header">
                    <h3>{{$book->booktitle}}</h3>
                    @if($book->userid == $user->id) 
                        <form action="{{ route('books.destroy',$book->id) }}" method="POST">
                            <a class="btn" href="{{ route('books.edit',$book->id) }}">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                </svg>
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                </svg>
                            </button>
                        </form>
                    @endif
                </div>
                

                <div class="row">
                    <div class="col-xl-4 col-md-12">
                        <img src="{{$book->url}}">
                    </div>
                    <div class="col-xl-8 col-lg-6 col-md-12">
                        <p class="date">{{$book->created_at}}</p>
                        <p class="name">{{$book->user}}</p>
                        <p class="textbox">{{$book->text}}</p>
                    </div>
                </div>
                
                <div class="col-12 comments">
                    <h4 >Kommentare</h4>
                    @foreach($comments as $comment)
                        @if($comment->bookid == $book->id)
                        <div class="comment">
                            <p class="name">{{$comment->user}}</p>
                            <p>{{$comment->comment}}</p>
                        </div>
                        @endif
                    @endforeach
            
                    <form class="headline" action="{{ route('comments.store') }}" method="POST">
                    @csrf
                        <input type="text" name="comment" class="form-control" placeholder="Neuen Kommentar verfassen" required></input>
                        <input type="hidden" name="bookid" class="form-control" value="{{$book->id}}" required></input>
                        <button type="submit" class="btn btn-dark">Senden</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div> 
        
@endsection