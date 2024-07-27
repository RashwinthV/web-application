<?php
 if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["submit"])){
    $con=mysqli_connect('localhost','root','','organdb');
    if(isset($_POST['name'])
    && isset($_POST['email'])
    && isset($_POST['subject'])
    && isset($_POST['message']));
    
    $name=$_POST['name'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];
    
    
    $sql="INSERT INTO problem (name,email,subject,message)
    VALUES('$name','$email','$subject','$message')";

    $query=mysqli_query($con,$sql);

    if($query)
    {
      echo'successful';
    }
    else{
       echo'failure';
    }
 }