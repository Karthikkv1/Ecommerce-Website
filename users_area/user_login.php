<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <style>
            body{
                overflow-x:hidden;  /*To avoid horizontal scrollbar 02-02-2024 8:13PM */
            }
        </style>



</head>

<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5"> <!--30-01-2024-->
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" >
                    <!-- User Name Field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter Your UserName"
                            autocomplete="off" required="required" name="user_username">
                    </div>




                    <!-- Password Field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter Your Password"
                            autocomplete="off" required="required" name="user_password">
                    </div>



                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="user_login">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Dont have an account ? <a href="user_registration.php"
                                class="text-danger"> Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<!-- //2-02-2024 //8:02PM // Login validation-->

<?php 
if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
    

    $select_query="Select * from `user_table` where username='$user_username'";
    $result=mysqli_query($con,$select_query);

    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);

    if($row_count>0){
        if(password_verify($user_password,$row_data['user_password'])){              //user_password as in database table

        }
        else{
            echo "<script>alert('Invalid credentials') </script>";
        }

    }
    else{
        echo "<script>alert('Invalid credentials') </script>";
    }



}
?>