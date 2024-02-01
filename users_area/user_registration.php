<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">



</head>

<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center"> <!--30-01-2024-->
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- User Name Field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter Your UserName"
                            autocomplete="off" required="required" name="user_username">
                    </div>

                    <!-- Email  Field -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Enter Your Email"
                            autocomplete="off" required="required" name="user_email">
                    </div>

                    <!-- Image  Field -->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">User Image</label>
                        <input type="file" id="user_image" class="form-control" required="required" name="user_image">
                    </div>

                    <!-- Password Field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter Your Password"
                            autocomplete="off" required="required" name="user_password">
                    </div>

                    <!--Confirm Password Field -->
                    <div class="form-outline mb-4">
                        <label for="conf_user_password" class="form-label">Confirm Password</label>
                        <input type="password" id="conf_user_password" class="form-control"
                            placeholder="Confirm Your Password" autocomplete="off" required="required"
                            name="conf_user_password">
                    </div>

                    <!-- Address Field -->
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Enter Your Address"
                            autocomplete="off" required="required" name="user_address">
                    </div>

                    <!-- Contact Field -->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" id="user_contact" class="form-control" placeholder="Enter Your Mobile Number"
                            autocomplete="off" required="required" name="user_contact">
                    </div>

                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ?<a href="user_login.php"
                                class="text-danger"> Login </a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>


<!-- 31-01-2024 -->
<!-- PHP code -->

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
    $user_ip = getIPAddress();

//select query

$select_query ="Select * from `user_table` where username='$user_username' or user_email='$user_email'"; //to check for user exists or not
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
   //insert  query
   move_uploaded_file( $user_image_tmp,"./user_images/$user_image" ); //31-01-2024 //8:31PM  //to insert images into database
   $insert_query = "insert into `user_table` (username,user_email,user_password,user_image,user_ip,user_address,user_mobile) values('$user_username','$user_email','$hash_password','$user_image','$user_ip',' $user_address','$user_contact')";
   $sql_execute=mysqli_query($con,$insert_query);
}
 


//Selecting cart items //01-02-2024

$select_cart_items="Select * from `cart_details` where ip_address='$user_ip'";
$result_cart=mysqli_query($con,$select_cart_items);
$rows_count=mysqli_num_rows($result_cart);



}
?>
