<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bienvenue dans votre application</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
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

<div class="further">

    <section>

        <h1 class="text-white">BIENVENUE :</h1>

        <p>ZONE DE L'ADMINISTRATEUR : <a href="/public/accueil" target="_blank" class="text-warning">votre menu</a></p>
        <p>ZONE DU MEDECIN : <a href="/public/accueil" target="_blank" class="text-warning">votre menu</a></p>
        <p>ZONE DU SECRETAIRE : <a href="/public/accueil" target="_blank" class="text-warning">votre menu</a></p>

    </section>

</div>

</body>
</html>
