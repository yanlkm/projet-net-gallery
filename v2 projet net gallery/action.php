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
          echo "Error: Probl??me de connexion ?? la BDD \n";
          echo "Errno: " . $mysqli->connect_errno . "\n";
          echo "Error: " . $mysqli->connect_error . "\n";
          // Arr??t du chargement de la page
          exit();
          }
            // Instructions PHP ?? ajouter pour l'encodage utf8 du jeu de caract??res
            if (!$mysqli->set_charset("utf8")) {
              printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
              exit();
              }
              
            
            echo "<br>";
            $requete1="SELECT * from t_configuration_config;";
            $result2 = $mysqli->query($requete1);
            if ($result2 == false) //Erreur lors de l???ex??cution de la requ??te
                  { // La requ??te a echou??
                  echo "Error: La requ??te a echou?? \n";
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
        echo "<h2> Date & heure de d??but";
        echo "<br>";
        echo ($actu['config_date_debut']) ;
        echo "<h2> Date & heure de fin";
        echo "<br>";
        echo($actu['config_date_fin']);
        echo "<br>";
        echo "<br>";
        echo($actu['config_texte_bienvenu'].' dans '.$actu['config_presentation']);
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
  



</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <section id="ctdetails" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <?php
$id=addslashes(htmlspecialchars($_POST['pseudo']));
$mdp=htmlspecialchars($_POST['mdp']);
$mdp1=htmlspecialchars($_POST['mdp1']);
$prenom=addslashes(htmlspecialchars($_POST['prenom']));
$nom=addslashes(htmlspecialchars($_POST['nom']));
$mail=htmlspecialchars($_POST['mail']);
$mysqli = new mysqli('localhost','zlikemeya','sdqullkd','zfl2-zlikemeya');
if ($mysqli->connect_errno) 
{
 // Affichage d'un message d'erreur
 echo "Error: Probl??me de connexion ?? la BDD \n";
 echo "Errno: " . $mysqli->connect_errno . "\n";

 echo "Error: " . $mysqli->connect_error . "\n";
 // Arr??t du chargement de la page
 exit();
}

// Instructions PHP ?? ajouter pour l'encodage utf8 du jeu de caract??res
if (!$mysqli->set_charset("utf8")) {
 printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
 exit();
}
//Pr??paration de la requ??te ?? partir des cha??nes saisies =>
//concat??nation (avec le point) des diff??rents ??l??ments composant la 
//requ??te

$sql="INSERT INTO t_compte_cpt VALUES('" .$id. "',MD5('" .$mdp. "'));";
// Affichage de la requ??te constitu??e pour v??rification
echo($sql);

//Ex??cution de la requ??te d'ajout d'un compte dans la table des comptes
$result3 = $mysqli->query($sql); 
if ($result3 == false) //Erreur lors de l???ex??cution de la requ??te
{
 // La requ??te a echou??
 echo "Error: La requ??te a ??chou?? \n";
 echo "Query: " . $sql . "\n";
 echo "Errno: " . $mysqli->errno . "\n";
 echo "Error: " . $mysqli->error . "\n";
 exit;
}
else //Requ??te r??ussie
{
      if (!empty($_POST["pseudo"]) && !empty($_POST["mdp"]) && !empty($_POST["mdp1"]) && !empty($_POST["nom"])&& !empty($_POST["prenom"])&& !empty($_POST["mail"]) )
  {
      echo "<br />";
            if ($_POST["mdp"]<>$_POST["mdp1"])
            {
                  $mysqli->query("DELETE from t_compte_cpt where cpt_pseudo='".$id."' ");
                  echo "<br>";
                  echo "<br />";
                  echo("<h1>LES MOTS DE PASSE SAISIS SONT DIFFERENTS VEUILLEZ REPRENDRE AU FORMULAIRE D'INSCRIPTION.</h1>");
                  echo "<br />";
                  echo("<button onclick=location.href='inscription.php'> Formulaire d'inscription </button>");

            }
            else 
            {
              echo "<br />";

              $sq2l="INSERT into t_profil_pfl values ('".$nom."','" .$prenom. "','" .$mail. "','O','D',NOW(),'" .$id. "')";
              $result4 = $mysqli->query($sq2l); 

              if ($result4==false)
              {
                $mysqli->query("DELETE from t_compte_cpt where cpt_pseudo='".$id."' ");
                echo "Error: La requ??te a ??chou?? \n";
                echo "Query: " . $sql . "\n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit;
              }
               else 
               {
                 echo "<br>";
                 echo"<h1>";
                 echo("Profil cr???? avec succ??s");
                 echo "<br>";
                 echo "<br />";
                 echo "Nom :";
                 echo(stripslashes($_POST["nom"])."\n");
                 echo "\n";
                 echo "<br>";
                 echo "<br />";
                 echo "Pr??nom :";
                 echo(stripslashes($_POST["prenom"])."\n");
                 echo "\n";
                 echo "<br>";
                 echo "<br />";
                 echo "Pseudo :";
                 echo($_POST["pseudo"]."\n");
                 echo "\n";
                 echo "<br>";
                 echo "<br />";
                 echo "Adresse mail :";
                 echo($_POST["mail"]."\n");
                 echo "\n";
                 echo "<br>";
                 echo "<br />";
                 echo "</h1>";

               }
            }
  }
  else
   {
    $sql="DELETE from t_compte_cpt where cpt_pseudo=$id ";
    $resultat4=$mysqli->query("DELETE from t_compte_cpt where cpt_pseudo='".$id."' ");
    if ($resultat4==false) 
    {
      echo "gros gros probl??me";
   
    }
      else
      {
            echo "<br>";
            echo "<h1>Veuillez remplir correctement le formulaire d'insciption</h1>"."\n";
            echo "<br>";
            echo("<button onclick=location.href='inscription.php'> Formulaire d'inscription </button>");
      }

  }
}
//Ferme la connexion avec la base MariaDB
$mysqli->close();
?>
</div>
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