 <!DOCTYPE html>
 <html lang="">

<head>
<body id="top">
<div class="wrapper row2">
  <section id="ctdetails" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <p class="nospace font-xs"></p>
      <h6 class="heading font-x2">FORMULAIRE DE CONNEXION</h6>
    </div>
    
    <article class="middle">
      <h6 class="heading">Veuillez remplir le formulaire</h6>
      <p class="nospace btmspace-15">Tous les champs doivent être correctement remplis.</p>
      
    </article>  
      <article class="one_half first">
    
    <div id="contenu">
  <section id="ctdetails" class="hoc container clear"> 
<?php 
session_start();
?>
<?php
function detect_parasite($pseudo)
{
        //Caractères à enlever
	$puncts=array(	".",
			";",
			",",
			":",
			"!",
			"?",
			"/",
			"&",
			'\"',
			"\'",
			"(",
			")",
			"»",
			"« ",
			"\n",
			"\r"
			);
 
	foreach($puncts as $punct)
	{
                if ( !strpos ($pseudo, $punct) )
		        return True;
	}
	return False;
}
$mdp=htmlspecialchars($_POST['motdp']);
$mdp1=htmlspecialchars($_POST['motdp1']);
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
        if ($_POST['motdp']==$_POST['motdp1'])
        {
                if (!detect_parasite($_POST['motdp1']))
                {
                        $req1="UPDATE t_compte_cpt set cpt_mot_de_passe=MD5('".$_POST['motdp']."') where cpt_pseudo='".$_SESSION['login']."'";
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
                else 
                {
                        echo"erreur caractère invalide";
                }
        }
        if ($_POST['motdp']<>$_POST['motdp1'])
        {
                echo"erreur mots de passes confirmé non identique";

        }

$req="UPDATE t_profil_pfl set pfl_validite='".$_POST['validite']."' where cpt_pseudo='".$_POST['pseudo']."' ";
$res2 = $mysqli->query($req);
                
                      if ($res2 == false) //Erreur lors de l’exécution de la requête
                      { // La requête a echoué
                      echo "Error: La requête a echoué \n";
                      echo "Errno: " . $mysqli->errno . "\n";
                      echo "Error: " . $mysqli->error . "\n";
                      exit();
                      }
                      else {
                            
                            
                            header("Location:admin_accueil.php");

                            }

                            $mysqli->close();


?>
</section>
</form>
   </div>
    
    </article>
</div>
  </header>
</body>
</html>
