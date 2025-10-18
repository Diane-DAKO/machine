@extends('layouts.app')

@section('title', 'Réponse à la question')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Question & Réponse -->
             <br> <br> <br><br>
            <div class="card shadow-sm p-4">
                <h4 class="text-primary mb-3">Comment puis-je commander une machine ?</h4>
                <p class="text-dark">
                    Pour commander une machine, il vous suffit de consulter sa fiche, puis de cliquer sur le bouton WhatsApp pour discuter directement avec le vendeur.
                    Vous pourrez poser vos questions et finaliser l'achat en toute sécurité.
                </p>
            </div>
<br><br><br>
            <!-- Bouton retour -->
            <div class="mt-4">
                <a href="/faq" class="btn btn-outline-primary">
                    ← Retour à la liste des questions
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
