<?php
session_start();
$_SESSION["modifier'"] = "";
try{
    $pdoString = "pgsql:host=localhost dbname=ibank user=mamadoubelladiallo password=pass123";
    $conn = new PDO($pdoString);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($_POST["login"]))  
    {
        if(empty($_POST["mail_utili"]) || empty($_POST["password"]))  
        {  
            $_SESSION['msg-login'] = "Vous devez remplir le formulaire!";
            header("location:login.php"); 
        }  
        else
        {
            $query = "SELECT * FROM utilisateur WHERE mail_utili = :mail_utili AND password = :password";
            $statement = $conn->prepare($query);

            $statement->execute(  
                array(  
                    'mail_utili'     =>     $_POST["mail_utili"],  
                    'password'     =>       $_POST["password"],
                )  
            );
            $count = $statement->rowCount();  
            if($count > 0)  
            {   
		
               
                $user = $statement->fetch();
                echo $user[5];
                $_SESSION["msg"] = "";
                $_SESSION["mail_utili"] = $_POST["mail_utili"];
                $_SESSION["nom"] = $user[2];
                $_SESSION["id"] = $user[0];
				  if($user[4] == 1) // admin
					  
				{
                    $_SESSION["comp_id"] = $compte_Info[0];
                    $_SESSION["id"] = $ad_id[0];
                    $_SESSION["modifier'"] = "";
                    header("location:home.php");  
                    ob_end_flush();
                    exit;
                }
				 elseif ($user[4] == 0) // client
                {
                  // $query = "SELECT * FROM Client WHERE id = :id 
                // JOIN adresse_c ON client.id_adresse = adresse_c.id_adresse";
                $id = $user[0];
                // $stmt = $conn->prepare($query);
                // $stmt->bindValue( 1, $id);
                // $stmt->execute();
                // $client = $stmt->fetch();
                // $_SESSION["num_tel"] = $client[1];
                // $_SESSION["civilie"] = $client[2];
                // $adresse_id = $client[3];

                $query = "SELECT * FROM compte WHERE id_client = :id";
                $stmt = $conn->prepare($query);
                $stmt->bindValue( 1, $id);
                $stmt->execute();

                $compte_Info = $stmt->fetch();


                $_SESSION["num_compte"] = $compte_Info[1];
				
                $_SESSION["solde"] = $compte_Info[2];
                $_SESSION["statuts_compte"] = $compte_Info[3] ==1 ? "Actif":"Inactif";
                $_SESSION["iban"] = $compte_Info[4];
                $_SESSION["cle_rib"] = $compte_Info[5];
                $_SESSION["num_carte"] = $compte_Info[6];
                $_SESSION["secret_code"] = $compte_Info[7];
                $_SESSION["date_ouverture"] = $compte_Info[9];
                $_SESSION["comp_id"] = $compte_Info[0];
                $comp_id = $compte_Info[0];
                 //transaction table
                 $query = "SELECT * FROM operation WHERE num_compte_debit = :id";
                 $stmt = $conn->prepare($query);
                 $stmt->bindValue( 1, $comp_id);
                 $stmt->execute();
                 $operation_Info = $stmt->fetch();
                // $count = $stmt->rowCount(); 
                 
                $_SESSION["statu_opera"] = $operation_Info[1] ==1 ? Valider: Non_Valid;
                $_SESSION["montant"] = $operation_Info[2];
                $_SESSION["date_opera"] = $operation_Info[5];
                $_SESSION["type_opera"] = $operation_Info[6];
                // echo $compte_Info[2];     
					header("location:clientHome.php");  
                    ob_end_flush();
                    exit;
                }

                
              
            }  
            elseif($count == 0)
            {  
                $_SESSION['msg-login'] = "Votre email ou mot de passe est incorrect!";
                header("location:login.php"); 
            }   

        }
    }
    else{
        $_SESSION['msg-error'] = "Vous devez remplir!";
        header("location:login.php"); 
    }
  
}
catch(PDOException $error)  
 {  
    $_SESSION['msg-error'] = "Veuillez réessayer encore!";
    header("location:login.php"); 
 } 
$conn = null;
?>