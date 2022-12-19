<!DOCTYPE html>
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
      <h1 class="logoname"><a href="index.php">Chill<span>a</span>id</a></h1>
      <!-- ################################################################################################ -->
    </div>
    <nav id="mainav" class="fl_right"> 
      <!-- ################################################################################################ -->
      <ul class="clear">
        <li class="active"><a href="index.html">Home</a></li>
        <li><a class="drop" href="#">Pages</a>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="pages/gallery.html">Gallery</a></li>
            <li><a href="pages/full-width.html">Full Width</a></li>
            <li><a href="inscription.php">Inscription</a></li>
            
          </ul>
        </li>
        
        
      </ul>
      <!-- ################################################################################################ -->
    </nav>
  </header>
</div>
<div class="wrapper row2">
  <section id="ctdetails" class="hoc container clear"> 
    <!-- ################################################################################################ -->
   
      <p class="nospace font-xs"></p>
<?php 
$id=htmlspecialchars($_POST['id']);
$nom=htmlspecialchars($_POST['nom']);
$mail=htmlspecialchars($_POST['mail']);
$mdp=htmlspecialchars($_POST['mdp']);
$prenom=addslashes(htmlspecialchars($_POST['prenom']));
$com=addslashes(htmlspecialchars($_POST['comment']));
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
        $req0="SELECT * from t_visiteur_vis where vis_id='".$id."' and vis_mdp='".$mdp."'";

        $res0 = $mysqli->query($req0);
            if ($res0 == false) //Erreur lors de l’exécution de la requête
            { // La requête a echoué
            echo "Error: La requête a echoué \n";
            echo "Errno: " . $mysqli->errno . "\n";
            echo "Error: " . $mysqli->error . "\n";
            exit();
            }
            else 
            {

                if ($res0->num_rows==1)
                {
                    $req00 ="SELECT * from t_commentaire_com where vis_id='".$id."'";
                    $res00 = $mysqli->query($req00);
                    echo('<br> A');
                    if ($res00 == false) //Erreur lors de l’exécution de la requête
                            { // La requête a echoué
                            echo "Error: La requête a echoué \n";
                            echo "Errno: " . $mysqli->errno . "\n";
                            echo "Error: " . $mysqli->error . "\n";
                            exit();
                            }
                    else 
                    {
                        if ($res00->num_rows==0)
                        {
                            $req1="SELECT * from t_visiteur_vis where vis_id='".$id."' and vis_date <= NOW() and NOW() <= TIMESTAMPADD(HOUR,3,vis_date)";
                            $res1=$mysqli->query($req1);
                            echo('<br> A');
                            if ($res1 == false) //Erreur lors de l’exécution de la requête
                                    { // La requête a echoué
                                    echo "Error: La requête a echoué \n";
                                    echo "Errno: " . $mysqli->errno . "\n";
                                    echo "Error: " . $mysqli->error . "\n";
                                    exit();
                                    }
                            else 
                            {
                                    if($res1->num_rows==1)
                                    {
                                        $req2="UPDATE t_visiteur_vis 
                                        SET  vis_nom='".$nom."', vis_prenom='".$prenom."', vis_mail='".$mail."' where vis_id='".$id."' ";
                                        $res2=$mysqli->query($req2);
                                        echo('<br> A');
                                        if ($res2 == false) //Erreur lors de l’exécution de la requête
                                            { // La requête a echoué
                                            echo "Error: La requête a echoué \n";
                                            echo "Errno: " . $mysqli->errno . "\n";
                                            echo "Error: " . $mysqli->error . "\n";
                                            exit();
                                            }
                                        else 
                                        {
                                            
                                            $req3="INSERT into t_commentaire_com values(NULL,'".$id."','".$com."',NOW(),'D')";
                                            $res3=$mysqli->query($req3);
                                            echo('<br> A');
                                            if ($res3 == false) //Erreur lors de l’exécution de la requête
                                            { // La requête a echoué
                                            echo "Error: La requête a echoué \n";
                                            echo "Errno: " . $mysqli->errno . "\n";
                                            echo "Error: " . $mysqli->error . "\n";
                                            exit();
                                            }
                                            else 
                                            {
                                                header("location:livredor.php");
                                            }
                                        }
                                        
                                        
                                    }
                                    else
                                    {
                                        echo("<br> <h1>Délais dépassé </br>");
                                        echo "<br>";
                                        echo("<button onclick=location.href='livredor.php'> Retour </button>");
                                    }
                            
                            } 
                        }
                        else 
                        {
                            echo("<br> <h1>vous avez deja écrit un commentaire</br>");
                            echo "<br>";
                            echo("<button onclick=location.href='livredor.php'> Retour </button>");

                        }
                         
                    }
                    
                              

                }
                else 
                {
                    echo("<br><h1> identifiant et/ou mot de passe incorrects :");
                    
                   echo("<button  onclick=location.href='livredor.php'> Retour </button>");
                }

            }
        //Ferme la connexion avec la base MariaDB
$mysqli->close();


?>

        </section>
        </div>
