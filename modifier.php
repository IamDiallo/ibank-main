<?php 
$pdoString = "pgsql:host=localhost dbname=ibank user=mamadoubelladiallo password=pass123";
$conn = new PDO($pdoString);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_POST['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$civilite = $_POST['civilite'];
$mail_utili = $_POST['mail_utili'];
$num_tel = $_POST['num_tel'];
$created_at = $_POST['created_at'];
$rue = $_POST['rue'];
$ville = $_POST['ville'];
$pays = $_POST['pays'];


try{

 
    $stmt = $conn->prepare( 'UPDATE utilisateur ' . 'set nom=:nom,'.'prenom=:prenom,'.'mail_utili=:mail_utili,'.'created_at=:created_at '. 'WHERE id = :id');
	$stmt->bindValue(':id', $id);
	$stmt->bindValue(':nom', $nom);
	$stmt->bindValue(':prenom', $prenom);
	$stmt->bindValue(':mail_utili', $mail_utili);
	$stmt->bindValue(':created_at', $created_at);
	$stmt->execute();
	$stmt = $conn->prepare( 'UPDATE client ' . 'set num_tel=:num_tel,'.'civilite=:civilite '. 'WHERE id_client = :id');
	$stmt->bindValue(':id', $id);
	$stmt->bindValue(':num_tel', $num_tel);
	$stmt->bindValue(':civilite', $civilite);
    $stmt->execute();
	$stmt = $conn->prepare( 'UPDATE adresse_c ' . 'set rue=:rue,'.'ville=:ville,'.'pays=:pays '. 'WHERE id_adresse = (SELECT id_adresse FROM client WHERE id_client = :id)');
	$stmt->bindValue(':id', $id);
	$stmt->bindValue(':rue', $rue);
	$stmt->bindValue(':ville', $ville);
	$stmt->bindValue(':pays', $pays);
    $stmt->execute();
    
    if($stmt){
        echo "okk";

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