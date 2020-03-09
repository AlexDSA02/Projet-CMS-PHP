<?php
session_start ();
require_once('model/Para.php');
require_once('controller/bdd.php');
require_once('controller/ParaManager.php');
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PPE1</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="view/acces_admin.php">Accés administrateur</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="view/about.php">Le BDE</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="view/post.php">Partenaires</a>
            </li>   
            <li class="nav-item">
              <a class="nav-link" href="view/agenda.php">Calendrier</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="view/contact.php">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/university.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Bureau Des Etudiants</h1>
              <span class="subheading">Faculté des Métiers de l'Art</span>
            </div>
          </div>
        </div>
      </div>
    </header>
          <?php

          //Ici si les logins/psw sont renseigner et bon alors il vois qu'il peux modifier la page, sinon non
          if (isset($_SESSION['try']) && $_SESSION['try']=='OK'){
           echo '<link href="css/clean-blog.min2.css" rel="stylesheet">';


echo '<form  id="para" novalidate method="post">';
                echo '<input name="para" type="text" class="form-control" placeholder="Name" id="para">';
                echo '<select name="num_para">
<option value=""> ----- Choisir ----- </option>
';
for ($i=1;$i<=8;$i++)
{
  echo '<option value='.$i.'> '.$i.' </option>';
}


 //echo '<option value="1"> Ain </option><option value="2"> Aisne </option><option value="3"> Allier </option><option value="23">Creuse </option></select>';
                echo '<input type="submit" name="paraok">';
                
                $bdd=connexion_BDD();
                if (isset($_POST['paraok']))
                {
                $para= new ParaManager($bdd);
                  $para->modifPara($_POST['num_para'], $_POST['para']);
                }}?>
    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">


<!--AFFICHAGE DE TOUT LES POST VIA LA BDD--> 
            <?php
            $bdd=connexion_BDD();
            $para= new ParaManager;
            $localisation='accueil';
            $u=$para->plus_grand_id_bloc($localisation);
            //Ici on mets a J le plus grand id-para de la bdd pour commmencer par lui (oui le dernier texte mis a le plus grand id car il sont en auuto incrementation)
           for($u;$u>=0;$u--)
              {
                $titre=$para->returnPara($u, $localisation, 'titre');
                $com=$para->returnPara($u, $localisation, 'com');


                //Fais apparaitre tout les post (vérifie qu'un post existe et qu'il n'as pas était supprimer)
                if (!empty($com))
                { 
                  echo '<table>';
                echo '<div class="post-preview"><a href="post.html"><h2 class="post-title">';
                echo $titre;
                echo '</h2><h3 class="post-subtitle">';
                echo $com;           
                echo '</h3></a></div><hr>';       
                }
              }
            ?>
<!--AFFICHAGE DE TOUT LES POST VIA LA BDD--> 





          

          <!-- Pager -->
          <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
          </div>
        </div>
      </div>
    </div>

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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>


  </body>

</html>
