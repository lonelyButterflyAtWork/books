<div class="card-body">
    <div class="form-group">
        <label>Imię*</label>
        <input type="text" class="form-control" name="name" placeholder="Wpisz imię"
            @if (!empty($author->name))
                value = "{{ $author->name }}"
            @endif
        required>
    </div>
    <div class="form-group">
        <label>Nazwisko*</label>
        <input type="text" class="form-control" name="surname" placeholder="Wpisz nazwisko"
            @if (!empty($author->surname))
                value = "{{ $author->surname }}"
            @endif
        required>
    </div>
</div>
