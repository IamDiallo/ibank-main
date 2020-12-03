<?php
session_start();
$pdoString = "pgsql:host=localhost dbname=ibank user=mamadoubelladiallo password=pass123";
  $conn = new PDO($pdoString);
  if (!$conn) {
    die("Could not connect");
  }else{
  //  echo "Opened database successfully haha\n";
  }
 // set the PDO error mode to exception
 try{

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if ('POST' === $_SERVER['REQUEST_METHOD'])
  {
    if(empty($_POST["num_compte"]) || empty($_POST["montant"]))  
    {  
      $_SESSION["msg"] = "Vous devez remplir le formulaire!";
      header("location:transferer.php");  
      ob_end_flush();
      exit;
    }
    else
    {
      $id_client =  $_SESSION["id"];
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      // le numero de compte qui réçoi
      $num_compte = $_POST['num_compte'];
      $montant = $_POST['montant'];
      //echo 'id'. $id_client.'nom'.$nom. 'prenom'.  $prenom. 'num_compte'.  $num_compte. 'montant'. $montant;
      // check the email est deja utiliser
      $stmt = $conn->prepare( "SELECT num_compte, credi_compte,id FROM compte WHERE id_client = :id_client" );
      $stmt->bindValue( 1, $id_client);
      $stmt->execute();
      if ( $stmt->rowCount() > 0 ) 
      { # If rows are found for query
        $info_compte = $stmt->fetch();
        
        //echo "numero de compte". $num_c[0]. "solde". $num_c[1];
        // si le compte a plus du montant à transferer et plus de 10 euro
        if($info_compte[1] > $montant && $info_compte[1] > 10)
        {
            // select le compte du client à envoyer
          $stmt = $conn->prepare( "SELECT credi_compte FROM compte WHERE num_compte = :num_compte");
          $stmt->bindValue( 1, $num_compte);
          $stmt->execute();
          // si le compte à transferer existe
          if ( $stmt->rowCount() > 0 )
          {
              $soldeTo = $stmt->fetch();
  
              $soldeTo[0] += $montant;
              $info_compte[1] -= $montant;
  
              $newSoldR = $soldeTo[0];
              $compteE = $info_compte[0];
              $newSoldE = $info_compte[1];
             // echo $soldeTo[0];
  
              // update le compte du client qui récoi
              $stmt = $conn->prepare("UPDATE compte SET credi_compte = :newSoldR WHERE num_compte= :num_compte");
              $stmt->bindParam(':newSoldR', $newSoldR);
              $stmt->bindParam(':num_compte', $num_compte);
              $stmt->execute();
              // le numero de compte de la personnne qui envoie
              $num_compte =  $info_compte[0];
              // update le compte du client qui envoi
              $stmt = $conn->prepare("UPDATE compte SET credi_compte = :newSoldE WHERE num_compte= :num_compte");
              $stmt->bindParam(':newSoldE', $newSoldE);
              $stmt->bindParam(':num_compte',  $num_compte);
              $stmt->execute();
               
              // recupère l'id du compte
              $num_compte = $_POST['num_compte'];
              $stmt = $conn->prepare("SELECT id from compte WHERE num_compte= :num_compte");
              $stmt->bindParam(':num_compte', $num_compte);
              $stmt->execute();
              $num_compte_c = $stmt->fetch();



              // echo  $records;
              // inserer les transaction dans la table operation
              $statu_opera = 1;
              $num_compte_debit = $info_compte[2];
              $num_compte_credit =   $num_compte_c[0];
              $type_opera = "Transfert";
              $stmt = $conn->prepare("INSERT INTO operation (statu_opera, montant, num_compte_debit, num_compte_credit, type_opera)
              VALUES(:statu_opera,:montant,:num_compte_debit,:num_compte_credit ,:type_opera)");
              $stmt->bindParam(':statu_opera', $statu_opera);
              $stmt->bindParam(':num_compte_debit',  $num_compte_debit);
              $stmt->bindParam(':num_compte_credit',  $num_compte_credit);
              $stmt->bindParam(':type_opera',  $type_opera);
              $stmt->bindParam(':montant',  $montant);
              $stmt->execute();

              // inserer dans la table de transfert
              $id_trans = $conn->lastInsertId();
              $montant_trans = $montant;
              $libelle_trans = 'Valider';
              $compt_envoi = $num_compte_debit;
              $compte_recoi =  $compte_recoi;

              $stmt = $conn->prepare("INSERT INTO transfert_argent (id_trans, montant_trans, libelle_trans, compt_envoi, compte_recoi)
              VALUES(:id_trans,:montant_trans,:libelle_trans,:compt_envoi ,:compte_recoi)");
              $stmt->bindParam(':id_trans', $id_trans);
              $stmt->bindParam(':montant_trans',  $montant_trans);
              $stmt->bindParam(':libelle_trans',  $libelle_trans);
              $stmt->bindParam(':compt_envoi',  $compt_envoi);
              $stmt->bindParam(':compte_recoi',  $compte_recoi);

              if($stmt)
              {
                  
                  $_SESSION["msg"] = " Le transfert a été exécuté avec succès!";
                  $_SESSION["solde"] = $info_compte[1];
                  header("location:clientHome.php");  
                  ob_end_flush();
                  exit;
              }
              else
              {
                  
                $_SESSION["msg"] = "Réessayez votre tentative!";
                header("location:clientHome.php");  
                ob_end_flush();
                exit;
              }
          }
          else
          {
            $_SESSION["msg"] = "Le compte à transférer n'existe pas!";
            header("location:clientHome.php");  
            ob_end_flush();
            exit;
          }
  
        }
        else
        {
          $_SESSION["msg"] = "Vous n'avez pas suffisament d'argent pour effectuer ce transfert!";
          header("location:clientHome.php");  
          ob_end_flush();
          exit;
        }
  
      }
      else 
      {
        $_SESSION["msg"] = "Votre Demande d'ouverture est en cours de traitement. Vous ne pouvez pas effectuer de transaction pour le moment!";
        header("location:clientHome.php");  
        ob_end_flush();
        exit;
      }
    }

  }
   
 }
  catch(PDOException $error){
    echo "Error Happened" . $error;
    // header("location:login.php");
    // ob_end_flush();
    // exit; 
  }
  $conn = null;

?>