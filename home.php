<?php 
session_start(); 
// require 'loginCheck.php';
if (!isset($_SESSION['mail_utili']))
{
    header("Location: login.php");
    die();
}?>
<?php
if(isset($_GET['action']))
{
// variable pour detecter l'appui du bouton modifier sur une ligne
$action= $_GET['action'];


}
else {
	$action="";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables.css">
      <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables_themeroller.css">
      <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.1.min.js"></script>
      <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/jquery.dataTables.min.js"></script>
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500');

body {
  overflow-x: hidden;
  font-family: 'Roboto', sans-serif;
  font-size: 16px;
}

/* Toggle Styles */

#viewport {
  padding-left: 250px;
  -webkit-transition: all 0.5s ease;
  -moz-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;
}

#content {
  width: 100%;
  position: relative;
  margin-right: 0;
}

/* Sidebar Styles */

#sidebar {
  z-index: 1000;
  position: fixed;
  left: 250px;
  width: 250px;
  height: 100%;
  margin-left: -250px;
  overflow-y: auto;
  background: #1E2661;
  -webkit-transition: all 0.5s ease;
  -moz-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;
}

#sidebar header {
  background-color: #02010F;
  font-size: 20px;
  line-height: 52px;
  color: black;
  text-align: center;
}

#sidebar header a {
  color: #fff;
  display: block;
  text-decoration: none;
}

#sidebar header a:hover {
  color: #fff;
}

#sidebar .nav{
  
}
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 7px 7px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
#sidebar .nav a{
  background: none;
  border-bottom: 1px solid #455A64;
  color: #CFD8DC;
  font-size: 14px;
  padding: 16px 24px;
}

#sidebar .nav a:hover{
  background: none;
  color: #ECEFF1;
}

#sidebar .nav a i{
  margin-right: 16px;
}
#bar{
  background: #1E2661;
  color: white;
}
</style>
<body>
<div id="viewport">
  <!-- Sidebar -->
  <div id="sidebar">
    <header>
      <a href="#">iBank Administrateur</a>
      <a href="">
           <?php echo $_SESSION["nom"]?></a>
    </header>
    <ul class="nav">
      <li>
        <a href="#">
          <i class="zmdi zmdi-view-dashboard"></i> Tableau de bord
        </a>
      </li>
      <li>
        <a href="#">
          <i class="zmdi zmdi-link"></i> Compte
        </a>
      </li>
      <li>
        <a href="#">
          <i class="zmdi zmdi-widgets"></i> Historique des transactions
        </a>
      </li>
      <li>
        <a href="#">
          <i class="zmdi zmdi-calendar"></i> Infos RIB
        </a>
      </li>
      <li>
        <a href="#">
          <i class="zmdi zmdi-info-outline"></i> À propos
        </a>
      </li>
      <li>
        <a href="#">
          <i class="zmdi zmdi-settings"></i> Services
        </a>
      </li>
      <li>
        <a href="#">
          <i class="zmdi zmdi-comment-more"></i> Contact
        </a>
      </li>
    </ul>
  </div>
  <!-- Content -->
  <div id="content">
    <nav class="navbar navbar-default" id="bar">
      <div class="container-fluid">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="#"><i class="icofont-logout" style="color:white"></i></i>
            </a>
          </li>
          <li><a href="logout.php" style="color:white" 
         >Déconnexion</a></li>
        </ul>
      </div>
    </nav>
    <div class="container-fluid">
      <h1>Tableau de bord Administrateur</h1>
      <p id="msg">   
          <!-- <code style="color:red; font-size:20px"> <?php echo $_SESSION["modifier"]?></code> -->
      </p> 
      <!-- <p>
        
        <code>#content</code>.
      </p> -->
      <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
       Demandes en attente </a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse in">
      <div class="panel-body">
      <h5 class="panel-title" style="font-size:20px; text-align: center; color:#1C3280; margin-top:10px">Demande en Attente</h5>
      <table id="example"  class="table table-bordered" style="width:100%; margin-top:20px">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Civilité</th>
                    <th>Mail</th>
                    <th>Téléphone</th>
                    <th>Date</th>
                    <th>Rue</th>
                    <th>Ville</th>
                    <th>Pays</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
             $pdoString = "pgsql:host=localhost dbname=ibank user=mamadoubelladiallo password=pass123";
             $conn = new PDO($pdoString);
             $query = "SELECT * FROM utilisateur JOIN client ON utilisateur.id = client.id_client
              JOIN adresse_c ON client.id_adresse = adresse_c.id_adresse WHERE user_status = 0 AND type_utili = 0";
             $statement = $conn->prepare($query);
             $statement->execute();
             $count = $statement->rowCount();
             if($count > 0){
              $users = array();
              $users = $statement->fetchAll();
              $id_ad =  $_SESSION["id"];
              foreach ($users as $user){
                 
             ?>
                <tr>
                  <td><?php echo $user['nom']; ?></td>
                  <td><?php echo $user['prenom']; ?></td>
                  <td><?php echo $user['civilite']; ?></td>
                  <td><?php echo $user['mail_utili']; ?></td>
                  <td><?php echo $user['num_tel']; ?></td>
                  <td><?php echo $user['created_at']; ?></td>
                  <td><?php echo $user['rue']; ?></td>
                  <td><?php echo $user['ville']; ?></td>
                  <td><?php echo $user['pays']; ?></td>
                  <td>
                  <?php
                      echo "<a  class='button' href=\"accept.php?id=".$user['id']."\">Accept</a>"; 
                      echo "<a  class='button' style='background-color: #f44336' href=\"delete.php?id=".$user['id']."\">Delete</a>";
                  ?> 
                  </td>
                </tr>
             <?php
              }
            }
             ?>
            </tbody>
            <tfoot>
                <tr>
                <th>Nom</th>
                    <th>Prénom</th>
                    <th>Civilité</th>
                    <th>Mail</th>
                    <th>Téléphone</th>
                    <th>Date</th>
                    <th>Rue</th>
                    <th>Ville</th>
                    <th>Pays</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
        Demandes traitées</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">
      <h5 class="panel-title" style="font-size:20px; text-align: center; color:#1C3280; margin-top:10px">Liste total des Clients</h5>
	  <table id="example2"  class="table table-bordered" style="width:100%; margin-top:20px">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Civilité</th>
                    <th>Mail</th>
                    <th>Téléphone</th>
                    <th>Date</th>
                    <th>Rue</th>
                    <th>Ville</th>
                    <th>Pays</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
             $pdoString = "pgsql:host=localhost dbname=ibank user=mamadoubelladiallo password=pass123";
             $conn = new PDO($pdoString);
             $query = "SELECT * FROM utilisateur JOIN client ON utilisateur.id = client.id_client
              JOIN adresse_c ON client.id_adresse = adresse_c.id_adresse WHERE user_status = 1";
             $statement = $conn->prepare($query);
             $statement->execute();
             $count = $statement->rowCount();
             if($count > 0){
              $users = array();
              $users = $statement->fetchAll();
              foreach ($users as $user){
                 
             ?>
			
               <tr>
				  <td><?php if (($action=='M')and ($_GET['id']==$user['id'])){
					echo "<form method=\"post\" action=\"modifier.php\">"."<input type='text' name=\"nom\" size=10 ";echo "value=";echo $user['nom'].">"; echo "</td>";
					echo "<input type=\"hidden\""; echo "value=".$user['id']; echo " name=\"id\"".">";
					echo "<td>"."<input type='text' name=\"prenom\" size=5 ";echo "value=";echo $user['prenom'].">"; echo "</td>";
					echo "<td>"."<input type='text' name=\"civilite\" size=2 ";echo "value=";echo $user['civilite'].">"; echo "</td>";
					echo "<td>"."<input type='text' name=\"mail_utili\" size=12 ";echo "value=";echo $user['mail_utili'].">"; echo "</td>";
					echo "<td>"."<input type='text' name=\"num_tel\" size=9 ";echo "value=";echo $user['num_tel'].">"; echo "</td>";
					echo "<td>"."<input type='text' name=\"created_at\" size=10 ";echo "value=";echo $user['created_at'].">"; echo "</td>";
					echo "<td>"."<input type='text' name=\"rue\" size=5 ";echo "value=";echo $user['rue'].">"; echo "</td>";
					echo "<td>"."<input type='text' name=\"ville\" size=5 ";echo "value=";echo $user['ville'].">"; echo "</td>";
					echo "<td>"."<input type='text' name=\"pays\" size=5 ";echo "value=";echo $user['pays'].">"; echo "</td>";

					}
				  else{
					echo $user['nom']; ?> </td>
                  <td><?php echo $user['prenom']; ?></td>
                  <td><?php echo $user['civilite']; ?></td>
                  <td><?php echo $user['mail_utili']; ?></td>
                  <td><?php echo $user['num_tel']; ?></td>
                  <td><?php echo $user['created_at']; ?></td>
                  <td><?php echo $user['rue']; ?></td>
                  <td><?php echo $user['ville']; ?></td>
				  <td><?php echo $user['pays']; }?></td>
                  <td>
                  <?php
                  
				  
				if (($action=='M')and ($_GET['id']==$user['id'])){
					  echo "<input class='button' style='background-color:blue' type=\"submit\" size=20 value=\"Valider\""."></form>"; 
					  echo "<a  class='button' style='background-color: #f44336' href=\"home.php"."\">Annuler</a>";
				}
				else{
					 echo "<a  class='button' href=\"home.php?id=".$user['id']."&action=M"."\">Modifier</a>"; 
                      echo "<a  class='button' style='background-color: #f44336' href=\"delete.php?id=".$user['id']."\">Annuler</a>";
				}
					
				 
                  ?> 
                  </td>
                </tr>
             <?php
              }
            }
             ?>
            </tbody>
            <tfoot>
                <tr>
                <th>Nom</th>
                    <th>Prénom</th>
                    <th>Civilité</th>
                    <th>Mail</th>
                    <th>Téléphone</th>
                    <th>Date</th>
                    <th>Rue</th>
                    <th>Ville</th>
                    <th>Pays</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
	  </div></div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
       Montant Total des Transactions</a>
      </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse">
    <h5 class="panel-title" style="font-size:20px; text-align: center; color:#1C3280; margin-top:10px">Montant total des Transactions</h5>
    <table id="example3"  class="table table-bordered" style="width:100%; margin-top:20px">
            <thead>
                <tr>
                    <th>Transaction</th>
                    <th>Nombre de Transaction</th>
                    <th> Montant Total</th>
                </tr>
            </thead>
            <tbody>
            <?php 
          $pdoString = "pgsql:host=localhost dbname=ibank user=mamadoubelladiallo password=pass123";
          $conn = new PDO($pdoString);
          $comp_id =  $_SESSION["comp_id"];
          $query = "SELECT type_opera,  count(num_opera) as numbre_de_Transaction, sum(montant) as Montant_totak 
                  FROM operation group by type_opera;";
          $stmt = $conn->prepare($query);
          // $stmt->bindValue( 1, $comp_id);
          $stmt->execute();
          $count = $stmt->rowCount();
          if($count > 0)
          {
            $operation_Info = array();
            $operation_Info = $stmt->fetchAll();
            foreach ($operation_Info as $opera){
    ?>
                <tr>
                 <td><?php echo $opera[0];?></td>
                 <td><?php echo $opera[1];?></td>
                  <td>€<?php echo $opera[2];?></td>
                </tr>
             <?php
              }
            }
             ?>
            </tbody>
        </table>
      <div class="panel-body"></div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
       Moyenne Transactions Par Jour</a>
      </h4>
    </div>

    <div id="collapse5" class="panel-collapse collapse">
    <h5 class="panel-title" style="font-size:20px; text-align: center; color:#1C3280; margin-top:10px"> Moyenne Transactions Par Jour</h5>
    <table id="example5"  class="table table-bordered" style="width:100%; margin-top:20px">
            <thead>
                <tr>
                    <th>Transaction</th>
                    <th>Moyenne du Nombre Transaction</th>
                    <th>Moyenne du Montant Transactiom</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
            <?php 
          $pdoString = "pgsql:host=localhost dbname=ibank user=mamadoubelladiallo password=pass123";
          $conn = new PDO($pdoString);
          $comp_id =  $_SESSION["comp_id"];
          $query = "SELECT type_opera, avg(num_opera), avg(montant),date_opera FROM operation GROUP BY  DATE(date_opera),  type_opera ORDER BY date_opera DESC";
          $stmt = $conn->prepare($query);
          // $stmt->bindValue( 1, $comp_id);
          $stmt->execute();
          $count = $stmt->rowCount();
          if($count > 0)
          {
            $operation_Info = array();
            $operation_Info = $stmt->fetchAll();
            foreach ($operation_Info as $opera){
    ?>
                <tr>
                 <td><?php echo $opera[0];?></td>
                 <td><?php echo number_format((float)$opera[1], 2, '.', '');?></td>
                  <td><?php  echo number_format((float)$opera[2], 2, '.', '');?></td>
                  <td><?php echo $opera[3];?></td>
                </tr>
             <?php
              }
            }
            else{
              echo 'badddd';
            }
             ?>
            </tbody>
        </table>
      <div class="panel-body"></div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
       Nombre de demande d'ouverture de compte Par Jour et Ville</a>
      </h4>
    </div>

    <div id="collapse6" class="panel-collapse collapse">
    <h5 class="panel-title" style="font-size:20px; text-align: center; color:#1C3280; margin-top:10px"> Moyenne Transactions Par Jour</h5>
    <table id="example6"  class="table table-bordered" style="width:100%; margin-top:20px">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Ville</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
            <?php 
          $pdoString = "pgsql:host=localhost dbname=ibank user=mamadoubelladiallo password=pass123";
          $conn = new PDO($pdoString);
          $comp_id =  $_SESSION["comp_id"];
          $query = "SELECT  count(id) as nombre, created_at ,  adresse_c.ville
          FROM public.utilisateur JOIN client ON utilisateur.id = client.id_client JOIN adresse_c ON client.id_adresse = adresse_c.id_adresse
          GROUP BY  DATE(created_at), adresse_c.ville
          ORDER BY created_at DESC";
          $stmt = $conn->prepare($query);
          // $stmt->bindValue( 1, $comp_id);
          $stmt->execute();
          $count = $stmt->rowCount();
          if($count > 0)
          {
            $operation_Info = array();
            $operation_Info = $stmt->fetchAll();
            foreach ($operation_Info as $opera){
    ?>
                <tr>
                 <td><?php echo $opera[0];?></td>
                  <td><?php echo $opera[2];?></td>
                  <td><?php echo $opera[1];?></td>
                </tr>
             <?php
              }
            }
            else{
              echo 'badddd';
            }
             ?>
            </tbody>
        </table>
      <div class="panel-body"></div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
        Client de iBank par Ville</a>
      </h4>
    </div>
    <div id="collapse4" class="panel-collapse collapse">
    <h5 class="panel-title" style="font-size:20px; text-align: center; color:#1C3280; margin-top:10px">Nome de Client par Ville</h5>
    <table id="example4"  class="table table-bordered" style="width:100%; margin-top:20px">
            <thead>
                <tr>
                    <th>Ville</th>
                    <th>Nombre de Client</th>
                </tr>
            </thead>
            <tbody>
            <?php 
          $pdoString = "pgsql:host=localhost dbname=ibank user=mamadoubelladiallo password=pass123";
          $conn = new PDO($pdoString);
          $comp_id =  $_SESSION["comp_id"];
          $query = "SELECT COUNT(id),   adresse_c.ville FROM utilisateur JOIN client ON utilisateur.id = client.id_client JOIN adresse_c ON client.id_adresse = adresse_c.id_adresse GROUP BY adresse_c.ville;";
          $stmt = $conn->prepare($query);
          // $stmt->bindValue( 1, $comp_id);
          $stmt->execute();
          $count = $stmt->rowCount();
          if($count > 0)
          {
            $operation_Info = array();
            $operation_Info = $stmt->fetchAll();
            foreach ($operation_Info as $opera){
    ?>
                <tr>
                <td><?php echo $opera[1];?></td>
                <td><?php echo $opera[0];?></td>
                </tr>
             <?php
              }
            }
            else{
              echo 'badddd';
            }
             ?>
            </tbody>
        </table>
      <div class="panel-body"></div>
    </div>
  </div>
</div>
    </div>
  </div>
</div>
  <script>
       $(document).ready(function() {
       $('#example').DataTable({
        "order": [[ 3, "desc" ]]
       })      
       } );
       $(document).ready(function() {
       $('#example2').DataTable({
        "order": [[ 3, "desc" ]]
       })      
       } );
       $(document).ready(function() {
       $('#example3').DataTable({
        "order": [[ 3, "desc" ]]
       })      
       } );
       $(document).ready(function() {
       $('#example4').DataTable({
        "order": [[ 3, "desc" ]]
       })      
       } );
       $(document).ready(function() {
       $('#example5').DataTable({
        "order": [[ 3, "desc" ]]
       })      
       } );
       $(document).ready(function() {
       $('#example6').DataTable({
        "order": [[ 3, "desc" ]]
       })      
       } );
  </script>
  <script>
    function hideMessage() {
    document.getElementById("msg").style.display = "none";
    };
    setTimeout(hideMessage, 6000);
  </script>
  
</body>
</html>