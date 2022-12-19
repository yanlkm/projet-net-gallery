<!DOCTYPE html>
<?php 
session_start();
?>
<?php 
                /* Vérification ci-dessous à faire sur toutes les pages dont l'accès est
                autorisé à un utilisateur connecté. */

    if(!isset($_SESSION['login']) ) //A COMPLETER pour tester aussi le rôle...
        {
                    //Si la session n'est pas ouverte, redirection vers la page du formulaire
                    header("Location:session.php");
        }
?>
<html>
<head>
<title>Gallerie Yanil</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>

<style>
p {
font-size: 20px;


}
</style>
      <div class="wrapper row1">
  <header id="header" class="hoc clear">
    <div id="logo" class="fl_left"> 
      <!-- ################################################################################################ -->
      <h1 class="logoname">M e n u <span></span></h1>
      <!-- ################################################################################################ -->
    </div>
    <nav id="mainav" class="fl_right"> 
      <!-- ################################################################################################ -->
            <ul class="clear">
                <li class="active"><a href="index.php">Home</a></li>
                
            <li class="active"><a href="admin_accueil.php">Accueil & Profils</a></li>
            <li class="active"><a href="admin_ticket.php">Gestion des Tickets</a></li>
            <li class="active"><a href="deconnexion_action.php">Déconnexion</a></li>

            </ul>
            
            </nav>
        </header>
  
    </div>
    <div class="wrapper row2">
  <section id="ctdetails" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    
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
              echo "<h1> Créer votre ticket </h1>";
              echo("<div class='one_third first'>");
              echo('<form action="admin_action_ticket.php" method="post">');
              echo('<h1>Saisir le mot de passe : <input type="password" name="motdp" required="required"/></h1>');
              echo('<h1>Confirmer votre mot de passe : <input type="password" name="motdp1" required="required" /></h1>');
              
              echo('<h1><u><input type="submit" value="Valider"></u></h1>');
              echo('</div>');
              
              echo('</form>');
            echo '<div class="sectiontitle">
            <p class="nospace font-xs"></p>
            <h1 class="heading font-x2"><font size="7" face="Georgia, Arial" color="maroon">Menu Tickets</font></h1>
              </div>';
            

//Préparation de la requête récupérant tous les profils
              $requete="SELECT cpt_pseudo,t_visiteur_vis.vis_id,vis_mdp,com_id,com_text from t_visiteur_vis 
              left outer join t_commentaire_com using (vis_id) ";
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
                      <th>Pseudo du générateur</th>
                      <th>Identifiant visteur</th>
                      <th>Mot de passe ticket</th>
                      <th>Identifiant commentaire</th>
                      <th>Commentaire</th>
                      
                      </thead>
                      <tbody>");

                    while ($actu = $result1->fetch_assoc()) 
                    {
                        echo("<tr>");
                        echo ("<td>".$actu['cpt_pseudo'] ."</td>"."<td>".$actu['vis_id']."</td>");
                        echo("<td>".$actu['vis_mdp']."</td>" );
                        echo("<td>".$actu['com_id']."</td>");
                        echo("<td>".$actu['com_text']."</td>");   
                        echo ("</tr>");
                    }
                    echo("</tbody></table>");
                    echo('<h6 class="heading font-x2">');

                    echo("Supprimer un ticket");
                    echo"</h6>";
                                $req2="SELECT vis_id from t_visiteur_vis;";
                                
                                $res2 = $mysqli->query($req2);
                                
                        
                              if ($res2 == false) //Erreur lors de l’exécution de la requête
                              { // La requête a echoué
                              echo "Error: La requête a echoué \n";
                              echo "Errno: " . $mysqli->errno . "\n";
                              echo "Error: " . $mysqli->error . "\n";
                              exit();
                              }
                              else { 
                                    echo("<div class='one_third first'>");
                                    echo('<form action="admin_ticket_action.php" method="post">');
                                    echo('<h1> Identifiant visiteur :<select name="idun">');
                                    
                                    while ($tab = $res2->fetch_assoc())
                                    {
                                        echo("<option >");
                                        echo($tab['vis_id']);
                                        echo("</option>");
                                    }
                                    echo('</select></p>');
                                    
                                    
                                    echo('<h1><input type="submit" value="Supprimer"></h1>');
                                    echo('</form>');
                                    echo('</div>');
                                 }
                                }

        //Ferme la connexion avec la base MariaDB
$mysqli->close();
    ?>