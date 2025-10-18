@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
  <h3>Liste des FAQs</h3>

  <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary mb-3">Ajouter une FAQ</a>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Question</th>
        <th>Statut</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($faqs as $faq)
      <tr>
        <td>{{ $faq->question }}</td>
        <td>{{ $faq->active ? 'Active' : 'Inactive' }}</td>
        <td>
          <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-sm btn-warning">Modifier</a>
          <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" class="d-inline">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger">Supprimer</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
