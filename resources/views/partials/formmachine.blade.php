@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ isset($machine) ? route('admin.machines.update', $machine) : route('admin.machines.store') }}" enctype="multipart/form-data">
    @csrf
    @if(isset($machine))
        @method('PUT')
    @endif

    {{-- Nom --}}
<div class="mb-3">
    <label for="name" class="form-label">Nom</label>
    <input type="text" name="name" class=" form-control-visible" 
           value="{{ old('name', $machine->name ?? '') }}" required>
</div>

{{-- Catégorie --}}
<div class="mb-3">
    <label for="category_id" class="form-label">Catégorie</label>
    <select name="category_id" class=" form-control-visible" required>
        <option value="">Choisir une catégorie</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ old('category_id', $machine->category_id ?? '') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>

{{-- Description --}}
<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" class=" form-control-visible" rows="3" required>{{ old('description', $machine->description ?? '') }}</textarea>
</div>

{{-- Vidéo de démonstration --}}
<div class="mb-3">
    <label for="video" class="form-label">Vidéo de démonstration (optionnel)</label>
    <input type="file" name="video" class="form-control-visible" accept="video/*">
    @if(!empty($machine->video_path ?? null))
        <small class="text-muted d-block mt-1">Vidéo actuelle : 
            <a href="{{ asset('storage/' . $machine->video_path) }}" target="_blank">voir la vidéo</a>
        </small>
    @endif
</div>


{{-- Images --}}
<div class="mb-3">
    <label for="images" class="form-label">Images (optionnelles)</label>
    <input type="file" name="images[]" class="form-control-visible" multiple accept="image/*">
</div>


    <button type="submit" class="btn btn-success">
        {{ isset($machine) ? 'Mettre à jour' : 'Créer' }}
    </button>
</form>
