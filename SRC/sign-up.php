<?php
    $name =$_POST['username-sign-up'];
    $password =$_POST['password-sign-up'];
    $email =$_POST['email-sign-up'];
    $phone =$_POST['phone-sign-up'];

try{
    $dbhost = 'localhost';
    $dbname = 'itthinkk';
    $dbuser = 'root';
    $dbpass = 'root';
    $connect = new pdo ("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "INSERT INTO users (username, password, email,phone) VALUES ('$name','$password', '$email' ,'$phone')";
    $connect->exec($query);
}catch(PDOException $e){
    echo $query . "<br>" . $e->getMessage();
}


?>