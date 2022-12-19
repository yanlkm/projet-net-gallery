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

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->


 
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->


        <div class="wrapper row2">
        <section id="ctdetails" class="hoc container clear">
        <div class="sectiontitle">
      <p class="nospace font-xs"></p>
      <h1 class="heading font-x2"><font size="7" face="Georgia, Arial" color="maroon">CONNEXION REUSSIE</font></h1>
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
            
            if (!$mysqli->set_charset("utf8")) 
            {
                printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
                exit();
            }
            $id=$_SESSION['login'];
            $req="SELECT * from t_profil_pfl where cpt_pseudo='".$id. "' ";
            $res = $mysqli->query($req);
            
            if ($res == false) //Erreur lors de l’exécution de la requête
                      { // La requête a echoué
                      echo "Error: La requête a echoué \n";
                      echo "Errno: " . $mysqli->errno . "\n";
                      echo "Error: " . $mysqli->error . "\n";
                      exit();
                      }
                      else {
                            if($pro= $res->fetch_assoc())
                            {

                                
                                echo ('<div class="one_quarter first">');
                                echo "<h1> Votre pseudo : </h1>";
                                echo "<h1>";
                                echo ($pro['cpt_pseudo'] );
                                echo ('</div>');
                                echo ('<div class="one_quarter">');
                                echo "<h1> Votre nom :</h1>";
                                echo "<h1>";
                                echo ($pro['pfl_nom'] );
                                echo ('</div>');
                                echo ('<div class="one_quarter">');
                                echo "<h1> Votre prenom :</h1>";
                                echo "<h1>";
                                echo ($pro['pfl_prenom'] );
                                echo ('</div>');
                                echo ('<div class="one_quarter">');
                                echo "<h1> Votre adresse mail: </h1>";
                                echo "<h1>";
                                echo ($pro['pfl_email'] );
                                echo ('</div>');
                                echo"<br>";           echo"<br>";           echo"<br>";           echo"<br>";           echo"<br>";           echo"<br>";           echo"<br>";           echo"<br>";           echo"<br>";
                            
                            }
                             
                                    
                            echo "<h1> Modifier votre profil </h1>";
                            echo("<div class='one_third first'>");
                            echo('<form action="admin_action_mdp.php" method="post">');
                            echo('<h1> Nouveau mot de passe : <input type="password" name="motdp" required="required"/></h1>');
                            echo('<h1>Confirmer votre mot de passe : <input type="password" name="motdp1" required="required" /></h1>');
                            
                            echo('<h1><u><input type="submit" value="Modifier"></u></1>');
                            echo('</div>');
                            
                            echo('</form>');
                            
                            
                            
                      }
            if($_SESSION['role']=='A')

            {
                echo'<style>
                        .btn{
                        margin-left:px;
                        }
                    </style>';
                echo'<div class="sectiontitle">
                <p class="nospace font-xs"></p>
                <button class="btn"><h1 class="heading font-x2">Vous êtes admnistrateur</h1></button>';
                echo'</div>';
                
                
                $requete="SELECT cpt_pseudo,pfl_nom,pfl_prenom,pfl_email,pfl_validite FROM t_profil_pfl;";
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
                            echo'<h1> profils enregistrés :';
                              echo($result1->num_rows);
                              echo "</h1>";
                              echo("<table class='table table-hover'>");
                              echo("<thead>
                                      <tr>
                                      <th>Pseudo</th>
                                      <th>Nom</th>
                                      
                                      <th>prenom</th>
                                      <th>mail</th>
                                      <th>Validité</th>
                                      
                                      </thead>
                                      <tbody>");
                
                                    while ($actu = $result1->fetch_assoc()) 
                                    {
                                        echo("<tr>");
                                        echo ("<td>".$actu['cpt_pseudo'] ."</td>"."<td>".$actu['pfl_nom']."</td>" );
                                        echo ("<td>".$actu['pfl_prenom']."</td>"."<td>".$actu['pfl_email']."</td>"."<td>".$actu['pfl_validite']."</td>");
                                        echo ("</tr>");
                                    }
                                    echo("</tbody></table>");
                          }
           
                          echo('<h2 class="heading font-x2">');
            echo "<br>";
            echo"</br>";
            echo("Modifier la validité");
            echo"</h2>";
                        $req2="SELECT cpt_pseudo from t_compte_cpt;";
                        $res2 = $mysqli->query($requete);
                
                      if ($res2 == false) //Erreur lors de l’exécution de la requête
                      { // La requête a echoué
                      echo "Error: La requête a echoué \n";
                      echo "Errno: " . $mysqli->errno . "\n";
                      echo "Error: " . $mysqli->error . "\n";
                      exit();
                      }
                      else {
                            echo("<div class='one_third first'>");
                            echo('<form action="admin_action.php" method="post">');
                            echo('<h1> Selection du pseudo : <select name="pseudo">');
                            
                            while ($tab = $res2->fetch_assoc())
                            {
                                echo("<option >");
                                echo($tab['cpt_pseudo']);
                                echo("</option>");
                            }
                            
                            echo('</select>');
                            echo '</h1>';
                            
                            echo('<h1> Selection de la validité : <select name="validite">');
                            echo('<option>A</option>');
                            echo('<option>D</option>');
                            echo('</select>');
                            echo '<br>';
                            echo('<h1><input type="submit" value="Valider"></h1>');
                            echo('</form>');
                            echo('</div>');
                      }
            
            
            }
            if($_SESSION['role']=='O')

            {
                echo'<style>
                        .btn{
                        margin-left:px;
                        }
                    </style>';
                echo'<div class="sectiontitle">
                <p class="nospace font-xs"></p>
                <button class="btn"><h1 class="heading font-x2">Vous êtes organisateur</h1></button>';
                echo'</div>';
                
            }
            
                      $mysqli->close();
         ?>
         
        
       
         



