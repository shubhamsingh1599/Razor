<?php  
            require('connection.php');

            if (isset($_POST['name']) and isset($_POST['password'])){

            // Assigning POST values to variables.
            $username = $_POST['name'];
            $password = $_POST['password'];

            // CHECK FOR THE RECORD FROM TABLE
            $query = "SELECT * FROM `user_info` WHERE username='$username' and password='$password'";

            $result = mysqli_query($con, $query) or die(mysqli_error($con));
            $count = mysqli_num_rows($result);

            if ($count == 1){

            //echo "Login Credentials verified";
            echo "<script type='text/javascript'>alert('Login Successful');location.href='homepage.html';</script>";

            }else{
            echo "<script type='text/javascript'>alert('Invalid Login Credentials');location.href='signin.html';</script>";
            //echo "Invalid Login Credentials";
            }
            }
        ?>