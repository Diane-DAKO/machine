@extends('layouts.app')

@section('title', 'Résultats de la recherche')

@section('content')
<br><br><br>
<div class="container py-5">
    <div class="row">
    <h2>Résultats de la recherche</h2>
    @if($results->isEmpty())
        <p>Aucun résultat trouvé.</p>
    @else
        <ul>
            @foreach($results as $machine)
            <div class="col-md-4 col-xs-6">
                <div class="product">
                    <div class="product-img" style="height: 220px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                        <img src="{{ asset('storage/' . $machine->images->first()->image_path ?? 'default.jpg') }}"
                             alt=""
                             style="max-height: 100%; max-width: 100%; object-fit: cover;">
                    </div>

                    <div class="product-body">
                        <h3 class="product-name">
                            <a href="#">{{ $machine->name }}</a>
                        </h3>
                    </div>
                    <div class="add-to-cart">
                        <a href="{{ route('machines.show', $machine->id) }}" class="add-to-cart-btn">
                            <i class=""></i> Voir les détails
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </ul>
    @endif
</div>
        
</div>

@endsection