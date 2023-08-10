<?php
session_start();
if (isset($_SESSION["user"])) {
    header("location: index.php");
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
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
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once "database.php"; // Assuming "database.php" contains the database connection code.

    $email = mysqli_real_escape_string($conn, $email); // Escape the email to prevent SQL injection.
    $password = mysqli_real_escape_string($conn, $password); // Escape the password to prevent SQL injection.

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        die("Error preparing the statement: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die("Error executing the query: " . mysqli_error($conn));
    }

    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if (password_verify($password, $user["password"])) {
            session_start();
            $_SESSION['user'] = 'yes';
            header("Location: index.php");
            exit();
        } else {
            echo "<div class='alert alert-danger'>Incorrect password</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Email not found</div>";
    }
}








?>
        <form action="login.php" method="post">
            <div class="form-group">
                <input type="email" placeholder="enter Email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="enter password" name="password" class="form-control">
            </div>
            <div class="form-btn">
                <input type="submit" value="login" name="login" class="btn btn-primary" >
            </div>
        </form>
        <div>
           <p>not registerd yet <a href="registration.php">register here</a> </p>
        </div>
    </div>

   
</body>
</html>