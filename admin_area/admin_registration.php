<!-- File Created On 25-02-2024 8:03PM -->

<?php

//<!--  25-02-2024 9:38PM -->
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
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
        <h2 class="text-center mb-5">Admin Registration</h2>
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
                        <label for="email" class="form-label">UserEmail</label>
                        <input type="email" id="email" name="email" placeholder="Enter  Your Email" required="required"
                            class="form-control  ">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter Your Password"
                            required="required" class="form-control  ">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Your Password"
                            required="required" class="form-control  ">
                    </div>

                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_registration" value="Register">
                        <p class="small fw-bold mt-2 pt-1" >Do  you already have an account? <a href="admin_login.php" class="link-danger">Login</p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>


<?php

if (isset($_POST['user_register'])) {
    //Initializing variables
    $user_username = $_POST['user_username'];  //should be matches with name value
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);  //Password hashing //storing of hashed password instead of real password in database //1-02-2024 //8:30PM
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];          //Important for accessing images 31-01-2024
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
 

//select query

$select_query ="Select * from `admin_table` where username='$user_username' or user_email='$user_email'"; //to check for user exists or not
$result=mysqli_query($con,$select_query );
$rows_count=mysqli_num_rows($result); //31-01-2024 9:26PM

//Condition to check if the user exists or not,if user exists display message as user exists ,if the user doesnot exist allow user for registration
if($rows_count> 0){
    echo "<script>alert('Username and Email already exists ')</script>";
}

else if($user_password != $conf_user_password){ //to check password and confirm password should match
    echo "<script>alert('Passwords do not match ')</script>";

}

else{
    $insert_query = "insert into `user_table` (username,user_email,user_password,user_image,user_ip,user_address,user_mobile) values('$user_username','$user_email','$hash_password','$user_image','$user_ip',' $user_address','$user_contact')";
    $sql_execute=mysqli_query($con,$insert_query);
 }
}
 ?>