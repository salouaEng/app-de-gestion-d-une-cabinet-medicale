<!DOCTYPE html>
<html>
<head>
    <title>Background Slideshow</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            position: relative;
            background-color: #000;
        }

        .background-slideshow {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1s ease-in-out;
            z-index: -1;
        }

        .background-slideshow.active {
            opacity: 1;
        }
    </style>
</head>
<body>
    <div class="background-slideshow active" style="background-image: url('assetsphoto1.jpg');"></div>
    <div class="background-slideshow" style="background-image: url('assets/photo2.jpg');"></div>
    <div class="background-slideshow" style="background-image: url('assets/photo3.jpg');"></div>

    <div class="d-flex" style="height: 100vh;">
        <!-- Votre barre de navigation verticale et contenu ici -->
    </div>

    <script>
        // Fonction pour gérer le diaporama
        function startSlideshow() {
            const slides = document.querySelectorAll('.background-slideshow');
            let currentSlide = 0;

            setInterval(() => {
                slides[currentSlide].classList.remove('active');
                currentSlide = (currentSlide + 1) % slides.length;
                slides[currentSlide].classList.add('active');
            }, 5000); // Changement toutes les 5 secondes
        }

        // Démarrer le diaporama une fois que la page est chargée
        window.addEventListener('load', startSlideshow);
    </script>
</body>
</html>
