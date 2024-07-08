<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>gestion cabinet medicale</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">

<style>
        .cont{
            display: flex;
        margin-top: 50px;
            margin-left: 25px;
           
            min-height: 100vh;
        }
    </style>
</head>
  <body>
     
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <a class="navbar-brand" href="/public/crudRv">liste des RV: </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/public/crudCompte">gestion des comptes </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/public/crudPatient">gestion des patients</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/public/crudRv" >gestion des rendez vous</a>  
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="/public/crudCons">gestion des consultations</a>
        </li>
      </ul>
    </div>
  </div>
</nav>






<div class="container" id="cont">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">
                  <?php
                   if(session()->getFlashdata('status')){}
                  echo "<h4>".session()->getFlashdata('status')."</h4>" ?>
                    <h2>Gestion des consultation :</h2>
                    <a href="/public/nouvCons" class=" btn btn-primary float-end" >Ajouter une consultation</a>
                </div>
                <div class="card-body">
                    <table class="table table">
                        <thead>
                            <tr>
                                <th>DATE DE CONSULTATION</th>
                                <th>NOM</th>
                                <th>PRENOM</th>
                               
                                <th>DESCRIPTION</th>
                                <th>HEURE</th>
                                <th>STATUT</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($cons as $row) : ?>
                                <tr><td><?= $row['date_cons'] ?></td>
                                <td><?= $row['nom'] ?></td>
                                    <td><?= $row['prenom'] ?></td>
                                    <td><?= $row['description'] ?></td>
                                    <td><?= $row['heure'] ?></td>
                                    <td><?= $row['statut'] ?></td>
                                  
                                   <td>
                                    <a href="<?= base_url('/public/modifier_cons/'.$row['code'])?>" class="btn btn-success  btn-sm">Edit</a>
                                   <a href="<?= base_url('/public/supprimer_cons/'.$row['code'])?>" class="btn btn-danger  btn-sm">Supprimer</a>
                                  </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script  src="https://code.jquery.com/jquery-3.7.0.min.js" ></script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>let table = new DataTable('.table');</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body></html>

