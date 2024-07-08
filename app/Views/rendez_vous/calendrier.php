<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier</title>
    <style>
        /* Vos styles CSS existants */
        /* ... */

        /* Style pour le calendrier */
        .calendar {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .calendar-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            padding: 10px;
            background-color: #1abc9c;
            color: white;
        }

        .calendar-week {
            display: flex;
            width: 100%;
            justify-content: space-between;
        }

        .day-column {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
        }

        .day-header {
            font-weight: bold;
        }

        .day-events {
            margin-top: 10px;
            list-style: none;
            padding: 0;
        }

        .event-link {
            text-decoration: underline;
            color: #1abc9c;
        }
    </style>
</head>
<body>
<div class="calendar">
    <div class="calendar-header">
        <button id="prev-week">◀</button>
        <h2>Semaine du <?= date('d F Y', strtotime('monday this week')) ?> au <?= date('d F Y', strtotime('sunday this week')) ?></h2>
        <button id="next-week">▶</button>
    </div>
    
    <div class="calendar-week">
    <?php
$currentDay = strtotime('monday this week');
for ($i = 0; $i < 7; $i++) {
    $day = date('Y-m-d', $currentDay);
?>
<div class="day-column">
    <div class="day-header"><?= date('D', $currentDay) ?></div>
    <ul class="day-events">
    <?php


    // Le décodage JSON a réussi, vous pouvez maintenant utiliser $rdv comme tableau associatif
    foreach ($rdv['rv'] as $rdvItem) {
        $rdvDate = date('Y-m-d', strtotime($rdvItem['date_rv']));
        if ($rdvDate === $day) {
            // Affichez les informations du rendez-vous
            echo '<li><a href="/public/affichefiche/'.$rdvItem['id_patient'].'/'.$rdvItem['id_rv'].'">Date RV: ' . $rdvItem['date_rv'] . '/ rnd vous:' . $rdvItem['id_rv'] . '/Nom du patient: ' . $rdvItem['nom_patient'] . ' ' . $rdvItem['prenom_patient'] . '</a></li>';
        }
    }

?>

    </ul>
</div>
<?php
    $currentDay = strtotime('+1 day', $currentDay);
}
?>
    </div>
</div>

<script>
    // JavaScript pour la navigation entre les semaines
    document.getElementById('prev-week').addEventListener('click', function() {
        window.location.href = '?week=' + encodeURIComponent('<?php echo date('Y-m-d', strtotime('-1 week', strtotime('monday this week'))) ?>');
    });

    document.getElementById('next-week').addEventListener('click', function() {
        window.location.href = '?week=' + encodeURIComponent('<?php echo date('Y-m-d', strtotime('+1 week', strtotime('monday this week'))) ?>');
    });
</script>
</body>
</html>
