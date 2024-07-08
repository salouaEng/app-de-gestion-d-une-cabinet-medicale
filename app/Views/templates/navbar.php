<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <style>
    /* Style personnalisé pour les liens verticaux */
    .vertical-links .nav-link {
        display: block;
        padding: 8px 16px; /* Ajustez le padding selon vos préférences */
    }
    .image-container {
            width: 100%;
            overflow: hidden;
        }
        .image-container img {
            width: 100%;
            height: auto;
        }
    


</style>

  </head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark flex-column">
        <div class="container-fluid">
        <a class="navbar-brand" href="/public/crudRv">liste des RV: </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav vertical-links"> <!-- Ajout de la classe CSS personnalisée -->
                    <li class="nav-item">
                        <a class="nav-link" href="/public/crudCompte">gestion des comptes </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/public/crudPatient">gestion des patients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/public/calendrier">gestion des rendez vous</a>  
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/public/crudCons">gestion des consultations </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="image-container">
        <img src="<?= base_url('assets/photo1.jpg') ?>" alt="Ma photo">
    </div>
</body>
</html>

