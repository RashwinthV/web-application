<?php
    
    $user = $_REQUEST['EMAIL'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Requests For Organ</title>
    
</head>

<body>
<div style="font-family: 'Poppins', sans-serif; font-weight:400">
        <header class="sticky-top">
            <nav class="navbar navbar-expand-sm  justify-content-between" style="background-color: #212529;">
                <a href="logged_in.php?EMAIL=<?php echo $user?>"style="color:white;" >
                   Home
                </a>
                <a  class="navbar-brand" style="text-align:center; font-weight:700;color:White;">
                   ORGAN DONATION
                </a>
                <a class="btn btn-warning" style="text-align:center;color:white" href="index.php" role="button">Log out</a>

            </nav>
        </header>

        <div class="head">
            <div class="container">
                <div class="row text-center">
                    <div class="col-12 col-sm-6 col-lg-5 col-xl-4 m-auto">
                        <h3 class="text-left" style="font-size:30px;font-family: 'Poppins', sans-serif; font-weight:700; color:azure;">Donate Organ</h3>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-5 col-xl-4 m-auto pt-4 pt-sm-0">
                        <div class="su-inner-banner-img"><center><img alt="image" class="img-fluid" style="padding:10px;" src="images/donateee.jpg"></center></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner -->

        <section class="container-fluid">
            <section class="row jumbotron justify-content-center">
                <section class="col-l4 col-sm-6">
                    <?php
                    $qu1 = "SELECT * FROM registration WHERE EMAIL = '$user'";
                    $con = new mysqli('localhost', 'root', '', 'organdb');
                    $values = mysqli_query($con, $qu1);
                    $id = "";
                    while ($row = mysqli_fetch_assoc($values)) {
                        
                    }
                    if (isset($_POST['submit'])) {
                        $REGISTRATION_ID=$_POST['REGISTRATION_ID'];
                        $organ_typeD = $_POST['ORGAN_TYPEd'];
                        $bloodgroupD = $_POST['BLOOD_GROUPd'];
                        $quantityD = $_POST['QUANTITYd'];
                        $short_note = $_POST['short_note'];
                        $con = new mysqli('localhost', 'root', '', 'organdb');
                        $stmt = $con->prepare("INSERT INTO donation_record(REGISTRATION_ID,ORGAN_TYPEd,BLOOD_GROUPd,QUANTITYd,short_note)
                            values(?,?,?,?,?)");
                        $stmt->bind_param("issis", $REGISTRATION_ID,$organ_typeD,$bloodgroupD,$quantityD,$short_note);
                        $stmt->execute();
                        // echo "RECORD Succesfull";
                        $stmt->close();
                        $con->close();
                        
                        ?>
                        <div class="alert alert-success" role="alert">
                                            RECORD creation Succesfull
                                        </div>
                        <?php
                    }
                    ?>
                    <form action="" method="post" name="myform"><center>
                    <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label">Organ Type</label>
                            <div>
                                <select class="form-select" aria-label="Default select example" name="ORGAN_TYPEd">
                                    <option selected disabled>Select Group </option>
                                    <option value="Kidney">Kidney</option>
                                    <option value="Liver">Liver</option>
                                    <option value="Lungs">Lungs</option>
                                    <option value="Pancreas">Pancreas</option>
                                    <option value="Intestines">Intestines</option>
                                    <option value="Eye">Eye</option>
                                    <option value="Heart Valves">Heart Valves</option>
                                </select><br><br>
                            </div>
                </center>
                        <center>
                        <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label">Blood Group</label>
                            <div>
                                <select class="form-select" aria-label="Default select example" name="BLOOD_GROUPd">
                                    <option selected disabled> Select Group </option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select><br><br>
                            </div>

                        </div>
                        <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label">Quantity</label>
                            <div>
                                <select class="form-select" aria-label="Default select example" name="QUANTITYd">
                                    <option selected disabled> Select Quantity</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                  
                                </select><br><br>
                            </div>
                        </div>
                </div>
                        
                        </div>
                        <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Submit</button><br><br>
                    </form>
                </section>
            </section>
            <div></center>
                <h3 class="font-weight-bolder text-center">My History</h3>
                <table class="table my-3">
                    <thead class="thead-dark">
                      
                        <th>Organ Type</th>
                        <th>Blood Group</th>
                        <th>Quantity</th>
                        <th>Note</th>
                    </thead>

                        <?php
                        $con = new mysqli('localhost', 'root', '', 'organdb');
                        $qu2 = "SELECT * FROM donation_record ";
                        $val = mysqli_query($con, $qu2);
                        while ($row = mysqli_fetch_assoc($val)) {
                           
                            $organ_typed= $row ['ORGAN_TYPEd'];
                            $grp = $row['BLOOD_GROUPd'];
                            $quan = $row['QUANTITYd'];
                            $note = $row['short_note'];
                        ?>
                    <tbody>
                        <tr>
                           
                            <td><?php echo $organ_typed;?></td>
                            <td><?php echo $grp;?></td>
                            <td><?php echo $quan;?></td>
                            <td><?php echo $note;?></td>
                        </tr>
                    </tbody>
                <?php

                        }
                ?>
                
                </table>
          </div>
    </div>
    <script src="js/bootstrap.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>

</html>

<style>
    .head{
        background-color: #fcc358;
    }
</style>