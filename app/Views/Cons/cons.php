<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<style>
    

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color:blue;
  color: white;
  
  border: none;
  cursor: pointer;
  opacity: 0.8;
  
  
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
} 



/* Style du formulaire de certificat médical */
.form-popup {
            display: none;
            position: fixed;
            top: 50%; /* Au milieu de la hauteur de la fenêtre */
            left: 50%; /* Au milieu de la largeur de la fenêtre */
            transform: translate(-50%, -50%); /* Centre exactement au milieu */
            border: 3px solid #f1f1f1;
            z-index: 9;
            background-color: white;
            width: 80%; /* Largeur de 80% de la fenêtre */
            max-width: 500px; 
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); max-height: 80vh; /* Hauteur maximale de 80% de la hauteur de la fenêtre */
            overflow-y: auto; /* Activer la barre de défilement vertical si nécessaire */
            padding: 20px;
      
}

.form-popup h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

.form-popup label {
    font-weight: bold;
}

.form-popup input[type="text"],
.form-popup input[type="number"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

.form-popup .btn {
    background-color: #007BFF;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 18px;
    border-radius: 5px;
}

.form-popup .btn.cancel {
    background-color: #FF3547;
}

.form-popup .btn:hover {
    opacity: 0.8;
}

</style>



</script>
</head>

<body>
<div class="container mt-5">
    <div class="row justify-content-center ">
        <div class="col-md-8 mt-5">
            <div class="card"><?php if(session()->getFlashdata('status')){}
                  echo "<h4>".session()->getFlashdata('status')."</h4>" ?>
                   
                <div class="card-header">
                    <h2>Consultation pour <?= esc($patient['nom'] . ' ' . $patient['prenom']) ?></h2>
                </div>
                <div class="card-body">
                
                    <form action="<?= base_url('/public/enregistrer_consultation'.'/'.$patient['id_patient'].'/'.$id_rv) ?>" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nom">Nom :</label>
                                    <input type="text" id="nom" name="nom" value="<?= esc($patient['nom']) ?>" readonly class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="prenom">Prénom :</label>
                                    <input type="text" id="prenom" name="prenom" value="<?= esc($patient['prenom']) ?>" readonly class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="date_naissance">Date de Naissance :</label>
                                    <input type="text" id="date_naissance" name="date_naissance" value="<?= esc($patient['date_naissance']) ?>" readonly class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="cin">CIN :</label>
                                    <input type="text" id="cin" name="cin" value="<?= esc($patient['cin_patient']) ?>" readonly class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="sexe">Sexe :</label>
                                    <input type="text" id="sexe" name="sexe" value="<?= esc($patient['sexe']) ?>" readonly class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="telephone">Téléphone :</label>
                                    <input type="text" id="telephone" name="telephone" value="<?= esc($patient['telephone']) ?>" readonly class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">Description :</label>
                                    <textarea id="description" name="description" rows="4" cols="50" class="form-control"></textarea>
                                </div>
                                
                                <div class="mb-3">
                                    <button type="submit" name="enregistrer" class="btn btn-primary">enregistrer la consultation</button>

                                </div>
                            </div>
                        </div>
                    </form>
                    <a href="<?= base_url('public/afficherPopup') ?>" class="open-button">Certificat</a>
                    <a href="<?= base_url('public/affichePopup') ?>" class="open-button">Ordonnance</a>

<script>
    
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
