<?php
include("connection.php");

if (isset($_POST['submit'])) {
    $email = $_POST['Email'];
    $name = $_POST['Name'];
    $mob = $_POST['Mobile'];
    $pass = $_POST['Password'];
    $age = $_POST['Age'];
    $gender = $_POST['gender'];

    // //Name Parameter 
    // $nema="insert into user_data (Email,Name,Password,Mobile,Age) values(:email,:name,:pass,:mob,:age)";
    // $arr= $conn->prepare($nema);
    // $arr->bindParam(':email',$email);
    // $arr->bindParam(':name',$name);
    // $arr->bindParam(':pass',$pass);
    // $arr->bindParam(':mob',$mob);
    // $arr->bindParam(':age',$age);
    // $arr->execute();

    //  value Parameter 
    try {
        $nema = "insert into user_data (Email,Name,Password,Mobile,Age,gender) values(?,?,?,?,?,?)";
        $arr = $conn->prepare($nema);
        $arr->bindParam(1, $email);
        $arr->bindParam(2, $name);
        $arr->bindParam(3, $pass);
        $arr->bindParam(4, $mob);
        $arr->bindParam(5, $age);
        $arr->bindParam(6, $gender);
        $arr->execute();
        header("location:details.php");
    } catch (PDOException $e) {
        $errMsg = "Already Exist";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        #container {
            width: 60%;
            margin-left: 20%;
        }
    </style>
</head>


<body class="bg-dark">
    <?php
    if (!empty($errMsg)) {
    ?>
        <div class="alert alert-danger m-1"><?php echo $errMsg; ?></div>
    <?php
    }
    ?>
    <div class="container" id="container">
        <div class="row mt-5">
            <div class="mt-5">
                <div class="border border-warning mt-5 bg-light">
                    <div class="text-secondary display-4 text-center">ADD USERS</div>
                    <form method="POST" class="row ml-4">
                        <input type="email" class="form-control col-5 m-2" placeholder="Enter Email" name="Email">
                        <input type="text" class="form-control col-6 m-2" placeholder="Enter Name" name="Name">
                        <input type="Number" class="form-control col-5 m-2" placeholder="Enter Mobile" name="Mobile">
                        <input type="text" class="form-control col-6 m-2" placeholder="Enter Password" name="Password">
                        <input type="number" class="form-control col-11 m-2" placeholder="Enter Age" name="Age">
                        <div class=" m-2">
                            <p>Select gender</p>
                              <input type="radio" name="gender" value="male">
                              <label>Male</label>
                              <input type="radio" name="gender" value="female">
                              <label>Female</label>
                              <input type="radio" name="gender" value="other">
                              <label>Other</label>
                        </div>
                        <input class="btn btn-success btn-block col-11 m-2" type="submit" class="m-auto col-12" value="ADD USER" name="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>