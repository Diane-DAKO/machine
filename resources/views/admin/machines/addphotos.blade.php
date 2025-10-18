@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h4>Ajouter des photos à la machine : {{ $machine->name }}</h4>

    <form action="{{ route('admin.machines.photos.store', $machine) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="images" class="form-label">Sélectionner des images :</label>
            <input type="file" name="images[]" class="form-control-visible" multiple required>
            @error('images.*')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-success">Ajouter</button>
    </form>
    @if($machine->images->count())
    <h5 class="mt-4">Photos existantes :</h5>
    <div class="row">
        @foreach($machine->images as $image)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <img src="{{ asset('storage/' . $image->image_path) }}" class="card-img-top" alt="Image" style="height: 150px; object-fit: cover;">
                    <div class="card-body text-center">
                        <form action="{{ route('admin.machines.photos.delete', $image) }}" method="POST" onsubmit="return confirm('Supprimer cette photo ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

</div>
@endsection
