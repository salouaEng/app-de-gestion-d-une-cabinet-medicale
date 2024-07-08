<div class="container mt-5">
    <div class="row justify-content-center ">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header">
                    <h4>Nouveaux patient :</h4>
                    <a href="/public/crudPatient" class="btn btn-danger btn-sm">Retour</a>
                </div>
                <div class="body">
                    <form  method="post" action="<?= base_url('/public/enregistrerPatient')?>">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="">CIN :</label>
                        <input type="text" class="form-control" name="cin_patient" value="<?= set_value('cin_patient');?>"></input>
                        <span class="text-danger"><?= isset($validation)? display_error($validation,'cin_patient'):''?></span>

                    </div>
                    <div class="form-group">
                        <label for="">NOM :</label>
                        <input type="text" class="form-control" name="nom"  value="<?= set_value('nom');?>"></input>
                        <span class="text-danger"><?= isset($validation)? display_error($validation,'nom'):''?></span>

                    </div>
                    <div class="form-group">
                        <label for="">PRENOM :</label>
                        <input type="text" class="form-control" name="prenom" value="<?= set_value('prenom');?>"></input>
                <span class="text-danger"><?= isset($validation)? display_error($validation,'prenom'):''?></span>
                    </div>
                     <div class="form-group">
                        <label for="">DATE DE NAISSANCE :</label>
                        <input type="date" class="form-control" name="date_naissance" value="<?= set_value('date_naissance');?> "></input>                <span class="text-danger"><?= isset($validation)? display_error($validation,'prenom'):''?></span>
                        <span class="text-danger"><?= isset($validation)? display_error($validation,'date_naissance'):''?></span>

                    </div>
                    <div class="form-group">
                        <label for="">ADRESSE :</label>
                        <input type="text" class="form-control" name="adresse"  value="<?= set_value('adresse');?>"></input>
                        <span class="text-danger"><?= isset($validation)? display_error($validation,'date_naissance'):''?></span>

                    </div>
                    <div class="form-group">
                        <label for="">TELEPHONE :</label>
                        <input type="text" class="form-control" name="telephone"  value="<?= set_value('telephone');?>"></input>
                        <span class="text-danger"><?= isset($validation)? display_error($validation,'telephone'):''?></span>

                    </div>
                    <div class="form-group">
                        <label for="" >sexe :</label>
                        <span class="text-danger"><?= isset($validation)? display_error($validation,'sexe'):''?></span>

                        <select id="sexe" name="sexe">
                            <option value="femme">Femme</option>
                            <option value="homme">Homme</option>

                        </select>
                    </div></br>
                    <div class="form-group">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </div>

        </form>
                </div>

                
            </div>
        </div>
    </div>
</div>
