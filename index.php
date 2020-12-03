<?php session_start(); 
$_SESSION["msg-login'"] = "";
echo $_SESSION["msg-login"] = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>iBank - Index</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/bank.jpg" rel="icon">
  <link href="assets/img/bank.jpg" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="topbar header">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.html">iBank</a></h1>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Accueil</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#contact">Contact</a></li>

        </ul>
      </nav><!-- .nav-menu -->

      <a href="login.php" class="get-started-btn scrollto">Connexion</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/slide5.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">BIENVENUE SUR <span>iBank</span></h2>
              <p class="animate__animated animate__fadeInUp">Des solutions adaptées pour tous besoins : gestion et
                ouverture de compte en ligne, simulation de crédit</p>
              <a href="account.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Ouvrir un compte</a>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide4.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Welcome to <span>iBank</span></h2>
              <p class="animate__animated animate__fadeInUp">A new approach of Banking and insurance</p>
              <a href="account.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Open an account</a>
            </div>
          </div>
        </div>
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services section-bg">
      <div class="container">

        <div class="row no-gutters">
          <div class="col-lg-4 col-md-6">
            <div class="icon-box">
              <div class="icon"><i class="icofont-card"></i></div>
              <h4 class="title"><a href="">Gérer vos comptes</a></h4>
              <p class="description">Des étapes simples et rapides pour accèder à vos comptes et transférer de l'argent avec la banque du future.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="icon-box">
              <div class="icon"><i class="icofont-chat"></i></div>
              <h4 class="title"><a href="">Message instantané</a></h4>
              <p class="description">Communiquer avec votre conseiller en ligne à tout moment et démander de l'aide.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="icon-box">
              <div class="icon"><i class="icofont-tick-boxed"></i></div>
              <h4 class="title"><a href="">Consulter vos transactions</a></h4>
              <p class="description">Accéder à votre compte pour consulter votre solde et les transactions effectuées</p>
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- End Featured Services Section -->
    <div id="services" class="section-title">
      <h2>Devenir Client</h2>
      <p>SIMPLE ET RAPIDE, OUVREZ VOTRE COMPTE DE DÉPÔT!</p>
    </div>
    <div class="container">
      <section id="featured-services" class="featured-services section-bg">
        <div class="container">
  
          <div class="row no-gutters">
            <div class="col-lg-4 col-md-6">
              <div class="icon-box">
                <div class="icon"><i class="icofont-computer"></i></div>
                <h4 class="title"><a href="">Remplir le Formulaire</a></h4>
                <p class="description">Remplissez en toute tranquilité un formulaire en ligne sur notre site</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="icon-box">
                <div class="icon"><i class="icofont-attachment"></i></div>
                <h4 class="title"><a href="">Joindre les pièces justificatives</a></h4>
                <p class="description">Déposer avec votre formulaire les piéces justificatives demandées pour examiner votre demande</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="icon-box">
                <div class="icon"><i class="icofont-like"></i></div>
                <h4 class="title"><a href="">Vous devenez client de iBank</a></h4>
                <p class="description">Après vérification de votre dossier par un des conseillers de la banque, votre demande est validée.</p>
              </div>
            </div>
          </div>
  
        </div>
      </section>
    </div>
    
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Vous pouvez nous joindre avec les coordonnées ci dessous ou vous rendre à notre siège.</p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Localisation:</h4>
                <p>200 RUE DE LA CEINTURE,Pointoise, 76000</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>assistance@iBank.com</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Téléphone:</h4>
                <p>+33 5589 55488 55</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="forms/contact.php" method="post" role="form" class="myform">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name">Votre nom</label>
                  <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Votre email</label>
                  <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Objet</label>
                <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" data-rule="required" data-msg="Please write something for us"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">En cours</div>
                <div class="error-message"></div>
                <div class="sent-message">Votre message a bien été envoyé. Merci!</div>
              </div>
              <div class="text-center"><button type="submit">Envoyer message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
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

</body>

</html>