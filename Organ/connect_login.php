<?php
$EMAIL = $_POST['EMAIL'];
$x = $_POST['PASS_WORD'];

$con = new mysqli('localhost', 'root', '', 'organdb');
if ($EMAIL == "admin@gmail" && $x == "admin") {
    header("location:dashboard.php");
} 
else if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM registration WHERE EMAIL = '$EMAIL' AND PASS_WORD = '$x'")) > 0)
{ 
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Organ Donation Sytem</title>
  <!-- Icon needed -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="logged.css">
</head>

<body>

<header class="sticky-top" Height="200px;">
            <nav class="navbar navbar-expand-sm  justify-content-between" style="background-color: #fcc358;">
            <div class="brand">
 <h3 style="font-family:algerian ;font-weight:700; color:black ;">Organ Donation</h3>
</div>
   <div class="navigation">              
      <div class="navigation-items">
        <a href="# "style="font-weight:700; color:blue;">Home</a>
        <a href="#"style="font-weight:700; color:blue;">Our Vision</a>
        <a href="available_to_donate.php?EMAIL=<?php echo $EMAIL?>"style="font-weight:700; color:blue;">Donate Organ</a>
        <a href="FAQ.php"style="font-weight:700; color:blue;">FAQ's</a>
        <a href="contact.php"style="font-weight:700; color:blue;">Contact</a>
      </div>
    </div>                                   
   
  </header>


  <section class="home" >
  
    

    <div class="content active">
      <marquee> <h1 style="color: black">Welcome! <br>Feel Free to Donate</h1></marquee>
     
      <center> <img src="images/organ-donation.jpg" alt="organ" width="50%";/></center>
       <div class="center">
          <div class="btn-1">
            <a href="index.php"><span>Log Out</span></a>
          </div>
       </div>

    </div>
   
  
 
  
    </section>


<section>

    <section class="container">
      <div class="card">
        <div class="card-image card-1"> </div>  
        
        <div class="card-text card_1">
        
          <h2>Request for Organ</h2>
          <div class="value"><a href="organ_requests.php?EMAIL=<?php echo $EMAIL?> ">Request</a></div>


        </div>
      </div>
      <div class="card">
        <div class="card-image card-2"></div>
         <div class="card-text card_2">
          <h2>Donate A Organ</h2>
          <div class="value"><a href="available_to_donate.php?EMAIL=<?php echo $EMAIL?> ">Donate</a></div>
         </div>
        </div>
      </div>

      
      <div class="card">
        <div class="card-image card-3"></div>
         <div class="card-text card_3">
          <h2>Donation Record</h2>
          <div class="value"><a href="donation_record.php?EMAIL=<?php echo $EMAIL?>  ">Record</a></div>
         </div>
        </div>
      </div>
      
</section>
<div class="media-icons">
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
    </div>




  </section>

</body>

</html>

<?php
}
else {
  
echo "Email or Password Is Not Found";

}
?>
