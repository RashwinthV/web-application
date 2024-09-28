<?php require_once('../Connections/Connection.php'); ?>
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "StudentsEdit")) {
  $updateSQL = sprintf("UPDATE students SET stuname=%s, stugender=%s, studob=%s, stucourse=%s, stuyear=%s, studepartment=%s WHERE sturegno=%s",
                       GetSQLValueString($_POST['stuname'], "text"),
                       GetSQLValueString($_POST['stugender'], "text"),
                       GetSQLValueString($_POST['studob'], "date"),
                       GetSQLValueString($_POST['stucourse'], "text"),
                       GetSQLValueString($_POST['stuyear'], "text"),
                       GetSQLValueString($_POST['studepartment'], "text"),
                       GetSQLValueString($_POST['sturegno'], "text"));

  mysql_select_db($database_Connection, $Connection);
  $Result1 = mysql_query($updateSQL, $Connection) or die(mysql_error());

  $updateGoTo = "students_view.php";

  header(sprintf("Location: %s", $updateGoTo));
}

$colname_RsSelectStudents = "-1";
if (isset($_GET['id'])) {
  $colname_RsSelectStudents = $_GET['id'];
}
mysql_select_db($database_Connection, $Connection);
$query_RsSelectStudents = sprintf("SELECT * FROM students WHERE sturegno = %s", GetSQLValueString($colname_RsSelectStudents, "text"));
$RsSelectStudents = mysql_query($query_RsSelectStudents, $Connection) or die(mysql_error());
$row_RsSelectStudents = mysql_fetch_assoc($RsSelectStudents);
$totalRows_RsSelectStudents = mysql_num_rows($RsSelectStudents);
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
                <h4 class="header-line">Students</h4>
                
                            </div>

        </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
               <div class="panel panel-info">
                        <div class="panel-heading">
                           Student Edit
                        </div>
                        <div class="panel-body">
                            <form name="StudentsEdit" action="<?php echo $editFormAction; ?>" method="POST" role="form">
                                        <div class="form-group">
                                            <label>Register Number</label>
                                            <input name="sturegno" type="text" autofocus required class="form-control" id="sturegno" value="<?php echo $row_RsSelectStudents['sturegno']; ?>" readonly />
                                        </div>
                              <div class="form-group">
                                <label>Name</label>
                                  <input name="stuname" type="text" required class="form-control" id="stuname" value="<?php echo $row_RsSelectStudents['stuname']; ?>" />
                                </div>
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select name="stugender" class="form-control" required>
                                              <option value="" <?php if (!(strcmp("", $row_RsSelectStudents['stugender']))) {echo "selected=\"selected\"";} ?>>=== Select ===</option>
                                              <option value="Male" <?php if (!(strcmp("Male", $row_RsSelectStudents['stugender']))) {echo "selected=\"selected\"";} ?>>Male</option>
                                              <option value="Female" <?php if (!(strcmp("Female", $row_RsSelectStudents['stugender']))) {echo "selected=\"selected\"";} ?>>Female</option>
                                            </select>
                                        </div>
                              <div class="form-group">
                                <label>DOB</label>
                                  <input name="studob" type="date" value="<?php echo $row_RsSelectStudents['studob']; ?>" required class="form-control" id="studob" />
                                </div>
                              <div class="form-group">
                                <label>Course</label>
                                  <input name="stucourse" type="text" required class="form-control" id="stucourse" value="<?php echo $row_RsSelectStudents['stucourse']; ?>" />
                                </div>
                              <div class="form-group">
                                <label>Year</label>
                                <input name="stuyear" type="text" required class="form-control" id="stuyear" value="<?php echo $row_RsSelectStudents['stuyear']; ?>" />
                                </div>
                                <div class="form-group">
                                <label>Department</label>
                                <select name="studepartment" class="form-control" id="studepartment" required>
                                              <option value=""<?php if (!(strcmp("", $row_RsSelectStudents['studepartment']))) {echo "selected=\"selected\"";} ?>>=== Select ===</option>
                                              <option value="Computer Science" <?php if (!(strcmp("Computer Science", $row_RsSelectStudents['studepartment']))) {echo "selected=\"selected\"";} ?>>Computer Science</option>
                                              <option value="Information Technology" <?php if (!(strcmp("Information Technology", $row_RsSelectStudents['studepartment']))) {echo "selected=\"selected\"";} ?>>Information Technology</option>
                                              <option value="Computer Applications" <?php if (!(strcmp("Computer Applications", $row_RsSelectStudents['studepartment']))) {echo "selected=\"selected\"";} ?>>Computer Applications</option>
                                              <option value="Commerce" <?php if (!(strcmp("Commerce", $row_RsSelectStudents['studepartment']))) {echo "selected=\"selected\"";} ?>>Commerce</option>
                                              <option value="Business Administration" <?php if (!(strcmp("Business Administration", $row_RsSelectStudents['studepartment']))) {echo "selected=\"selected\"";} ?>>Business Administration</option>
                                              <option value="English" <?php if (!(strcmp("English", $row_RsSelectStudents['studepartment']))) {echo "selected=\"selected\"";} ?>>English</option>

                                            </select>
                                </div>
                                
                              <button type="submit" name="submit" id="submit" class="btn btn-info">Update </button>
                              <input type="hidden" name="MM_update" value="StudentsEdit">

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
<?php
mysql_free_result($RsSelectStudents);
?>
