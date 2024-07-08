<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<style>
  
.form-container input[type="date"],
.form-container input[type="number"],
.form-container input[type="text"],
.form-container textarea {
    margin-bottom: 10px; 
}

.form-container label {
    margin-bottom: 5px; 
}

.form-container .signature-container {
    margin-bottom: 15px; 
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
                        <label for="datedebut" class="form-label"><b>Date de début :</b></label>
                        <input type="date" class="form-control" id="datedebut" name="datedebut" required>
                    </div>

                    <div class="mb-3">
                        <label for="nb_jour" class="form-label"><b>Nombre de jours :</b></label>
                        <input type="number" class="form-control" id="nb_jour" name="nb_jour" required>
                    </div>

                    <div class="mb-3">
                        <label for="datefin" class="form-label"><b>Date de fin :</b></label>
                        <input type="date" class="form-control" id="datefin" name="datefin" required>
                    </div>

                    <div class="mb-3">
                        <label for="signatureCanvas" class="form-label"><b>Signature du médecin :</b></label>
                        <div class="signature-container">
                            <canvas id="signatureCanvas" class="form-control" width="300" height="100"></canvas>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="cachet_medecin" class="form-label"><b>Cachet du médecin :</b></label>
                        <input type="text" class="form-control" id="cachet_medecin" name="cachet_medecin" required>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" onclick="imprimerCertificat()">Imprimer</button>
                    </div>
                </form>
                <a href="<?= base_url('/public/genererCons') ?>" class="btn btn-danger btn-sm">PDF</a>

            </div>
        </div>
    </div>
<script>
   function imprimerCertificat() {
        window.print();
    }
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
