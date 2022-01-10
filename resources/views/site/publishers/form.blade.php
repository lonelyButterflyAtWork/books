<div class="card-body">
    <div class="form-group">
        <label>Nazwa*</label>
        <input type="text" class="form-control" name="name" placeholder="Wpisz nazwę"
            @if (!empty($publisher->name))
                value = "{{ $publisher->name }}"
            @endif
        required>
    </div>
    <div class="form-group">
        <label>Rok założenia*</label>
        <input type="year" class="form-control" name="establishment_year" placeholder="Wpisz rok"
            @if (!empty($publisher->establishment_year))
                value = "{{ $publisher->establishment_year }}"
            @endif
        required>
    </div>
</div>
