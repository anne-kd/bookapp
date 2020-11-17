@extends('books.layout')
  
@section('content')

        <h3>Neue Zusammenfassung schreiben</h3>
        
        <form class="wrapper" action="{{ route('books.store') }}" method="POST">
        @csrf
            <div class="form-group">
            <label for="booktitle">Buchtitel</label>
            <input type="text" class="form-control" id="booktitle" name="booktitle" required>
            </div>
            <div class="form-group">
                <label for="url">Bild Link (aus dem Web ;) )</label>
                <input type="text" class="form-control" name="url" id="url" >
            </div>
            <div class="form-group">
            <label for="text_">Text</label>
            <textarea class="form-control" id="text_" rows="3" name="text" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Erstellen</button>
            <div class="pull-right">
                <a class="btn btn-dark" href="{{ route('books.index') }}"> Abbrechen und Zurück</a>
            </div>
        </form>
        
@endsection