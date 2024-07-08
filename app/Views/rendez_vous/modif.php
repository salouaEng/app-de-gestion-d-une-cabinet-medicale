<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

< <script>
  
  $( function() {
   
    $( "#cin_patient" ).autocomplete({
      source: "<?= site_url('/public/ajax')?>"
     
    });
  } );
  </script>
<style>

        .cont{
            display: flex;
        margin-top: 50px;
            margin-left: 25px;
           
            min-height: 100vh;
        }
    </style>
    <style>
        body {
            /*background: linear-gradient(to bottom, #0099cc, #006699);*/
            background-image: url('<?php echo base_url("assets/photo2.jpg"); ?>');            background-size: cover;
            background-attachment: fixed;
        }

        .further {
            padding: 50px;
            text-align: center;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        p { font-size: 30px;
            font-size: 18px;
            margin: 10px 0;
        }

        a {
            color: #00a3cc; 
            text-decoration: none;
            font-weight: bold;
            font-size: 25px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
  
 
</head>
<body>
    

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header">
                    <h4>modifier les rendez vous :</h4>
                    <a href="/public/crudCompte" class="btn btn-danger btn-sm">Retour</a>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('/public/update_rv/'.$d['rv']['id_rv']) ?>" method="post">
                       <?= csrf_field(); ?>
                    <div class="row">
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text"> Date rendez vous:</label>
                                    <input type="date" id="date_rv" name="date_rv" value="<?=$d['rv']['date_rv']?>" class="form-control" required>
                                    <span class="text-danger"><?= isset($validation)? display_error($validation,'date_rv'):''?></span>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div  class="" style="width:300px;">
                                    <label for="">Patient:</label></br>

                               <input id="cin_patient" type="text" name="cin_patient" placeholder="cin..." >

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
</body>
</html>