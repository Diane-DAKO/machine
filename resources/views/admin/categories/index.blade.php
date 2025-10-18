@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
  <h3>Liste des catégories</h3>

  <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#categoryModal" data-url="{{ route('admin.categories.create') }}">
    Ajouter une catégorie
</button>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Statut</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($categories as $category)
      <tr>
        <td>{{ $category->name }}</td>
        <td>{{ $category->active ? 'Active' : 'Inactive' }}</td>
        <td>
        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-warning"
   data-bs-toggle="modal" data-bs-target="#categoryModal"
   data-url="{{ route('admin.categories.edit', $category) }}">
    Modifier
</a>
          <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger">Supprimer</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <!-- Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="categoryModalLabel">Chargement...</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <div id="categoryModalBody" class="text-center">
          <div class="spinner-border" role="status"></div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
@endsection
