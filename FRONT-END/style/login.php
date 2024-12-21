<?php

    $dbhost = 'localhost';
    $dbname = 'itthinkk';
    $dbuser = 'root';
    $dbpass = 'root';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title>ITTHINK</title>
</head>
<body>

    <div class="container" id="container">
        <h1>LOG-IN</h1>
        <form class="log-in-form" action="">
            <label class="label" for="username-login">username</label>
                <input type="text" id="username-login" placeholder="username" name="username-login">
            

            <label class="label" for="password-login">password</label>
                <input type="password" id="password-login" placeholder="password" name="password-login">


            <button class="submit" id="log-in-submit" type="submit">log in</button>    
          
        </form>

        <span class="dont-have-account-text" >don't have an accont? <button id="dont-have-account" class="dont-have-account" >sign up here</button></span>

    </div>
    </body>
</html>