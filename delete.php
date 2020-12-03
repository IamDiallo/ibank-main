<?php 
$pdoString = "pgsql:host=localhost dbname=ibank user=mamadoubelladiallo password=pass123";
$conn = new PDO($pdoString);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$id = $_GET['id'];
try{
    $stmt = $conn->prepare( "SELECT id FROM utilisateur WHERE id = :id" );
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    
    $record = $stmt->fetch();
    $stmt = $conn->prepare( "DELETE FROM utilisateur WHERE id = :id" );
    $stmt->bindValue(':id', $record['id']);
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