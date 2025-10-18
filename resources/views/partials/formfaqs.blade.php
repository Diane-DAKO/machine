@extends('layouts.admin')

@section('content')
<div class="container py-4">
  <h3>{{ isset($faq) ? 'Modifier' : 'Ajouter' }} une question</h3>

  @if($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ isset($faq) ? route('admin.faqs.update', $faq) : route('admin.faqs.store') }}" method="POST">
    @csrf
    @if(isset($faq)) @method('PUT') @endif
    <div class="mb-3">
  <label for="question" class="form-label">Question</label>
  <input type="text" name="question" class="form-control-visible " id="question"
         value="{{ old('question', $faq->question ?? '') }}" required>
</div>

<div class="mb-3">
  <label for="answer" class="form-label">Réponse</label>
  <textarea name="answer" class="form-control-visible " id="answer" rows="5" required>{{ old('answer', $faq->answer ?? '') }}</textarea>
</div>

<div class="form-check mb-3">
  <input type="checkbox" name="active" class="form-check-input" id="active"
         {{ old('active', $faq->active ?? false) ? 'checked' : '' }}>
  <label for="active" class="form-check-label">Active</label>
</div>

    <button type="submit" class="btn btn-success">{{ isset($faq) ? 'Mettre à jour' : 'Enregistrer' }}</button>
    <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">Annuler</a>
  </form>
</div>
@endsection
