<?php 
session_start();
?>
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
$req0="SELECT * from t_commentaire_com where vis_id='".$_POST['idun']."' ";
$req1="DELETE from t_commentaire_com where vis_id='".$_POST['idun']."' ";
$req2="DELETE from t_visiteur_vis where vis_id='".$_POST['idun']."' ";
$res0 = $mysqli->query($req0);

                
                      if (($res0)== false) //Erreur lors de l’exécution de la requête
                      { // La requête a echoué
                      echo "Error: La requête a echoué \n";
                      echo "Errno: " . $mysqli->errno . "\n";
                      echo "Error: " . $mysqli->error . "\n";
                      exit();
                      }
                      else {
                            if ( ($res0->num_rows)==1)
                            {
                                            $res1 = $mysqli->query($req1);
                                            if (($res1)== false) //Erreur lors de l’exécution de la requête
                                                    { // La requête a echoué
                                                    echo "Error: La requête a echoué \n";
                                                    echo "Errno: " . $mysqli->errno . "\n";
                                                    echo "Error: " . $mysqli->error . "\n";
                                                    exit();
                                                    }
                                                    else 
                                                    {
                                                        $res2 = $mysqli->query($req2); 
                                                        if (($res2)== false) //Erreur lors de l’exécution de la requête
                                                            { // La requête a echoué
                                                            echo "Error: La requête a echoué \n";
                                                            echo "Errno: " . $mysqli->errno . "\n";
                                                            echo "Error: " . $mysqli->error . "\n";
                                                            exit();
                                                            }
                                                            else 
                                                            {
                                                                header("Location:admin_ticket.php");
                                                            }
                                                    }
                            }
                           
                            else 
                                                    {
                                                        $res2 = $mysqli->query($req2); 
                                                        if (($res2)== false) //Erreur lors de l’exécution de la requête
                                                            { // La requête a echoué
                                                            echo "Error: La requête a echoué \n";
                                                            echo "Errno: " . $mysqli->errno . "\n";
                                                            echo "Error: " . $mysqli->error . "\n";
                                                            exit();
                                                            }
                                                            else 
                                                            {
                                                                header("Location:admin_ticket.php");
                                                            }
                                                    }
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