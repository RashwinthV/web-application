﻿<?php require_once('../Connections/Connection.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "login.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "ElectionAdd")) {
  $insertSQL = sprintf("INSERT INTO election (elename, eledate, elestarttime, eleendtime) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['elename'], "text"),
                       GetSQLValueString($_POST['eledate'], "date"),
                       GetSQLValueString($_POST['elestarttime'], "date"),
                       GetSQLValueString($_POST['eleendtime'], "date"));

  mysql_select_db($database_Connection, $Connection);
  $Result1 = mysql_query($insertSQL, $Connection) or die(mysql_error());

  $insertGoTo = "election_view.php";

  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Admin Control Panel</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <?php require_once('header_top.php'); ?>
    <section class="menu-section">
        <div class="container">
            <?php require_once('menu.php'); ?>
        </div>
    </section>
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Election</h4>
                
                            </div>

        </div>
        
        
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
               <div class="panel panel-info">
                        <div class="panel-heading">
                           Election Add
                        </div>
                        <div class="panel-body">
                            <form action="<?php echo $editFormAction; ?>" name="ElectionAdd" method="POST" role="form">
                                        <div class="form-group">
                                            <label>Election Name</label>
                                            <input name="elename" type="text" autofocus required class="form-control" id="elename" />
                                        </div>
                       		  <div class="form-group">
                                            <label>Date</label>
                                  <input name="eledate" type="date" required class="form-control" id="eledate" />
                                </div> 
                                        <div class="form-group">
                                          <label>Start Time</label>
                                            <input name="elestarttime" type="time" required class="form-control" id="elestarttime" />
                                        </div>
                              <div class="form-group">
                                <label>End Time</label>
                                  <input name="eleendtime" type="time" required class="form-control" id="eleendtime" />
                                </div>
                                        <button type="submit" name="submit" id="submit" class="btn btn-info">Add </button>
                                        <input type="hidden" name="MM_insert" value="ElectionAdd">

                                    </form>
                 </div>
                  </div>
                            </div>

            </div>
    </div>
    </div>
    <section class="footer-section">
        <div class="container">
            <?php require_once('footer_copyright.php'); ?>
        </div>
    </section>
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/custom.js"></script>
</body>
</html>
