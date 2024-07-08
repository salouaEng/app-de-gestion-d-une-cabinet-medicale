<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header">
                    <h4>modifier mes informations :</h4>
                    <a href="/public/crudCompte" class="btn btn-danger btn-sm">Retour</a>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('/public/update_cpt/'.$compte['id_compte']) ?>" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user_name">Nom d'utilisateur :</label>
                                    <input type="text" id="user_name" name="user_name" value="<?= $compte['user_name']?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Adresse email :</label>
                                    <input type="email" id="email" name="email" value="<?= $compte['email']?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pass_word">Mot de passe :</label>
                                    <input type="password" id="pass_word" name="pass_word" value="<?= $compte['pass_word']?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="confirm">Confirmer le mot de passe :</label>
                                    <input type="password" id="confirm" name="confirm" value="<?= $compte['pass_word']?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_role">Choisissez votre rôle :</label>
                                    <select id="id_role" name="id_role"   value="<?= $compte['id_role']?>" class="form-select">
                                        <option value="1">Médecin</option>
                                        <option value="2">Secrétaire</option>
                                        <option value="3">Admin</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <button type="submit" class="btn btn-primary">modifier</button>
                              
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
