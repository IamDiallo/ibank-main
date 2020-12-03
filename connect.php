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
    if(empty($_POST["nom"]) || empty($_POST["prenom"]) || empty($_POST["mail_utili"]) ||  empty($_POST["password"]))  
    {  
      $_SESSION["msg"] = "Vous devez remplir le formulaire";
      header("location:account.php");  
      ob_end_flush();
      exit;
    }
    else
    {
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $mail_utili = $_POST['mail_utili'];
      $password = $_POST['password'];

      // check the email est deja utiliser
      $stmt = $conn->prepare( "SELECT mail_utili FROM utilisateur WHERE mail_utili = :mail_utili" );
      $stmt->bindValue( 1, $mail_utili );
      $stmt->execute();
      if ( $stmt->rowCount() > 0 ) { # If rows are found for query
        echo "<script type= 'text/javascript'>alert('Account Created Successfully');</script>";
        header("location:account.php");
        ob_end_flush();
        exit; 
    }
    else {
      $stmt = $conn->prepare("INSERT INTO utilisateur (nom, prenom, mail_utili, password, type_utili, user_status)
      Values (:nom, :prenom, :mail_utili, :password, :type_utili, :user_status)");
      $stmt->bindParam(':nom', $nom);
      $stmt->bindParam(':prenom', $prenom);
      $stmt->bindParam(':mail_utili', $mail_utili);
      $stmt->bindParam(':password', $password);
      $stmt->bindParam(':type_utili', $type_utili);
      $stmt->bindParam(':user_status', $user_status);
      $type_utili = 0;
      $user_status = 0;
  
      $stmt->execute();
      $user_id = $conn->lastInsertId();
     // prepare sql and bind parameters
      $stmt = $conn->prepare("INSERT INTO adresse_c (rue, code_postal, ville, pays)
      Values (:rue, :code_postal, :ville,:pays)");
      $stmt->bindParam(':rue', $rue);
      $stmt->bindParam(':code_postal', $code_postal);
      $stmt->bindParam(':ville', $ville);
      $stmt->bindParam(':pays', $pays);
  
      // insert a row in adresse table
      $rue = $_POST['rue'];
      $code_postal = $_POST['code_postal'];
      $ville = $_POST['ville'];
      $pays = $_POST['pays'];
      $stmt->execute();
  
      $adresse_id = $conn->lastInsertId();
      $stmt = $conn->prepare("INSERT INTO client (id_client, num_tel, civilite, id_adresse)
      Values (:id_client, :num_tel, :civilite,:id_adresse)");
      $stmt->bindParam(':id_client', $id_client);
      $stmt->bindParam(':num_tel', $num_tel);
      $stmt->bindParam(':civilite', $civilite);
      $stmt->bindParam(':id_adresse', $id_adresse);
         // insert a row in client
      $id_client = $user_id;
      $id_adresse = $adresse_id;
      $civilite = $_POST['civilite'];
      $num_tel = $_POST['num_tel'];
      $stmt->execute();
      $_SESSION['msg-login'] = "Votre Compte en ligne a été créé. Utilisez votre email et mot de passe pour vous connecter!";
      echo "Account Created Successfully";
      header("location:login.php");
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