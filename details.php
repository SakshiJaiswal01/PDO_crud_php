<?php
include("connection.php");
// $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_NUM);
$sql = "select * from user_data";
$arr = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Table</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        .head{       
                background-color: lightgray;
            }
        .tbody{
                background: lightcyan;  
                font-size: large;      
            }
        .table{
                
                table-layout: auto;
                text-align: center;
                border: 3px;
                width: 70%;
                margin-top: 10%;
                margin-left: 13%;
            }
    </style>
</head>
<body class="bg-dark">
    <table border="1" class="table">
        <tr class="head">
            <td colspan="8">
                <h3><a href="index.php">ADD USER</a></h3>
            </td>
        </tr>
        <tr class="head">
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>MOBILE</th>
            <th>PASSWORD</th>
            <th>AGE</th>
            <th>GENDER</th>
            <th>ACTION</th>
        </tr>
        <?php
        $n = 1;
        while ($data = $arr->fetch()) {
        ?>
            <tr class="tbody">
                <td><?php echo $n; ?></td>
                <td><?php echo $data['Name']; ?></td>
                <td><?php echo $data['Email']; ?></td>
                <td><?php echo $data['Mobile']; ?></td>
                <td><?php echo $data['Password']; ?></td>
                <td><?php echo $data['Age']; ?></td>
                <td><?php echo $data['gender']; ?></td>
                <td>
                    <a href="Edit.php?con=<?php echo $data['ID']; ?>">EDIT</a>
                    <a href="delete.php?con=<?php echo $data['ID']; ?>">Delete</a>
                </td>
            </tr>
        <?php
            $n += 1;
        }
        ?>
    </table>
    </body>
</html>