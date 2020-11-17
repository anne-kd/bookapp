@extends('books.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Zusammenfassung bearbeiten</h2>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('books.update',$book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="booktitle">Buchtitel</label>
            <input type="text" class="form-control" id="booktitle" name="booktitle" value="{{ $book->booktitle }}" required>
            </div>
            <div class="form-group">
                <label for="url">Bild Link</label>
                <input type="text" class="form-control" name="url" id="url" value="{{ $book->url }}" >
            </div>
            <div class="form-group">
            <label for="text_">Text</label>
            <textarea class="form-control" id="text_" rows="3" name="text" required>{{ $book->text }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Speichern</button>
        <div class="pull-right">
                <a class="btn btn-dark" href="{{ route('books.index') }}"> Abbrechen und Zurück</a>
        </div>
    </form>
@endsection