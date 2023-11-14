<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $dbuser = "ejemploPDO";
        $dbpasswd = "password";
        $mysqli = new mysqli('localhost', $dbuser, $dbpasswd, 'ejemploPDO');

        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }

        $sql = "SELECT * FROM users WHERE username ='$username' and password='$password'";

        /* Select queries return a result */
        if ($result = $mysqli->query($sql)) {
            while ($obj = $result->fetch_object()) {
                print("Hola " . $obj->username . "!!!");
            }
        } /* If the database returns an error, print it to screen */
        elseif ($mysqli->error) {
            print($mysqli->error);
        }
    }
?>
<form method="POST">
    <input placeholder="username" name="username"/>
    <input placeholder="password" name="password"/>
    <input type="submit" value="Entrar"/>
</form>

</body>
</html>