<?php 
session_start();
?>
<html lang="">
<head>
<title>Gallerie Yanil</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<head>
<body id="top">
<div class="wrapper row2">
  <section id="ctdetails" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <p class="nospace font-xs"></p>
      <h6 class="heading font-x2">ERREUR DANS LA MODIFICATION</h6>
  
      <div id="contenu">
  <section id="ctdetails" class="hoc container clear"> 

<?php
function detect_parasite($pseudo)
{

  return preg_match('#(.|,|;|\')+#', $pseudo);
  
}

$mdp=addslashes(htmlspecialchars($_POST['motdp']));
$mdp1=addslashes(htmlspecialchars($_POST['motdp1']));
$tu=detect_parasite($mdp1);
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
        
        if ($mdp<>$mdp1)
        {
          
          echo($tu);
          echo "<h1>";
          echo "Erreur, mot de passe confirmé non identique!";
          echo "</h1>";
          echo'<br>';
          echo'<style>
          .btn{
            margin-left:px;
          }
        </style>';
          echo("<button class='btn' onclick=location.href='admin_accueil.php'> Retour à l'accueil </button>");

        }
        else
        {
                if (detect_parasite($mdp1)==false)
                {
                  echo "<h1>";
                  echo "Erreur, carcètère invalide!";
                  echo "</h1>";
                  echo'<br>';
                  echo'<style>
                  .btn{
                    margin-left:px;
                  }
                </style>';
                  echo("<button class='btn' onclick=location.href='admin_accueil.php'> Retour à l'accueil  </button>");    
                } 
                else 
                { $req1="UPDATE t_compte_cpt set cpt_mot_de_passe=MD5('".$mdp."') where cpt_pseudo='".$_SESSION['login']."'";
                        $res1 = $mysqli->query($req1);
                
                      if ($res1 == false) //Erreur lors de l’exécution de la requête
                      { // La requête a echoué
                      echo "Error: La requête a echoué \n";
                      echo "Errno: " . $mysqli->errno . "\n";
                      echo "Error: " . $mysqli->error . "\n";
                      exit();
                      }
                      else 
                      {
                        header("Location:admin_accueil.php");
                      }
                }
                  
                }
        
        $mysqli->close();


        ?>
     </section>
</form>
   </div>
     </div> 
   
</div>
  </header>
</body>
</html>
