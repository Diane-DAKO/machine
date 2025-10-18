@extends('layouts.app')

@section('title', 'Foire aux Questions')

@section('content')
<div class="container my-5">
    <br><br>
    <h2 class="text-center mb-5">Foire aux Questions</h2>

    <div class="row justify-content-center">
        <div class="col-md-10">

            <!-- Carte 1 -->
            <div class="faq-box">
                <a href="/answer" class="faq-link">
                    Comment puis-je commander une machine ?
                </a>
            </div>
<br><br><br>
            

        </div>
    </div>
</div>

<!-- Recherche JS -->
<script>
    document.getElementById('faqSearch').addEventListener('keyup', function () {
        const search = this.value.toLowerCase();
        document.querySelectorAll('.faq-item').forEach(function (item) {
            const text = item.textContent.toLowerCase();
            item.style.display = text.includes(search) ? '' : 'none';
        });
    });
</script>
@endsection
