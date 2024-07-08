<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header">
                    <h4>Créer mon compte :</h4>
                    <a href="/public/crudCompte" class="btn btn-danger btn-sm">Retour</a>
                </div>
                <div class="card-body">
                    
                    <form action="<?= base_url('/public/enregistrer') ?>" method="post">
                    <?= csrf_field() ;?>
                    <?php
                   if(session()->getFlashdata('fail')){}
                  echo "<div class=\"\alert alert_danger\"\>".session()->getFlashdata('fail')."</div>" ?>
                    
                        <div class="row">
                            <div class="">
                                <div class="form-group">
                                    <label for="">Nom d'utilisateur :</label>
                                    <input type="text" id="user_name" name="user_name"  value="<?= set_value('user_name');?>" class="form-control" required></pr>
                               <span class="text-danger"><?= isset($validation) ? display_error($validation,'user_name'): ''?></span>
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label for="">Adresse email :</label>
                                    <input type="email" id="email" name="email" class="form-control"  value="<?= set_value('email');?>"required>
                                    <span class="text-danger"><?= isset($validation) ? display_error($validation,'email'): ''?></span>

                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label for="">Mot de passe :</label>
                                    <input type="password" id="pass_word" name="pass_word"  value="<?= set_value('pass_word');?>" class="form-control" required>
                                    <span class="text-danger"><?= isset($validation) ? display_error($validation,'pass_word'): ''?></span>

                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label for="">Confirmer le mot de passe :</label>
                                    <input type="password" id="confirm" name="confirm" class="form-control" value="<?= set_value('confirm');?>" required>
                                    <span class="text-danger"><?= isset($validation) ? display_error($validation,'confirm'): ''?></span>

                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label for="id_role">Choisissez votre rôle :</label>
                                    <select id="id_role" name="id_role" class="form-select">
                                        <option value="1">Médecin</option>
                                        <option value="2">Secrétaire</option>
                                        <option value="3">Admin</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mt-2">
        <button type="submit" class="btn btn-primary" onclick="checkPasswordMatch()">Enregistrer</button>
        <a href="/public">Vous avez déjà un compte ?</a>
    </div>
</form>

<script>
    function checkPasswordMatch() {
        const passWordInput = document.getElementById("pass_word");
        const confirmInput = document.getElementById("confirm");

        if (passWordInput.value !== confirmInput.value) {
            alert("Les mots de passe ne correspondent pas.");
            return false; // Empêche l'envoi du formulaire
        }
    }
</script>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
