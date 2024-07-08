<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header">
                    <h4>modifier les informations :</h4>
                    <a href="/public/crudPatient" class="btn btn-danger btn-sm">Retour</a>
                </div>
                <div class="card-body">
                     
                    <form action="<?= base_url('/public/update_pat/'.$patient['id_patient'])?>" method="post">
                    <?= csrf_field(); ?>
                        <div class="row">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user_name">CIN :</label>
                                    <input type="text" id="cin_patient" name="cin_patient" value="<?= $patient['cin_patient']?>" class="form-control" required>
                                    <span class="text-danger"><?= isset($validation)? display_error($validation,'cin_patient'):''?></span>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user_name">Nom  :</label>
                                    <input type="text" id="user_name" name="user_name" value="<?= $patient['nom']?>" class="form-control" required>
                                    <span class="text-danger"><?= isset($validation)? display_error($validation,'nom'):''?></span>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text"> Prénom :</label>
                                    <input type="text" id="prenom" name="prenom" value="<?= $patient['prenom']?>" class="form-control" required>
                                    <span class="text-danger"><?= isset($validation)? display_error($validation,'prenom'):''?></span>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pass_word">date de naissance :</label>
                                    <input type="date" id="date_naissance" name="date_naissance" value="<?= $patient['date_naissance']?>" class="form-control" required>
                                    <span class="text-danger"><?= isset($validation)? display_error($validation,'date_naissance'):''?></span>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="confirm">Telephone :</label>
                                    <input type="number" id="telephone" name="telephone" value="<?= $patient['telephone']?>" class="form-control" required>
                                    <span class="text-danger"><?= isset($validation)? display_error($validation,'telephone'):''?></span>

                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_role">Sexe :</label>
                                    <select id="sexe" name="sexe" class="form-select">
                      <option value="homme" <?= ($patient['sexe'] === 'homme') ? 'selected' : '' ?>>Homme</option>
                      <option value="femme" <?= ($patient['sexe'] === 'femme') ? 'selected' : '' ?>>Femme</option>
                                   </select>

                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">modifier</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
