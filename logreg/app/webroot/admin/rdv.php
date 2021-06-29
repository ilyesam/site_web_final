<?php

function Redirect($Str_Location, $Bln_Replace = 1, $Int_HRC = NULL)
{
        if(!headers_sent())
        {
            header('location: ' . urldecode($Str_Location), $Bln_Replace, $Int_HRC);
            exit;
        }

    exit('<meta http-equiv="refresh" content="0; url=' . urldecode($Str_Location) . '"/>'); 
    return;
}

?>
<?php

 require_once('../Connections/conn.php');
 
 session_start();
 
$id = $_GET["id"]; 


$query_connecter = "SELECT * FROM connecter  where idc like  ".$_GET["idc"]; 
$connecter = $pdo->query($query_connecter);
$row_connecter = $connecter->fetch(PDO::FETCH_ASSOC) ;

if($row_connecter["etat"]=="0")
{
 Redirect($Str_Location = "/index.php?id=".$row_["id"], $Bln_Replace = 1, $Int_HRC = NULL);
}


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

$nom_p= $_POST["nom_p"];
$prenom_p= $_POST["prenom_p"];
$tel_p= $_POST["tel_p"];
$date_heure_rdv= $_POST["date_heure_rdv"];


$insertSQL = " INSERT INTO `bdd_medical`.`rdv` (`id_rdv`, `id_p`, `id_m`, `date_heure_rdv`, `nom`, `prenom`, `tel`) 

                VALUES (NULL, NULL,  \"$id\" , \"$date_heure_rdv\" ,   \"$nom_p\" ,  \"$prenom_p\" ,  \"$tel_p\" );";
 
           $res = $pdo->prepare($insertSQL);
           $exec = $res->execute(); 

  $insertGoTo = "liste_rdv.php?nom=".$nom_p.$prenom_p."&&tel=".$tel_p."&&email=".$email_p."&&id_p=".$id_p."&&id=".$id;
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo)); 
  
  }

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>patient</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h2 id="st">Espace assistant(e) </h2>
            </div>
            <!-- /.navbar-header -->

   
            <!-- /.navbar-top-links -->

      <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                
                    <ul class="nav" id="side-menu">
                     <li class="sidebar-search">
                     
                     <form action="recherche.php" method="get">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Recherche...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                         </form>   
                            
                            <!-- /input-group -->
                        </li>
                        <li>
          
          <a href="accueil.php?id=<?php echo $id; ?>&&idc=<?php echo $_GET["idc"]; ?>"><i class="fa fa-dashboard fa-fw"></i> Accueil</a>
      </li>
      <li>
          <a href="#"><i class="fa fa-users fa-fw"></i> Patient<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
              <li>
                <a href="patient.php?id=<?php echo $id; ?>&&idc=<?php echo $_GET["idc"]; ?>">Nouveau Patient </a>
              </li>
              <li>
                  <a href="liste_patients.php?id=<?php echo $id; ?>&&idc=<?php echo $_GET["idc"]; ?>">Liste des patients </a>
              </li>
          </ul>
          <!-- /.nav-second-level -->
      </li>
  

      <li>
          <a href="#"><i class="fa fa-wrench fa-fw"></i> RDV <span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
                          <li>
                  <a href="rdv.php?id=<?php echo $id; ?>&&idc=<?php echo $_GET["idc"]; ?>">Nouveau RDV</a>
                          </li>
                          <li>
                  <a href="liste_rdv.php?id=<?php echo $id; ?>&&idc=<?php echo $_GET["idc"]; ?>">Liste RDV</a>
                          </li>
                          
          </ul>
          <!-- /.nav-second-level -->
      </li>
      <li>
      
                  <a href="#"><i class="fa fa-wrench fa-fw"></i> Médecins <span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
             <li>
                      <a href="liste_med.php?id=<?php echo $id; ?>&&idc=<?php echo $_GET["idc"]; ?>">Liste Médecins</a>
              </li>
                  <li>
                  <a href="liste_p.php?id=<?php echo $id; ?>&&idc=<?php echo $_GET["idc"]; ?>">Pathologies</a>
              </li>
      
          </ul>
          <!-- /.nav-second-level -->
      </li>
                        
                                <li>
                                    <a class="fa fa-sign-out fa-fw"     href="logout.php?id=<?php echo $id; ?>&&idc=<?php echo $_GET["idc"]; ?>">Sortir</a>
                                </li>
                   
                   
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header" id="st">Prise de rendez-vous patient</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
 
            <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Ajouter un RDV</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <form method="POST" action="<?php echo $editFormAction; ?>" role="form" name="form1">
                       
                                    
                                    <div class="form-group">
                                     <label>Nom </label>
                                            <input class="form-control" required="required" pattern="[a-zA-Z]*[\s]*[a-zA-Z]*[\s]*[a-zA-Z]*" placeholder=" Enterez le Nom " name="nom_p">
                                    </div>
                                    
                                      <div class="form-group">
                                     <label>Prénom </label>
                                            <input class="form-control" required="required" pattern="[a-zA-Z]*[\s]*[a-zA-Z]*[\s]*[a-zA-Z]*" placeholder=" Enterez le Prénom " name="prenom_p">
                                    </div>
                                    
                           
                                    
                                      <div class="form-group">
                                     <label>Téléphone </label>
                                        <input class="form-control" required="required" pattern="^(0[1-7][0-9]{8})$" placeholder=" Entrez le Tel " name="tel_p">
                                    </div>
                              
                                    
                                      <div class="form-group">
                                     <label>Date heure </label>
                                        <input class="form-control" type="datetime-local" required="required" placeholder=" Entrez la Date et L'heure " name="date_heure_rdv">
                                    </div>
                                  
                                    
                                    
                              <div align="right">      <button type="submit" class="btn btn-primary">Valider</button></div>
                                    <input type="hidden" name="MM_insert" value="form1">
                                  </form>
                              </div>
        
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            
                    
        </div>
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>
<style>
#st{
        color:#337ab7;
        padding-left: 30px
    }
</style>
</html>

