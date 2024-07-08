<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<style>
  /* Ajouter des marges aux éléments du formulaire */
.form-container input[type="date"],
.form-container input[type="number"],
.form-container input[type="text"],
.form-container textarea {
    margin-bottom: 10px; /* Ajouter de l'espace en bas de chaque champ */
}

.form-container label {
    margin-bottom: 5px; /* Ajouter de l'espace en bas de chaque étiquette */
}

.form-container .signature-container {
    margin-bottom: 15px; /* Ajouter de l'espace en bas du conteneur de signature */
}

</style>
  </head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center">Certificat</h1>
                <form action="/action_page.php" class="form-container">
                    <div class="mb-3">
                        <label for="datedebut" class="form-label"><b>Liste des médicaments :</b></label>
                        <input type="texterea" class="form-control" id="med" name="méd" required>
                    </div>

               

                    <div class="mb-3">
                    <button type="submit" class="btn btn-primary" onclick="imprimerOrd()">Imprimer</button>

                    </div>
                </form>
                <a href="<?= base_url('/public/genererOrd') ?>" class="btn btn-danger btn-sm">PDF</a>

            </div>
        </div>
    </div>
<script>
     function imprimerOrd() {
        // Ouvrir la boîte de dialogue d'impression du navigateur
        window.print();
    }
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
