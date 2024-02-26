<!-- File Created On 25-02-2024 9:16PM -->


<?php
include('../includes/connect.php');
include('../functions/common_function.php'); //02-02-2024 9:52PM
@session_start(); //25-02-2024 9:45PM //session creation //if particular page is active then only session will start
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* body{
                overflow: hidden;
            } */
    </style>

</head>

<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="row d-flex justify-content-center ">
            <div class="col-lg-6  col-xl-4">
                <img src="../Images/upi.webp" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4 ">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter Your Name"
                            required="required" class="form-control  ">
                    </div>

                 

                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter Your Password"
                            required="required" class="form-control  ">
                    </div>


                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_login" value="Login">
                        <p class="small fw-bold mt-2 pt-1" >Don't you have an account? <a href="admin_registration.php" class="link-danger">Register</p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php 
if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
    

    $select_query="Select * from `user_table` where username='$user_username'";
    $result=mysqli_query($con,$select_query);

    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
   

    if($row_count>0){
        $_SESSION['username'] =$user_username; //02-02-2024
        if(password_verify($user_password,$row_data['user_password'])){              //user_password as in database table
            echo "<script>alert('Login successfuly') </script>";
          
                
                 echo " <script>window.open('index.php','_self')</script> ";
            }
          
        }
        else{
            
                echo "<script>alert('Invalid credentials') </script>";
            
        }
      
    }
    else{
        echo "<script>alert('Invalid credentials') </script>";
    }




?>