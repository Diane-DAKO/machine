@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <!-- En-tête -->
            <div class="text-center mb-4">
                <h2 class="fw-bold">Contactez-nous</h2>
                <p class="text-muted">Nous sommes à votre écoute. Remplissez le formulaire ci-dessous ou utilisez les informations de contact directes.</p>
            </div>

            <!-- Formulaire de contact -->
            <div class="card shadow border-0 p-4">
                <form action="#" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom complet</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Votre nom" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="votre@email.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Sujet</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Objet du message" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" placeholder="Votre message ici..." required></textarea>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Envoyer le message</button>
                    </div>
                </form>
            </div>

            <!-- Infos directes -->
            <div class="mt-5 text-center">
                <p class="mb-1"><i class="fa fa-phone me-2 text-primary"></i> +229 XX XX XX XX</p>
                <p class="mb-1"><i class="fa fa-envelope me-2 text-primary"></i> contact@machines-industrie.com</p>
                <p><i class="fa fa-map-marker me-2 text-primary"></i> Cotonou, Bénin</p>
            </div>

        </div>
    </div>
</div>
@endsection
