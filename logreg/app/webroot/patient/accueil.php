﻿<?php 
 require_once('../Connections/conn.php');  //// connection bdd 
 
 session_start();
 
$id = $_GET["id"]; /////////////recuperation variable url 

$query_connecter = "SELECT * FROM connecter  where idc like  ".$_GET["idc"]; 
$connecter = $pdo->query($query_connecter);
$row_connecter = $connecter->fetch(PDO::FETCH_ASSOC) ;

if($row_connecter["etat"]=="0")
{
 Redirect($Str_Location = "/index.php?id=".$row_["id"], $Bln_Replace = 1, $Int_HRC = NULL);
}

///////////// verification connection 
	
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bienvenue patient </title>

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
    <style>
    #st{
        color:#337ab7;
        padding-left: 30px
    }
    </style>
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
                    <h2 id="st">Espace patient </h2>  
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
          
               
             
             
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                 <ul class="dropdown-menu dropdown-user">
                          <li><a href="liste_patients.php?id=<?php echo $id; ?>&&idc=<?php echo $_GET["idc"]; ?>"><i class="fa fa-user fa-fw"></i>  Profile</a>
                        </li>
               
                        <li class="divider"></li>
                        <li><a href="logout.ph?id=<?php echo $id; ?>&&idc=<?php echo $_GET["idc"]; ?>"><i class="fa fa-sign-out fa-fw"></i> Sortir</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
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
                            <a href="#"><i class="fa fa-users fa-fw"></i> Mon Compte<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                    <li>
                                    <a href="patient.php?id=<?php echo $id; ?>&&idc=<?php echo $_GET["idc"]; ?>">Dossier Médical</a>
                                </li>
                                <li>
                                    <a href="liste_patients.php?id=<?php echo $id; ?>&&idc=<?php echo $_GET["idc"]; ?>">Infos  </a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    
            
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Rendez-vous <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="liste_rdv.php?id=<?php echo $id; ?>&&idc=<?php echo $_GET["idc"]; ?>">Mes RDV</a>
                                </li>
                                <li>
                                    <a href="../index.php?id=<?php echo $id; ?>&&idc=<?php echo $_GET["idc"]; ?>">Fixer RDV</a>
                                </li>
                        
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                        
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
                    <h1 class="page-header" id="st">Bienvenue dans votre espace patient personnel </h1>
                </div>

                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row"></div>
          <!-- /.row -->   
            
            
            
           
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

</html>
