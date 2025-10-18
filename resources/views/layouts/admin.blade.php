<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin - @yield('title', 'Dashboard')</title>

  <!-- Fonts and icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
  <link href="{{ asset('admin/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('admin/css/nucleo-svg.css') }}" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" />
  <link id="pagestyle" href="{{ asset('admin/css/material-dashboard.css?v=3.2.0') }}" rel="stylesheet" />
  
</head>

<body class="g-sidenav-show bg-gray-100">
  @include('partials.sidebar')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container-fluid py-4">
      @yield('content')
    </div>
  </main>

  <!-- Scripts -->
  <script src="{{ asset('admin/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('admin/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('admin/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('admin/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('admin/js/material-dashboard.min.js?v=3.2.0') }}"></script>

  <script>
document.addEventListener('DOMContentLoaded', function () {
    const categoryModal = document.getElementById('categoryModal');
    categoryModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const url = button.getAttribute('data-url');

        const modalTitle = categoryModal.querySelector('.modal-title');
        const modalBody = categoryModal.querySelector('#categoryModalBody');

        modalTitle.textContent = 'Chargement...';
        modalBody.innerHTML = '<div class="text-center"><div class="spinner-border" role="status"></div></div>';

        fetch(url)
            .then(response => response.text())
            .then(html => {
                modalBody.innerHTML = html;

                const isEdit = url.includes('/edit');
                modalTitle.textContent = isEdit ? 'Modifier la catégorie' : 'Ajouter une catégorie';
            })
            .catch(error => {
                modalTitle.textContent = 'Erreur';
                modalBody.innerHTML = '<p class="text-danger">Une erreur est survenue.</p>';
            });
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const machineModal = document.getElementById('machineModal');

    machineModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const url = button.getAttribute('data-url');

        const modalTitle = machineModal.querySelector('.modal-title');
        const modalBody = machineModal.querySelector('#machineModalBody');

        modalTitle.textContent = 'Chargement...';
        modalBody.innerHTML = '<div class="text-center"><div class="spinner-border" role="status"></div></div>';

        fetch(url)
            .then(response => response.text())
            .then(html => {
                modalBody.innerHTML = html;
                modalTitle.textContent = url.includes('/edit') ? 'Modifier la machine' : 'Ajouter une machine';
            })
            .catch(error => {
                modalTitle.textContent = 'Erreur';
                modalBody.innerHTML = '<p class="text-danger">Une erreur est survenue.</p>';
            });
    });
});
</script>

</body>

</html>
