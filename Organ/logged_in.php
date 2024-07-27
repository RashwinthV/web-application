<?php
    $EMAIL = $_REQUEST['EMAIL'];
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
  <link rel="stylesheet" href="css/loggedin.css">
    
</head>

<body  img src="index.jpg" alt= "image">

  <header>
    
   <a href="" class="brand">Organ Donation</a>
                                          
      <div class="navigation-items">
        <a href="index.php">Home</a>
        <a href="#">Our Vision</a>
        <a href="available_to_donate.php?EMAIL=<?php echo $EMAIL?>">Donate Organ</a>
        <a href="FAQ.php">FAQ's</a>
        <a href="contact.php">Contact</a>
      </div>
    
  </header>

  <section class="home" >
  
    <video class="video-slide active" src="Organ Main.mp4" autoplay muted loop></video>

    <div class="content active">
       <h1 style="color: black">Welcome! <br>Feel Free to Donate</h1>
         
       <div class="center">
          <div class="btn-1">
            <a href="index.php"><span>Log Out</span></a>
          </div>
       </div>

    </div>
   
    <div class="media-icons">
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
    </div>

  <style>
  /*Login And Sign Up Button Style Start*/
 
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
       <!-- card 2 starts -->

      <div class="card">
        <div class="card-image card-2"></div>
         <div class="card-text card_2">
          <h2>Donate A Organ</h2>
          <div class="value"><a href="available_to_donate.php?EMAIL=<?php echo $EMAIL?>  ">Donate</a></div>
         </div>
        </div>
      </div>

      <!-- card  3 starts-->
      
      <div class="card">
        <div class="card-image card-3"></div>
         <div class="card-text card_3">
          <h2>Donation Record</h2>
          <div class="value"><a href="donation_record.php?EMAIL=<?php echo $EMAIL?>  ">Record</a></div>
         </div>
        </div>
      </div>
</section>


  </section>

</body>

</html>