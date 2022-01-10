<div class="card-body">
    <div class="form-group">
        <label>Tytuł*</label>
        <input type="text" class="form-control" name="title" placeholder="Wpisz tytuł"
            @if (!empty($book->title))
                value = "{{ $book->title }}"
            @endif
        required>
    </div>
    <div class="form-group">
        <label>Autor*</label>
        <select name="author_id" id="" required>
            @foreach ($authors as $author)
                <option value="{{$author->id}}">{{$author->surname}} {{$author->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>ISBN*</label>
        <input type="text" class="form-control" name="isbn" placeholder="Wpisz ISBN"
            @if (!empty($book->isbn))
                value = "{{ $book->isbn }}"
            @endif
        required>
    </div>
    <div class="form-group">
        <label>Wydawnictwo*</label>
        <select name="publisher_id" id="" required>
            @foreach ($publishers as $publisher)
                <option value="{{$publisher->id}}">{{$publisher->name}} {{$publisher->establishment_year}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Rok wydania*</label>
        <input type="year" class="form-control" name="publication_year" placeholder="Wpisz rok"
            @if (!empty($book->publication_year))
                value = "{{ $book->publication_year }}"
            @endif
        required>
    </div>
</div>
