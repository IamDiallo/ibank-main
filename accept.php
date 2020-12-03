<?php 
session_start();

$pdoString = "pgsql:host=localhost dbname=ibank user=mamadoubelladiallo password=pass123";
$conn = new PDO($pdoString);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try{
    $id_client = $_GET['id'];
    $id_ad =  $_SESSION["id"];
    //echo  $id_ad;
    $stmt = $conn->prepare( "SELECT id FROM utilisateur WHERE id = :id" );
    $stmt->bindValue(':id', $_SESSION["id"]);
    $stmt->execute();
    $record = $stmt->fetch();
   

    $stmt = $conn->prepare("INSERT INTO compte 
    (num_compte, credi_compte, status_compte, iban, cle_rib, num_carte, secret_code, id_client)
    Values (:num_compte, :credi_compte, :status_compte, :iban, :cle_rib, :num_carte, :secret_code, :id_client)");

    $stmt->bindParam(':num_compte', $num_compte);
    $stmt->bindParam(':credi_compte', $credi_compte);
    $stmt->bindParam(':status_compte', $status_compte);
    $stmt->bindParam(':iban', $iban);
    $stmt->bindParam(':secret_code', $secret_code);
    $stmt->bindParam(':cle_rib', $cle_rib);
    $stmt->bindParam(':num_carte', $num_carte);
    $stmt->bindParam(':id_client', $id_client);
    // $stmt->bindParam(':id_ad', $id_ad);

    $id_client = $_GET['id'];
    $id_ad =  12;
    // $id_ad =  $record['id'];
    $num_compte = mt_rand();
    $credi_compte = 0.00;
    // 
    $status_compte = 1;
    $iban = mt_rand();
    $num_carte = mt_rand();
    $secret_code = mt_rand(10,1000);
    $cle_rib = mt_rand(10,1000);
    $stmt->execute();
    $records = $stmt->fetch();
    $user_status =1;
    $id = $id_client;
    // $inStat = (int)$stat;
    $stmt = $conn->prepare("UPDATE utilisateur SET user_status = :user_status WHERE id= :id");
    $stmt->bindParam(':user_status', $user_status);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $action_ = 'Accept';
    $comment = 'Dossier complet';

    // // rempli la table admi_compte pour savoir quel admi à accepter le compte
    // $stmt = $conn->prepare("INSERT INTO admi_compte 
    // (id_ad, id_compte, action_, comment_) Values(:id_ad, :id_compte, :action_, :comment_)");
    //  $stmt->bindParam(':id_ad', $id_ad);
    //  $stmt->bindParam(':id_compte', $num_compte);
    //  $stmt->bindParam(':action_', $action_);
    //  $stmt->bindParam(':comment_', $comment);
    //  $stmt->execute();

    // echo  $records;
    if($stmt){
        // echo $num_compte. "--". $credi_compte . "--" . $iban . "---". $num_carte . "---" . $secret_code ."---". $clé_rib;
        header("location:home.php");  
        ob_end_flush();
        exit;
    }else{
        
        echo "something went wrong";
    }
}
catch(PDOException $error){
    echo "Error Happened" . $error;
  }

$conn= null;
?>