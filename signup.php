<?php

    require 'connection/_dbconnect.php';

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Sign Up</title>
  </head>
  <body>
    <?php
        require 'partials/_nav.php';
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $name = $_POST['name'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
            $showAlert = false;

            if(empty($name) || empty($username) || empty($email) || empty($password) || empty($cpassword)){
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Error!</strong> Please Fill all the fields.
                        <button type='button'  class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
            }
            else{
                $existUname = "SELECT * FROM `users` WHERE `username`='$username'";
                $result = mysqli_query($conn, $existUname);
                $num = mysqli_num_rows($result);
                if($num > 0){
                    $showAlert = "Username already exist.";
                }
                else{
                    $existEmail = "SELECT * FROM `users` WHERE `email`='$email'";
                    $result = mysqli_query($conn, $existEmail);
                    $num = mysqli_num_rows($result);
                    if($num > 0){
                        $showAlert = "Email already exist.";
                    }
                    else{
                        if($password!=$cpassword){
                            $showAlert = "Password Not matched.";
                        }
                        else{
                            $hash = password_hash($password, PASSWORD_DEFAULT);
                            $sql = "INSERT INTO `users` (`name`, `username`, `email`, `password`, `time`) VALUES ('$name', '$username', '$email', '$hash', current_timestamp())";
                            $result = mysqli_query($conn, $sql);
                            if($result){
                                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                    <strong>Success!</strong> Your account created Successfully.
                                    <button type='button'  class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                            }
                        }
                    }
                }


                
            }

            if($showAlert){
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Error!</strong> ".$showAlert."
                        <button type='button'  class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
            }
        }
    
    ?>

    <div class="container col-md-5 align-items-center" >
        <form action="signup.php" method="POST">
            <h1 align="center">Sign Up</h1>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" maxlength="20" class="form-control" name="name" id="name" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" maxlength="11" minlength="5" class="form-control" name="username" id="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" maxlength="50" minlength="6" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" maxlength="15" minlength="5" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" maxlength="15" class="form-control" id="cpassword" name="cpassword">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>





    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>