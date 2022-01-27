<?php 
include("connection.php");
$id=$_GET['con'];

if (isset($_POST['Edit']))
{
    $email=$_POST['Email'];
    $name=$_POST['Name'];
    $mob=$_POST['Mobile'];
    $pass=$_POST['Password'];
    $age=$_POST['Age'];
    $gender=$_POST['gender'];
   
    try
    {
    //  $nema="update user_data set Email=? ,Name=? , Password=? , Mobile=? , Age=? where ID=?";
    $nema="update user_data set Email=:email,Name=:name,Password=:pass,Mobile=:mob,Age=:age,gender=:gender where ID=:id";
     $arr= $conn->prepare($nema);
     $arr->bindParam(':email',$email);
     $arr->bindParam(':name',$name);
     $arr->bindParam(':pass',$pass);
     $arr->bindParam(':mob',$mob);
     $arr->bindParam(':age',$age);
     $arr->bindParam(':gender',$gender);
     $arr->bindParam(':id',$id);
     $arr->execute();
     header("location:details.php");
    }
    catch(PDOException $e)
    {
        // echo "sab soo gay bhaiya class band kro ab ";
        echo $e->getMessage();
    }  
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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
<div class="container" id="container">
    <div class="row mt-5">
        <div class="mt-5">
            <div class="border border-warning mt-5 bg-light">
                <div class="text-secondary display-4 text-center">Edit Details</div>
            <form method="POST" class=" row ml-4">
              <input type="email"  class="form-control col-5 m-2" placeholder="Email"name="Email">
              <input type="text"   class="form-control col-6 m-2" placeholder="Name" name="Name">
              <input type="Number" class="form-control col-5 m-2" placeholder="Mobile" name="Mobile">
              <input type="text"   class="form-control col-6 m-2" placeholder="PAssword" name="Password">
              <input type="number" class="form-control col-11 m-2" placeholder="Age" name="Age">
                 <div class="m-2">
                    <p>Select gender</p>
                    <input type="radio" name="gender" value="male">
                    <label>Male</label>
                    <input type="radio" name="gender" value="female">
                    <label>Female</label>
                    <input type="radio" name="gender" value="other">
                    <label>Other</label>
                </div>
                <input class="btn btn-success btn-block col-11 m-2" type="submit" class="m-auto col-12" value="Update Details" name="Edit">    
            </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>