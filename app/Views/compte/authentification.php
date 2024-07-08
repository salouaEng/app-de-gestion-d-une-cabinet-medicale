

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Authentification :
                </div>
                <div class="mb-3">
                            
                <div class="card-body">
                    <form action="/public/authentifier" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Nom d'utilisateur</label>
                            <input type="text" class="form-control" id="user_name" name="user_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" id="pass_word" name="pass_word" required>
                                </div>
                        <button type="submit" class="btn btn-primary">Se Connecter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

