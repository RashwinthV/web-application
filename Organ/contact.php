<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us</title>
    <link rel="icon" type="image/x-icon" href="Images/contact-us.png">
    <link rel="stylesheet" href="con.php" />
  </head>
  <body bgcolor="lightgray">
   

    <section class="section section-contact section--hidden">
      <div class="container">
        <h2 class="common-heading">Contact Us</h2>
      </div>

      <div class="contain">
        <form action="conn.php" method="POST">
          <div class="grid grid-two-col">
            <input type="text" name="name" id="name"  placeholder="Name"  required  /><br><br>
            <input
              type="email"
              name="email"
              id="email"
              required
              placeholder="Email"
              autocomplete="false"
            /><br><br>
          </div>
          <div>
            <input type="text" name="subject" id="subject"placeholder="Subject" /><br><br>
          </div>
          <div>
            <textarea name="message" id="message" placeholder="Message"></textarea><br><br>
          </div>

          <div>
          <input type="submit" id="submit" name="submit"/>
          </div>
        </form>
      </div>
      <style>
.contain{
  text-align:"center";

}
        </style>
    </section>

     <!-- ======================================== 
          Our footer Section   
    ========================================  -->
     <footer class="section section-footer section--hidden">
      <div class="container grid grid-four-col">
        <div class="f-about">
          <h3>About</h3>
          <p>The main aim of creating a blood organ donation management system is to streamline the process of managing blood and organ 
            donations, ensuring efficient coordination among donors, recipients, and healthcare organizations, ultimately leading to 
            more successful donations and improved patient outcomes.
          </p>
        </div>

        <div class="f-links">
          <h3>Links</h3>
          <ul>
            <li>
              <span><ion-icon name="arrow-forward-outline"></ion-icon></span
              ><a href="index.php">Home</a>
            </li>
            <li>
              <span><ion-icon name="arrow-forward-outline"></ion-icon></span
              ><a href="#">Services</a>
            </li>
           
            <li>
              <span><ion-icon name="arrow-forward-outline"></ion-icon></span
              ><a href="about.php">About</a>
            </li>
          </ul>
        </div>

        <div class="f-services">
          <h3>FAQ's</h3>
          <ul>
            <li>
              <span><ion-icon name="arrow-forward-outline"></ion-icon></span
              ><a href="FAQ.php"> Who can become a donor?</a>
            </li>
            <li>
              <span><ion-icon name="arrow-forward-outline"></ion-icon></span
              ><a href="FAQ.php"> Will donation change the appearance of my body?</a>
            </li>
            <li>
              <span><ion-icon name="arrow-forward-outline"></ion-icon></span
              ><a href="FAQ.php"> Who is responsible for the cost of the transplant surgery?</a>
            </li>

            <li>
              <span><ion-icon name="arrow-forward-outline"></ion-icon></span
              ><a href="FAQ.php"> Will my decision to become an organ and tissue donor affect the quality of my medical care?</a>
            </li>
            <li>
              <span><ion-icon name="arrow-forward-outline"></ion-icon></span
              ><a href="FAQ.php">Does my religion approve of donation?</a>
            </li>
            <li>
              <span><ion-icon name="arrow-forward-outline"></ion-icon></span
              ><a href="FAQ.php">Is there any risk in donating organ?</a>
            </li>
          </ul>
        </div>

        <div class="f-address">
          <h3>Have a Questions?</h3>
            <div>
              <p>
                <span><ion-icon name="mail-outline"></ion-icon></span>
                sample.mail@mail.com
              </p>
            </div>
          </address>
        </div>
      </div>

      <div class="container">
        <div class="f-social-icons">
          <a href="">
            <ion-icon class="icons" name="logo-linkedin"></ion-icon>
          </a>

          
            <ion-icon class="icons" name="logo-twitter"></ion-icon>
          </a>

          <a href="#">
            <ion-icon class="icons" name="logo-instagram"></ion-icon>
          </a>

          <a href="">
            <ion-icon class="icons" name="logo-youtube"></ion-icon>
          </a>
        </div>

       
    </footer>
  
      <!-- ======================================== 
            Our JavaScript Section   
      ========================================  -->
      <script
        type="module"
        src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
      ></script>
      <script
        nomodule
        src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
      ></script>
      <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
      <script src="beyond-life.js"></script>
    </body>
  </html>
  