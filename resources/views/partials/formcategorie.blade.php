<form action="{{ isset($category->id) ? route('admin.categories.update', $category) : route('admin.categories.store') }}" method="POST">
    @csrf
    @if(isset($category->id))
        @method('PUT')
    @endif

    <div class="mb-3">
    <label for="name" class="form-label">Nom de la catégorie</label>
    <input type="text" class=" form-control-visible" name="name" 
           value="{{ old('name', $category->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="active" class="form-label">Statut</label>
    <select name="active" class=" form-control-visible">
        <option value="1" {{ old('active', $category->active ?? 1) == 1 ? 'selected' : '' }}>Active</option>
        <option value="0" {{ old('active', $category->active ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
    </select>
</div>


    <button type="submit" class="btn btn-success">Enregistrer</button>
</form>
