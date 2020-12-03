<?php session_start(); 
$_SESSION["msg-login"] = "";
if (!isset($_SESSION['mail_utili']))
{
    header("Location: login.php");
    die();
}?>
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
a{
  /* text-decoration: none; */
  text-decoration: inherit; /* no underline */
}
</style>
<body>
<div id="viewport">
  <!-- Sidebar -->
  <div id="sidebar">
    <header>
      <a href="#">iBank Client</a>
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
        <a href="transferer.php">
          <i class="zmdi zmdi-link"></i> Transférer
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
            <a href="#"><i class="icofont-logout" style="color:white; wh"></i></i>
            </a>
          </li>
          <li><a href="logout.php" style="color:white" 
         >Déconnexion</a></li>
        </ul>
      </div>
    </nav>
    <div class="container-fluid">
      <h1>Tableau de bord Client</h1>
       <p id="msg">   
        <code> <?php echo $_SESSION["msg"]?></code>
      </p> 
      <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="panel-title" style="font-size:30px; display:flex">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" style="text-decoration: none;">
        Solde courant
        </a>
        <code style="color:green; margin-left: auto;"> <?php echo $_SESSION["solde"] > 0 ? $_SESSION["solde"] : '0.00'?>€</code>
      </div>
    </div>
    <div id="collapse1" class="panel-collapse collapse in">
      <div class="panel-body">
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="panel-title" style="font-size:30px">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" style="text-decoration: none;">
       Informations bancaires</a>
    </div>
    </div>
    <div id="collapse2" class="panel-collapse collapse container">
      <div class="row">
        <div class="col-md-4">
          <label for="usr">Numéro de compte:</label>
          <input type="text" class="form-control" value="<?php echo $_SESSION["num_compte"]?>" readonly>
        </div>
        <div class="col-md-4">
          <label for="usr">Numéro de carte:</label>
          <input type="text" class="form-control" value="<?php echo $_SESSION["num_carte"]?>" readonly>
        </div>
        <div class="col-md-4">
          <label for="usr">Code secret carte:</label>
          <input type="text" class="form-control" value="<?php echo $_SESSION["secret_code"]?>" readonly>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <label for="usr">IBAN</label>
          <input type="text" class="form-control" value="<?php echo  $_SESSION["iban"]?>" readonly>
        </div>
        <div class="col-md-4">
          <label for="usr">Clé RIB</label>
          <input type="text" class="form-control" value="<?php echo$_SESSION["cle_rib"]?>" readonly>
        </div>
        <div class="col-md-4">
          <label for="usr">Statut compte</label>
          <input type="text" class="form-control" value="<?php echo $_SESSION["statuts_compte"]?>" style="color:green" readonly>
        </div>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="panel-title" style="font-size:30px">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" style="text-decoration: none;">
        Historique des transactions</a>
      </div>
    </div>
    <div id="collapse3" class="panel-collapse collapse">
    <table id="example"  class="table table-bordered" style="width:100%; margin-top:20px">
            <thead>
                <tr>
                    <th>Montant</th>
                    <th>Statut</th>
                    <th>Type de transaction</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
            <?php 
          $pdoString = "pgsql:host=localhost dbname=ibank user=mamadoubelladiallo password=pass123";
          $conn = new PDO($pdoString);
          $comp_id =  $_SESSION["comp_id"];
          $query = "SELECT * FROM operation WHERE num_compte_debit = :id OR  num_compte_credit = :id";
          $stmt = $conn->prepare($query);
          $stmt->bindValue( 1, $comp_id);
          $stmt->execute();
          $count = $stmt->rowCount();
          if($count > 0)
          {
            $operation_Info = array();
            $operation_Info = $stmt->fetchAll();
            foreach ($operation_Info as $opera){
    ?>
                <tr>
                  <td><?php echo $opera['montant'];?></td>
                  <td><?php echo $opera['statu_opera'] == 1 ? 'Valider': 'Non_Valider';?></td>
                  <td><?php echo $opera['type_opera'];?></td>
                  <td><?php echo $opera['date_opera'];?></td>
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
  </script>
  <script>
    function hideMessage() {
    document.getElementById("msg").style.display = "none";
    };
    setTimeout(hideMessage, 6000);
  </script>
  
</body>
</html>