<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="regis.css"/>

    <title>Registration</title>
    
    
</head>
<body>

<div class="header">

<img  class="img-log" src="images/new-user.png" alt="new user icon">
<div class="h2">
<h3 CLASS="h3">REGISTRATION</h3>
</div>
</div>

<form action = "connect.php" method = "post" name = "myform" class = "form-group">
            <!-- Imported from -->
    
 <div class="wrapper">
    <div class="title">
      Register Now
    </div>
    <div class="form">
       <div class="inputfield">
          <label for="firstname">First Name</label>
          <input type="text" class="input" required id ="firstname"  name="FIRST_NAME">
       </div>
        <div class="inputfield">
          <label for="lastname">Last Name</label>
          <input type="text" class="input"  id="lastname"   name="LAST_NAME" required>
       </div>  

       <div class="inputfield">
        <label for="dateofbirth" >Date of Birth</label>
        <input type="date" class="input" id ="dateofbirth" name="dateofbirth" required>
       </div>
       <div class="inputfield">
          <label for="blood-select" >Blood Group</label>
          <div class="custom_select">
            <select name=" BLOOD_GROUPr" id="blood-select" required>
              <option value="">Select</option>
              <option value="A+">A+</option>
              <option value="A-">A-</option>
              <option value="B+">B+</option>
              <option value="B-">B-</option>
              <option value="AB+">AB+</option>
              <option value="AB-">AB-</option>
              <option value="O+">O+</option>
              <option value="O-">O-</option>
            </select>
          </div>
       </div> 
       <div class="inputfield">
          <label for="gender-select">Gender</label>
          <div class="custom_select" required> 
            <select name="Gender" id="gender-select" required>
              <option value="" >Select</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Other">Other</option>
            </select>
          </div>
       </div> 
       <div class="inputfield">
          <label  for="email">Email Address</label>
          <input type="email" class="input"  id ="email" name="EMAIL" required>
       </div> 
       <div class="inputfield">
          <label  for="password">Password</label>
          <input type="password" class="input" id ="password" name="PASS_WORD"  required>
       </div> 

      <div class="inputfield">
          <label for="confirm_password">Confirm Password</label>
          <input type="password" class="input" id ="confirm_password"  name="confirm_password" required>
       </div>

      <div class="inputfield">
          <label  for="phoneR">Phone Number</label>
          <input type="text" class="input" id ="phoneR"  name="phoneR" required>
       </div> 
       <div class="inputfield">
          <label for="ADD_RESSr">Address</label>
          <input type="text" class="input" id ="ADD_RESSr" name="ADD_RESSr"  required>
       </div> 
      <div class="inputfield">
          <label for="zipcode">Zip Code</label>
          <input type="text" class="input" id= "zipcode"  name="ZIP_CODE" required>
       </div> 
      <div class="inputfield terms">
          <label  for="checkbox" class="check">
            <input type="checkbox"  id= "checkbox"  required>
            <span class="checkmark"></span>
          </label>
          <p>Agreed to terms and conditions</p>
       </div> 
      <div class="inputfield">
        <input type="submit" value="Register" class="btn">
      </div>
      <p class="alter" >Already a Member? <a class= "register"  href="login.php"> Log in now! </a></p>
      
    </div> <!--class= alter-login -->
    
</div>


    </form>
    
    
</body>
</html>


