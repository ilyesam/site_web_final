
<?php

 require_once('../Connections/conn.php');   ///////////connection bdd 




 ///////////////redirection 
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
</body>
</html>
<?php  session_start(); ?>
<?php
unset($_SESSION['login']);

  $insertSQL = "  UPDATE `connecter` SET `etat` = '0' WHERE `connecter`.`idc` like  ".$_GET["idc"];  //////// fermer session 
  $res = $pdo->prepare($insertSQL);
  $exec = $res->execute();
   

Redirect($Str_Location = "../index.php", $Bln_Replace = 1, $Int_HRC = NULL); ///////////redirection 

?>