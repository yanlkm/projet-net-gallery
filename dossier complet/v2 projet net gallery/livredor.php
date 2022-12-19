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

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <section id="ctdetails" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <p class="nospace font-xs"></p>
      <h6 class="heading font-x2">COMMENTAIRES</h6>
    </div>
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
              
            
            

//Préparation de la requête récupérant tous les profils
              $requete="SELECT * FROM t_commentaire_com join t_visiteur_vis using(vis_id) where com_etat=\"D\" and vis_prenom is not null and vis_nom is not null and vis_mail is not null;";
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
                      <th>Nom</th>
                      <th>Prenom</th>
                      <th>Mail</th>
                      <th>Commentaire</th>
                      <th>Date</th>
                      </thead>
                      <tbody>");

                    while ($actu = $result1->fetch_assoc()) 
                    {
                        echo("<tr>");
                        echo ("<td>".$actu['vis_nom'] ."</td>"."<td>".$actu['vis_prenom']."</td>" );
                        echo("<td>".$actu['vis_mail']."</td>");
                        echo ("<td>".$actu['com_text']."</td>"."<td>".$actu['com_date']."</td>");
                        echo ("</tr>");
                    }
                    echo("</tbody></table>");
          }
        //Ferme la connexion avec la base MariaDB
$mysqli->close();
?>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <section id="ctdetails" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <p class="nospace font-xs"></p>
      <h6 class="heading font-x2">Ajouter un commentaire</h6>
    </div>
    
    <article class="middle">
      <h6 class="heading">Veuillez remplir le formulaire</h6>
      <p class="nospace btmspace-15">Tous les champs doivent être correctement remplis.</p>
      
    </article>  
      <article class="one_half first">
    
    <div id="contenu">
   <form action="commentaire.php" method="post">
   <p>Votre identifiant : <input type="text" name="id" required="required" /></p>
   <p>Votre mot de passe : <input type="text" name="mdp" required="required"/></p>
   <p>Nom : <input type="text" name="nom" required="required" /></p>
   <p>Prénom : <input type="text" name="prenom" required="required"/></p>
   <p>Mail : <input type="text" name="mail" required="required"/></p>
   
   <p>Votre commentaire : <textarea name="comment" rows="5" cols="63" required="required"></textarea></p>
   <p><input style="blue" type="submit" value="Valider"></p>
   </form>
   </div>
    
    </article>
</div>
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