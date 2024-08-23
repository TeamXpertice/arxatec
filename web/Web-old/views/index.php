<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ArxaTEC</title>
  <link rel="shortcut icon" href="../images/logarxa1.png" type="image/svg+xml">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet">
</head>

<body>

  <header class="header" data-header>

    <?php
    include 'encabezado.php';
    ?>

    <?php
    include 'navbar.php';
    ?>

  </header>

    <?php
    include 'cabeza.php';
    ?>

    <?php
    include 'about.php';
    ?>

    <?php
    include 'threeicons.php';
    ?>


    <!-- include 'cards.php'; -->
     
    <?php
    include 'webinars.php';
    ?>

    <?php
    include 'iconos.php';
    ?>

    <!-- include 'webinars.php'; -->
     
      <section class="cta">
        <div class="container">

          <div class="cta-card">
            <div class="card-content">
              <h2 class="h2 card-title">¿Buscas espacios para tu equipo?</h2>

              <p class="card-text">La Base Cowork te ofrece los mejores espacios para hacer despejar tus ideas</p>
            </div>

            <button class="btn cta-btn">
              <span>Saber mas</span>

              <ion-icon name="arrow-forward-outline"></ion-icon>
            </button>
          </div>

        </div>
      </section>

    </article>
  </main>





  <!-- 
    - #FOOTER
  -->

  <?php
  include 'footer.php';
  ?>

  <script src="../js/script.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>