<!-- 1) CONNECT TO DATABASE -->
<!-- 2) CREATE QUERY -->
<!-- 3) INSERT QUERY -->

<?php

$popupVar = false;
// connection variable

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['age']) && isset($_POST['gender']))
{
$server = "localhost";
$username = "root";
$password = "";
// 1) CONNECT TO DATABASE ******************
$con = mysqli_connect($server,$username,$password);

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$desc = $_POST['desc'];

// 2) CREATE QUERY************************

// sql query that needs to be inserted
$sqlquery = "INSERT INTO `travel`.`tourist` (  `name`, `email`, `phone`, `age`, `gender`, `desc`) VALUES (  '$name', '$email', '$phone', '$age', '$gender', '$desc')";


// INSERT QUERY 
//write this to directly insert query:  $con->query($sqlquery);

if( $con->query($sqlquery) == false ){
    echo "ERROR" . $con_error;
}
else
{
    $popupVar = true;
}


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>project</title>
    <link rel="stylesheet" href="index.css">

    <link href="https://fonts.googleapis.com/css2?family=Prata&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Prata&family=Staatliches&display=swap" rel="stylesheet"> 
</head>
<body>
    <div class="container">
        <img src="d.jpg" alt="US travels" class="image">
        <form action="index.php" method="POST">
            <h1>Welcome To Global travels</h1>
            <p>Wish you a happy journey</p>
            <!-- Will run after the successfully insertion of query -->
            <?php
            if($popupVar == true ){
                echo "<p style='color: #1bff1b;' >Thanks For Joining.</p> ";
            }
            ?>
            <input type = "text" name="name" placeholder="Enter Name" class="in"><br>
            <input type = "email" name="email" placeholder="Enter Email" class="in"><br>
            <input type = "number" name="phone" placeholder="Enter Phone No." class="in"><br>
            <input type = "number" name="age" placeholder="Enter Age" class="in"><br>
         <div class="gen">    
            <label for = "gender" class="gender">Gender :</label>
            <input type = "radio" name="gender" class="gender"> Male
            <input type = "radio" name="gender" class="gender"> Female 
        </div>
           <br>
            <textarea name="desc" id="desc" cols="30" rows="8" placeholder="Enter any other information..." class="in"></textarea><br>
            <input type="submit" value="SUBMIT" class="submit">
        </form>

    </div>

</body>
</html>





 