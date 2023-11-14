<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (is_string($username) && is_string($password)) {
        try { // Check connection before executing the SQL query
            $dbuser = "ejemploPDO";
            $dbpasswd = "password";
            $dbh = new PDO('mysql:host=localhost;dbname=ejemploPDO', $dbuser, $dbpasswd);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // $q = "SELECT * FROM users WHERE username = :username AND password = :password";
            $stmt = $dbh->prepare('SELECT username FROM users WHERE username = :username and password = :password');
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();

            if ($result != false){
                print(htmlspecialchars("Hola " . $result['username']));
                $dbh = null;
            }
            else{
                http_response_code(500);
                die('Error establishing connection with database');
            }

        } catch (PDOException $e) {
            error_log('PDOException - ' . $e->getMessage(), 0);
            http_response_code(500);
            die('Error establishing connection with database');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input placeholder="username" name="username" type="text"/>
    <input placeholder="password" name="password" type="password"/>
    <input type="submit" value="Entrar"/>
</form>

</body>
</html>