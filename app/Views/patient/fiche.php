<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche Patient</title>

    <!-- Inclusion des styles Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center ">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header">
                 <h4>Fiche patient:</h4>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="cin_patient">CIN :</label>
                            <input type="text" class="form-control" id="cin_patient" name="cin_patient" value="<?= esc($patient['cin_patient']); ?>">
                        </div>
                        <div class="form-group">
                            <label for="nom">NOM :</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="<?= esc($patient['nom']); ?>">
                        </div>
                        <div class="form-group">
                            <label for="prenom">PRÉNOM :</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" value="<?= esc($patient['prenom']); ?>">
                        </div>
                        <div class="form-group">
                            <label for="date_naissance">DATE DE NAISSANCE :</label>
                            <input type="text" class="form-control" id="date_naissance" name="date_naissance" value="<?= esc($patient['date_naissance']); ?>">
                        </div>
                        <div class="form-group">
                            <label for="adresse">ADRESSE :</label>
                            <input type="text" class="form-control" id="adresse" name="adresse" value="<?= esc($patient['adresse']); ?>">
                        </div>
                        <div class="form-group">
                            <label for="telephone">TÉLÉPHONE :</label>
                            <input type="text" class="form-control" id="telephone" name="telephone" value="<?= esc($patient['telephone']); ?>">
                        </div>
                    </form>
                    <div class="mb-3">
                    <a href="<?= base_url('/public/supprimer_rv/'.$id_rv) ?>" class="btn btn-danger btn-sm">Annuler-RV</a>
                       <?php if($role==='1'):?>                       
                        <a href="<?= base_url('/public/generer_consultation/'.$patient['id_patient'].'/'.$id_rv)?>" class="btn btn-danger btn-sm">Générer-consultation</a>                       <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Inclusion du script Bootstrap 5 (jQuery requis) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
