@extends('layouts.app')

@section('title', $machine->name)

@section('content')
<!-- SECTION MACHINE DETAIL -->
 <br> <br>
<div class="py-5 px-3">
    <div class="container">
        <div class="row gy-4 align-items-start">
            <!-- COLONNE GAUCHE : Images -->
            <div class="col-md-7">
                <!-- Image principale -->
                @if($machine->images->first())
                <div class="text-center mb-3">
                    <a href="{{ asset('storage/' . $machine->images->first()->image_path) }}" target="_blank">
                        <img id="mainImage"
                            src="{{ asset('storage/' . $machine->images->first()->image_path) }}"
                            alt="{{ $machine->name }}"
                            class="img-fluid rounded shadow border"
                            style="width: 100%; height: 400px; object-fit: cover; cursor: zoom-in;">
                    </a>
                </div>
                @endif

                <!-- Miniatures -->
                <div class="d-flex flex-wrap justify-content-center gap-2">
                    @foreach($machine->images as $image)
                        <img src="{{ asset('storage/' . $image->image_path) }}"
                            alt="{{ $machine->name }}"
                            class="img-thumbnail thumb-img"
                            width="150" height="150"
                            style="object-fit: cover; cursor: pointer;"
                            onclick="document.getElementById('mainImage').src='{{ asset('storage/' . $image->image_path) }}';
                                     document.getElementById('mainImage').parentElement.href='{{ asset('storage/' . $image->image_path) }}';">
                    @endforeach
                </div>
            </div>

            <!-- COLONNE DROITE : Détails -->
            <div class="col-md-5">
                <h2 class="product-name">{{ $machine->name }}</h2>
                <p class="text-muted mb-1">Catégorie : <strong>{{ $machine->category->name }}</strong></p>
                <a href="https://wa.me/22900000000" class="btn btn-success mt-4" target="_blank">
                    📞 Contacter sur WhatsApp
                </a> <br><br>

                  <h4 class="mb-3">📝 Description complète</h4>
                    <p>{{ $machine->description }}</p>
            </div>
        </div>
<br><br>
      

        <!-- VIDÉO : pleine largeur si présente -->
        @if($machine->video_path)
        <div class="row mt-4">
            <div class="col-12">
                <div class="bg-white border rounded p-4 shadow-sm">
                    <h4 class="mb-3">🎥 Présentation vidéo</h4>
                    <div style="max-width: 800px; margin: 0 auto;">
    <video controls 
           style="width: 100%; max-height: 400px; object-fit: contain;">
        <source src="{{ asset('storage/' . $machine->video_path) }}" type="video/mp4">
        Votre navigateur ne supporte pas la lecture vidéo.
    </video>
</div>

</div>


                </div>
            </div>
        </div>
        @endif
    </div>
</div>
<!-- /SECTION -->
@endsection
