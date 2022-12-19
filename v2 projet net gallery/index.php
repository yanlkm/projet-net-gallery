<!DOCTYPE html>
<!--
Template Name: Chillaid
Author: <a href="https://www.os-templates.com/">OS Templates</a>
Author URI: https://www.os-templates.com/
Copyright: OS-Templates.com
Licence: Free to use under our free template licence terms
Licence URI: https://www.os-templates.com/template-terms
-->
<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<head>
<title>Gallerie Yanil</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
  <script>
    .wrapper {
      display :inline-flex
    }
    </script>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="hoc clear">
    <div id="logo" class="fl_left"> 
      <!-- ################################################################################################ -->
      <h1 class="logoname"><a href="index.php">Yanil<span>G</span>allery</a></h1>
      <!-- ################################################################################################ -->
    </div>
    <nav id="mainav" class="fl_right"> 
      <!-- ################################################################################################ -->
      <ul class="clear">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a class="drop" href="#">Pages</a>
          <ul>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="livredor.php">Livre d'Or</a></li>
            <li><a href="inscription.php">Inscription</a></li>
            <li><a href="session.php">Ouvrir une session</a></li>
            
          </ul>
        </li>
        
        
      </ul>
      <!-- ################################################################################################ -->
    </nav>
  </header>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="bgded overlay" style="background-image:url('images/demo/backgrounds/R.jpg');">
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <article>
      <style>
        .btn{
          margin-left:px;
        }
      </style>
      <h3 class="heading">Bienvenue sur le site officiel du musee Yanil</h3>
      
      <button class="btn" onclick="maFonction()">NOTRE CONFIGURATION</button>
      <div id="maDIV" style="display:none;">
      <?php
          $mysqli = new mysqli('localhost','zlikemeya','sdqullkd','zfl2-zlikemeya');
          if ($mysqli->connect_errno) 
          {
          // Affichage d'un message d'erreur
          echo "Error: Problème de connexion à la BDD \n";
          echo "Errno: " . $mysqli->connect_errno . "\n";
          echo "Error: " . $mysqli->connect_error . "\n";
          // Arrêt du chargement de la page
          exit();
          }
            // Instructions PHP à ajouter pour l'encodage utf8 du jeu de caractères
            if (!$mysqli->set_charset("utf8")) {
              printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
              exit();
              }
              
            
            echo "<br>";
            $requete1="SELECT * from t_configuration_config;";
            $result2 = $mysqli->query($requete1);
            if ($result2 == false) //Erreur lors de l’exécution de la requête
                  { // La requête a echoué
                  echo "Error: La requête a echoué \n";
                  echo "Errno: " . $mysqli->errno . "\n";
                  echo "Error: " . $mysqli->error . "\n";
                  exit();
                  }
      else {
        if($actu = $result2->fetch_assoc()){
        echo "<br>";
        echo "<h1> INTITULE ";
        echo "<br>";
        echo ($actu['config_intitule']);
        echo "<h2> Adresse ";
        echo "<br>";
        echo($actu['config_lieu'] ); 
        echo  "<br>";
        echo "<h2> Date & heure de début";
        echo "<br>";
        echo ($actu['config_date_debut']) ;
        echo "<h2> Date & heure de fin";
        echo "<br>";
        echo($actu['config_date_fin']);
        echo "<br>";
        echo "<br>";
        echo($actu['config_texte_bienvenu']);
        echo"<br>";
        echo "dans ";
        echo"<br>";
        echo($actu['config_presentation']);
      }
      }

          ?>
          </div>

<script>
function maFonction() {
  var div = document.getElementById("maDIV");
  if (div.style.display === "none") {
    div.style.display = "block";
  } else {
    div.style.display = "none";
  }
}
      </script>
    </p>
  
    </article>
    <!-- ################################################################################################ -->
  </div>
</div>
 
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <section id="introblocks">
      <ul class="space group btmspace-80 elements elements-one">
        
        <li class="one_half first">
          <article><a href="livredor.php"><i class="fas fa-hand-rock"></i></a>
            <h6 class="heading">Livre d'Or</h6>
            <p>Découvrir et poster des commentaires.</p>
          </article>
        </li>
        <li class="one_half">
          <article><a href="inscription.php"><i class="fas fa-dove"></i></a>
            <h6 class="heading">Nous rejoindre</h6>
            <p>S'inscrire et intégrer nos équipes</p>
          </article>
        </li>
       
        
      </ul>

    <!-- / main body -->
<div id="reperage">
    <div class="clear">
 
 <?php
          $mysqli = new mysqli('localhost','zlikemeya','sdqullkd','zfl2-zlikemeya');
            if ($mysqli->connect_errno) 
            {
            // Affichage d'un message d'erreur
            echo "Error: Problème de connexion à la BDD \n";
            echo "Errno: " . $mysqli->connect_errno . "\n";
            echo "Error: " . $mysqli->connect_error . "\n";
            // Arrêt du chargement de la page
            exit();
            }
            // Instructions PHP à ajouter pour l'encodage utf8 du jeu de caractères
              if (!$mysqli->set_charset("utf8")) {
              printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
              exit();
              }
              
            
            echo("<h1>ACTUALITES</h1>");

//Préparation de la requête récupérant tous les profils
              $requete="SELECT * FROM t_news_new;";
//Affichage de la requête préparée
          
          $result1 = $mysqli->query($requete);

      if ($result1 == false) //Erreur lors de l’exécution de la requête
      { // La requête a echoué
      echo "Error: La requête a echoué \n";
      echo "Errno: " . $mysqli->errno . "\n";
      echo "Error: " . $mysqli->error . "\n";
      exit();
      }
          else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
          {
              echo("<table class='table table-hover'>");
              echo("<thead>
                      <tr>
                      <th>Titre</th>
                      <th>Texte</th>
                      <th>Auteur</th>
                      <th>Date</th>
                      </th>
                      </thead>
                      <tbody>");

                    while ($actu = $result1->fetch_assoc()) 
                    {
                        echo("<tr>");
                        echo ("<td>".$actu['new_titre'] ."</td>"."<td>".$actu['new_texte']."</td>" );
                        echo ("<td>".$actu['cpt_pseudo']."</td>"."<td>".$actu['new_date']."</td>");
                        echo ("</tr>");
                    }
                    echo("</tbody></table>");
          }
        //Ferme la connexion avec la base MariaDB
          $mysqli->close();
          ?>
    </div>
        </div>
  </main>
</div>



<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="bgded overlay light" style="background-image:url('images/demo/backgrounds/R.jpg');">
  <section id="services" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <p class="nospace font-xs"></p>
      <h6 class="heading font-x2">Menu</h6>
    </div>
    <ul class="nospace group elements elements-three">
      <li class="one_half first">
        <article><a href="#reperage"><i class="fas fa-bell"></i></a>
          <h6 class="heading">Actus</h6>
          <p>Toutes les nouveautés de notre site !</p>
        </article>
      </li>
      <li class="one_half">
        <article><a href="#"><i class="fas fa-home"></i></a>
          <h6 class="heading">Accueil et configuration</h6>
          <p>Notre site vous présenté sa configuration.</p>
        </article>
      </li>
      
      
    </ul>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <p class="nospace font-xs"></p>
      <h6 class="heading font-x2"></h6>
    </div>
    <ul class="pr-charts nospace group center">
      <li class="pr-chart-ctrl" data-animate="false">
        <div class="pr-chart" data-percent="39"><i></i></div>
        <p>Visiteurs recurrents</p>
      </li>
      <li class="pr-chart-ctrl" data-animate="false">
        <div class="pr-chart" data-percent="78"><i></i></div>
        <p>Commentaires positifs</p>
      </li>
      <li class="pr-chart-ctrl" data-animate="false">
        <div class="pr-chart" data-percent="46"><i></i></div>
        <p>Variation de visites</p>
      </li>
      <li class="pr-chart-ctrl" data-animate="false">
        <div class="pr-chart" data-percent="100"><i></i></div>
        <p>Taux de satisfaction global</p>
      </li>
    </ul>
    <!-- ################################################################################################ -->
  </section>
</div>
<?php

?>



<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->


<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <section id="ctdetails" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <p class="nospace font-xs"></p>
      <h6 class="heading font-x2">En savoir plus</h6>
    </div>
    <figure>
      <ul class="nospace clear">
        <li class="block clear"><a href="#"><i class="fas fa-phone"></i></a> <span><strong>Nous joindre par téléphone:</strong> +00 (123) 456 7890</span></li>
        <li class="block clear"><a href="#"><i class="fas fa-envelope"></i></a> <span><strong>Nous envoyez un mail:</strong> support@domain.com</span></li>
        <li class="block clear"><a href="#"><i class="fas fa-map-marker-alt"></i></a> <span><strong>Notre addresse :</strong> Veuillez vous rendre <a href="https://www.google.com/maps/place/Facult%C3%A9+de+Sciences+et+Techniques+-+Universit%C3%A9+de+Bretagne-Occidentale/@48.3994693,-4.5001671,17z/data=!3m1!4b1!4m25!1m19!1m14!4m13!1m4!2m2!1d-4.4924928!2d48.4016128!4e1!1m6!1m2!1s0x4816bbfa2f641715:0x49d512a1925a91d8!2subo+sciences!2m2!1d-4.4979784!2d48.3994693!3e2!2m3!1sRestaurants!3m1!5e2!3m4!1s0x4816bbfa2f641715:0x49d512a1925a91d8!8m2!3d48.3994693!4d-4.4979784"> ici </a></span></li>
      </ul>
    </figure>
    
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<!-- Homepage specific -->
<script src="layout/scripts/jquery.easypiechart.min.js"></script>
<!-- / Homepage specific -->
</body>
</html>