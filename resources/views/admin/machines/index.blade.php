@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <h3>Liste des machines</h3>

    <button class="btn btn-primary mb-3"
            data-bs-toggle="modal"
            data-bs-target="#machineModal"
            data-url="{{ route('admin.machines.create') }}">
        Ajouter une machine
    </button>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Catégorie</th>
                <th>Description</th>
                <th>Images</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($machines as $machine)
            <tr>
                <td>{{ $machine->name }}</td>
                <td>{{ $machine->category->name ?? '-' }}</td>
                <td>{{ \Illuminate\Support\Str::limit($machine->description, 50) }}</td>
                <td>
                    @foreach($machine->images as $image)
                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="img" width="50">
                    @endforeach
                </td>
                <td>
                <a href="{{ route('admin.machines.photos', $machine) }}" class="btn btn-sm btn-outline-primary" style="color:black" title="Ajouter des photos">
    <i class="bi bi-image"></i><i class="bi bi-plus ms-1"></i>
</a>


                    <button class="btn btn-sm btn-warning"
                            data-bs-toggle="modal"
                            data-bs-target="#machineModal"
                            data-url="{{ route('admin.machines.edit', $machine) }}">
                        Modifier
                    </button>

                    <form action="{{ route('admin.machines.destroy', $machine) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer cette machine ?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal pour formulaire de création / édition -->
<div class="modal fade" id="machineModal" tabindex="-1" aria-labelledby="machineModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chargement...</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <div id="machineModalBody" class="text-center">
                    <div class="spinner-border" role="status"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection
