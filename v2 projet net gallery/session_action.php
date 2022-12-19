<!DOCTYPE html>

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
      <h6 class="heading font-x2">ERREUR DE CONNEXION</h6>
  
      <div id="contenu">
  <section id="ctdetails" class="hoc container clear"> 
  <?php 

  session_start();
    if ($_POST["pseudo"] && $_POST["mdp"])
    {
        $id=addslashes(htmlspecialchars($_POST['pseudo']));
        $motdepasse=addslashes(htmlspecialchars($_POST['mdp']));
    }
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
      if (!$mysqli->set_charset("utf8")) 
            {
            printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
            exit();
            }
            $sql="SELECT cpt_pseudo, cpt_mot_de_passe, pfl_statut from t_compte_cpt join t_profil_pfl using(cpt_pseudo) where cpt_pseudo='".$id."' and cpt_mot_de_passe=MD5('".$motdepasse."') and  pfl_validite='A' ";
                
                $resultat = $mysqli->query($sql);
    
            if ($resultat==false) {
            // La requête a echoué
            echo "Error: Problème d'accès à la base \n";
            exit();
            } 
          
     else {
                    if($resultat->num_rows == 1) 
                    {
                         $_SESSION['login']=$id;
                        if($actu=$resultat->fetch_assoc() )
                            {
                            $_SESSION['role']=$actu['pfl_statut'];
                            }
                    header("Location:admin_accueil.php");

                        }
                    else{
            // aucune ligne retournée
            // => le compte n'existe pas ou n'est pas valide
            echo "<h1>";
            echo "pseudo/mot de passe incorrect(s) ou profil inconnu !";
            echo "</h1>";
            echo'<br>';
            echo'<style>
            .btn{
              margin-left:px;
            }
          </style>';
            echo("<button class='btn' onclick=location.href='session.php'> Formulaire de connexion </button>");
            
           }
            //Fermeture de la communication avec la base MariaDB
           $mysqli->close();
           }
   


?>

</section>
</form>
   </div>
     </div> 
   
</div>
  </header>
</body>
</html>
