<?php
session_start ();
require_once('../model/Para.php');
require_once('../controller/bdd.php');
require_once('../controller/ParaManager.php');

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clean Blog - Start Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="../css/clean-blog.min.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="../index.php">Futur logo</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="../index.php">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">Le BDE</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="post.php">Partenaires</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="agenda.php">Calendrier</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('../img/main.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <h1>Nos partenaires</h1>
              <h2 class="subheading">Vous pouvez présenter votre carte pour des réductions!</h2>
             <!-- <span class="meta">Posted by
                <a href="#">Start Bootstrap</a>
                on August 24, 2018</span>-->
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <?php
                        $bdd=connexion_BDD();
            $para= new ParaManager($bdd);
                $localisation='partenaire';
                $u=$para->plus_grand_id_bloc($localisation);
                $titre=$para->returnPara($u, $localisation, 'titre');
                $com_image=$para->returnPara($u, $localisation, 'com_image');
                $image=$para->returnPara($u, $localisation, 'image');
                $com=$para->returnPara($u, $localisation, 'com');

                for($u;$u>=0;$u--)
                {
                  $titre=$para->returnPara($u, $localisation, 'titre');
                  $com_image=$para->returnPara($u, $localisation, 'com_image');
                  $image=$para->returnPara($u, $localisation, 'image');
                  $com=$para->returnPara($u, $localisation, 'com');


                  //Fais apparaitre dans un tableau tout les para de la page partenaire
                  if (!empty($com))
                  { 
                    echo '<h2 class="section-heading">'.$titre.'</h2>';
                    echo '<img class="img-fluid" src="../img/'.$image.'" alt="">';
                    echo '<span class="caption text-muted">'.$com_image.'</span>';
                    echo '<p>'.$com.'</p>';    
                  }
                }
?>
          </div>
        </div>
      </div>
    </article>

    <hr>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; Your Website 2018</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../js/clean-blog.min.js"></script>

  </body>

</html>
