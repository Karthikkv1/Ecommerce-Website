<!-- Including connect.php file using php syntax -->

<?php
include('../includes/connect.php');          //20-01-2024
include('../functions/common_function.php'); //23-01-2024
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- External css -->
    <link rel="stylesheet" href="../style.css"> <!--16-02-2024 9:45PM-->

    <title>Welcome <?php  echo $_SESSION['username'] ?> </title>    <!--16-02-2024 10:12PM-->
    <style>
        body {
            overflow-x: hidden;
        }

        /* 16-02-2024 16-02-2024*/
        .profile_img {
            width: 90%;
            margin: auto;
            display: block;
            /* height: 100%; */
            object-fit: contain;
        }
        .edit_image{
            width: 100px;
            height: 100px;
            object-fit: contain;
        }
    </style>
</head>

<body>

    <div class="container-fluid p-0">

        <nav class="navbar navbar-expand-lg  bg-info navbar-light">
            <div class="container-fluid">
                <img src="../Images/logo.png" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
                                    <?php
                                    cart_item();
                                    ?>
                                </sup></a> <!--26-01-2024--->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total price:
                                <?php
                                total_cart_price();   //26-01-2024 7:22PM
                                
                                ?>/-
                            </a>
                        </li>

                    </ul>
                    <form class="d-flex" action="../search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            name="search_data">

                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>


        <!-- calling cart function 26-01-2024 -->

        <?php
        cart();
        ?>





        <!-- Second child --> <!-- 10-01-2024 -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">

            <ul class="navbar-nav me-auto">


                <?php
                //For login and logout sessions //08-02-2024 10:43PM
                
                if (!isset($_SESSION['username'])) {
                    echo " <li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome Guest</a>
                </li>";
                } else {
                    echo "  <li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome " . $_SESSION['username'] . " </a> 
                </li>";

                }



                if (!isset($_SESSION['username'])) {
                    echo "  <li class='nav-item'>
                    <a class='nav-link' href='./users_area/user_login.php'>Login</a>
                </li>";
                } else {
                    echo "  <li class='nav-item'>
                    <a class='nav-link' href='./users_area/logout.php'>Logout</a>
                </li>";

                }
                ?>

            </ul>
        </nav>

        <!-- Third child --> <!-- 10-01-2024 -->
        <div class="bg-light">
            <h3 class="text-center">Hidden Store</h3>
            <p class="text-center">Communication is at the heart of e-commerce and community</p>
        </div>

        <!-- Fourth Child 16-02-2024 //9:42PM-->
        <div class="row">
            <div class="col-md-2 ">
                <ul class="navbar-nav bg-secondary text-center" style="height:100vh">
                    <li class="nav-item bg-info">
                        <a class="nav-link text-light" href="#">
                            <h4>Your Profile</h4>
                        </a>
                    </li>

                    <?php 
                    $username=$_SESSION['username'];              //22-02-2024 3:00PM
                    $user_image="Select * from `user_table` where username='$username'";
                    $user_image=mysqli_query($con,$user_image);
                    $row_image=mysqli_fetch_array($user_image);

                    $user_image=$row_image['user_image'];

                    //user image for li is $user_image=$row_image['user_image']; 22-02-2024 3:17PM
                    echo "
                    <li class='nav-item '>
                        <img src='./user_images/$user_image' class='profile_img my-4' alt=''>  
                    </li>";
                    ?>

                   

                    <li class="nav-item ">
                        <a class="nav-link text-light" href="profile.php">
                        Pending Orders
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link text-light" href="profile.php?edit_account">
                        Edit Account
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link text-light" href="profile.php?my_orders">
                        My Orders
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link text-light" href="profile.php?delete_account">
                        Delete Account
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link text-light" href="logout.php">
                        Logout
                        </a>
                    </li>

                </ul>
            </div>
            <div class="col-md-10 text-center">
                <?php 
                get_user_order_details();

                //22-02-2024 4:27PM
                if(isset($_GET['edit_account'])){
                    include('edit_account.php');
                }

                //23-02-2024 9:25AM
                if(isset($_GET['my_orders'])){
                    include('user_orders.php');
                }
                //23-02-2024 2:44PM
                if(isset($_GET['delete_account'])){
                    include('delete_account.php');
                }
                ?>
            </div>
        </div>




        <!-- Including footer.php -->

        <?php
        include("../includes/footer.php"); //24-01-2024
        
        ?>
    </div>




    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></scrip >

</body >

</html >