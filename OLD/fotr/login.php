
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Friends of the River</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/foundation.css">
</head>
<body>
<?php
    require ('db.php');
    session_start();
    //If form submitted, insert values into the database.
    if(isset($_POST['username'])){
        $username = stripcslashes($_REQUEST['username']); //remove backslashes
        $username = $conn->real_escape_string($username); //escapes special characters in string
        $password = stripcslashes($_REQUEST['password']);
        $password = $conn->real_escape_string($password);

        //Check if user exists in db
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'"; //pw hashing, change to more secure later
        $result = $conn->query($query) or die($conn->connect_error);
        $rows = $result->num_rows;
        if($rows==1){
            $_SESSION['username']=$username;
            header('Location: index.php');//Redirect to index
        } else {
            echo "<div class='form'><h3>Username/passord is incorrect.</h3><br>Click here to <a href='login.php'>Login</a></div>";
        }
    } else {
        ?>
        <div class="grid-x medium-grid-frame">
            <div class="large-5 medium-4 small-3"></div>
            <div class="login large-2 medium-4 small-6">
                <h1>Log In</h1>
                <form action="" method="post" name="login" class="login-form">
                    <input type="text" name="username" placeholder="Username" required/>
                    <input type="password" name="password" placeholder="Password" required/>
                    <input class="button" name="submit" type="submit" value="Login"/>
                </form>
                <p>username: admin</p>
                <p>password: password</p>
            </div>
            <div class="large-5 medium-4 small-3"></div>
        </div>

<?php
    }
?>

</body>
</html>