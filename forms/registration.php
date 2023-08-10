<?php


session_start();
if (isset($_SESSION["user"])) {
    header("location: login.php");
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../forms/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
</head>
<style>
 .container{
    padding: 20px;
    max-width: 600px;
    margin: auto;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);

}
.alert{
    margin: 30px;
    padding: 20px;
    border-radius: 50px;
    text-align:center ;
    justify-content: center;
    
    }

body{
    padding: 50px;
    
}
.form-group{
    margin-bottom: 20px;
} 
</style>
<body>
    <div class="container">
        <?php
        if (isset($_POST['submit'])) {
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordrepeat = $_POST['repeat_password'];

            $passwordhash = password_hash($password,PASSWORD_DEFAULT);


            $errors = array();

            if (empty($fullname) OR empty($email)OR empty($password) OR empty($passwordrepeat)) {
                array_push($errors,"All fields are requred");

            } 
            if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                array_push($errors,"email is not valid");
            }
            if (strlen($password)<8) {
                array_push($errors,"password must be at least 8 chacraters long ");
            }
            if ($password!==$passwordrepeat) {
                array_push($errors,"password does  not macth");
                
            }


        
require_once "database.php"; // Assuming "database.php" contains the database connection code.

$email = mysqli_real_escape_string($conn, $email); // Escape the email to prevent SQL injection.

$sql = "SELECT * FROM users WHERE email = '$email'"; // Add single quotes around the email value in the SQL query.
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error executing the query: " . mysqli_error($conn));
}

$rowcount = mysqli_num_rows($result);

if ($rowcount > 0) {
    array_push($errors, 'email already exists');
    // You may handle the error message based on your needs. This example uses an array to store error messages.
}

// ... Rest of your code ...


            // require_once "database.php";
            // $sql ="SELECT *FROM users WHERE email = $email";
            // $result = mysqli_query($conn,$sql);
            // $rowcount = mysqli_num_rows($result);
            // if ($rowcount >0) {
            //     array_push($errors,'email already exit');
                
            // }


            if (count($errors)> 0) {
                foreach ($errors as $errors) { 
                    echo "<div class='alert alert-danger'>$errors</div>";
                }
                    
                }else {
            
                
                    require_once "database.php";
                    $sql = "INSERT INTO users (full_name, email, password) VALUES(?, ?, ?)";
                     $stmt = mysqli_stmt_init($conn);
                    $preparestmt = mysqli_stmt_prepare($stmt,$sql);
                   if ($preparestmt) {
                       mysqli_stmt_bind_param($stmt,  'sss', $fullname, $email, $passwordhash);
                        mysqli_stmt_execute($stmt);
                        echo " <div class ='alert alert-success'> you are resgister  succesfuly</div>";
                     }else {
                        die("something went wrong");
                     }

             }
            
                
        }
        
        ?>
        <form action="registration.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="fullname" placeholder="full name">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="repeat password">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary"value="register" name="submit" >
            </div>
        </form>
        <div> <p>already registerd  <a href="login.php">login here</a> </p></div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>