<?php session_start(); 
$_SESSION["modifier'"] = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Devenir Client</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <header id="topbar header" style="background-color: #1C3280;">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.php" style="color: white;">iBank</a></h1>
      <nav class="nav-menu d-none d-lg-block" style="color: white;">
        <ul>
          <li class="active"><a href="index.php" style="color: white;">Accueil</a></li>
          <li><a href="#services" style="color: white;">Services</a></li>
          <li><a href="#contact" style="color: white;">Contact</a></li>

        </ul>
      </nav><!-- .nav-menu -->

      <a href="account.php" class="get-started-btn scrollto" style="background-color: white;">Ouvrir un compte</a>

    </div>
  </header><!-- End Header -->


  <main id="main">
    <section id="contact" class="contact">
      <div class="container">
        <div class="section-title">
          <h2>Accéder à votre compte</h2>
          <p>Saisir vos identifiants</p>
          <p id="msg">   
          <code style="color:red; font-size:20px"> <?php echo $_SESSION["msg-login"]?></code>
      </p> 
        </div>
        <div class="container" style="background-color:#1C3280;">
        <div class="row">
          <div class="col-12">
            <div class="row">
              <div></div>
            </div>
            <form action="loginCheck.php" method="post" role="form" class="myform">
              <div class="form-row">
              <div class="form-group col-md-12">
                  <label for="email">Email</label>
                  <input type="email" name="mail_utili" class="form-control" id="email" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="password">Mot de Passe</label>
                  <input type="password" name="password" class="form-control" id="password" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="mb-3">
                <div class="loading">En cours</div>
                <div class="error-message"></div>
                <div class="sent-message">Connexion réussie</div>
              </div>
              <div class="text-center"><button type="submit" name="login"  value="">Connexion</button></div>
            </form>
          </div>
        </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
  <footer id="footer">
    <div class="container">
      <h3>iBank</h3>
      <p>SIMPLE ET RAPIDE, OUVREZ VOTRE COMPTE DE DÉPÔT!</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>iBank</span></strong>. Tous droits réservés
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    function hideMessage() {
    document.getElementById("msg").style.display = "none";
    };
    setTimeout(hideMessage, 6000);
  </script>
</body>

</html>