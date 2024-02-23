<?php
include('../includes/connect.php');          //23-02-2024 //3:39PM
include('../functions/common_function.php'); //23-02-2024  //3:39PM


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- External css -->
    <link rel="stylesheet" href="../style.css">

    <style>
        /* 23-02-2024 3:43PM */
        body {
            overflow-x: hidden;
            /* To remove horizontal scroll bar */

        }
    </style>



</head>

<body>
    <!-- Navbbar -->
    <div class="container-fluid p-0">
        <!-- First Child -->
        <nav class="navbar navabar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../Images/logo.png" alt="" class="logo"> <!--double dots is used to come out of the folder-->

                <nav class="navbar navabar-expand-lg ">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Guest</a>
                        </li>
                    </ul>

                </nav>
            </div>
        </nav>

        <!-- Second Child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!-- Third Child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center ">

                <div class="p-5">
                    <a href="#"><img src="../Images/admin.png" alt="" class="admin_image"></a>
                    <p class="text-light text-center">Admin</p>
                </div>

                <div class="button text-center ">
                    <button class="my-3 "><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert
                            Product</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View
                            Products</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert
                            Categories</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">View Categories</a></button>
                    <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert
                            Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">View Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">All orders</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">All payments</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">List Users</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>

                </div>

            </div>
        </div>

        <!-- Fourth Child -->
        <div class="container my-3">
            <?php
            if (isset($_GET['insert_category'])) {
                include('insert_categories.php');
            }

            if (isset($_GET['insert_brand'])) {
                include('insert_brands.php');
            }

            //23-02-2024 3:47PM
            if (isset($_GET['view_products'])) {
                include('view_products.php');
            }
            ?> <!-- PHP codes -->
        </div>

        <div class="bg-info p-3 text-center footer1 container-fluid">
            <p>All rights reserved Designed by Karthik 2024</P>
        </div>


    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>