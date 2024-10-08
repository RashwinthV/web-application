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

mysql_select_db($database_Connection, $Connection);
$query_RsSelectCandidate = "SELECT * FROM candidate ORDER BY cansno DESC";
$RsSelectCandidate = mysql_query($query_RsSelectCandidate, $Connection) or die(mysql_error());
$row_RsSelectCandidate = mysql_fetch_assoc($RsSelectCandidate);
$totalRows_RsSelectCandidate = mysql_num_rows($RsSelectCandidate);
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
                <h4 class="header-line">Candidate</h4>
                
                            </div>

        </div>
        
        <div class="row">
                <div class="col-md-12">
                     <!--  Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Candidate View
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Election</th>
                                            <th>Register Number</th>
                                            <th>Post</th>
                                            <th width="10%">Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
										do { 
										
$colname_RsSelectElection = "-1";
if (isset($row_RsSelectCandidate['elesno'])) {
  $colname_RsSelectElection = $row_RsSelectCandidate['elesno'];
}
mysql_select_db($database_Connection, $Connection);
$query_RsSelectElection = sprintf("SELECT * FROM election WHERE elesno = %s", GetSQLValueString($colname_RsSelectElection, "int"));
$RsSelectElection = mysql_query($query_RsSelectElection, $Connection) or die(mysql_error());
$row_RsSelectElection = mysql_fetch_assoc($RsSelectElection);
$totalRows_RsSelectElection = mysql_num_rows($RsSelectElection);
										?>
                                        <tr>
                                            <td><?php echo $row_RsSelectElection['elename']; ?></td>
                                      <td><?php echo $row_RsSelectCandidate['sturegno']; ?></td>
                                      <td><?php echo $row_RsSelectCandidate['canpost']; ?></td>
                                            <td><a href="candidate_edit.php?id=<?php echo $row_RsSelectCandidate['cansno']; ?>">Edit</a> | <a href="candidate_delete.php?id=<?php echo $row_RsSelectCandidate['cansno']; ?>" onclick="return confirm('Are you sure you want to delete?');">Delete</a></td>
                                        </tr>
                                        <?php } while ($row_RsSelectCandidate = mysql_fetch_assoc($RsSelectCandidate)); ?>
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                    <!-- End  Table  -->
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
<?php
mysql_free_result($RsSelectCandidate);

mysql_free_result($RsSelectElection);
?>
