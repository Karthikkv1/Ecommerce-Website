<!-- Including connect.php file using php syntax -->

<?php
include('includes/connect.php');          //20-01-2024

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
    <link rel="stylesheet" href="./style.css">

    <title>My store</title>
</head>

<body>

    <div class="container-fluid p-0">

        <nav class="navbar navbar-expand-lg  bg-info navbar-light">
            <div class="container-fluid">
                <img src="./Images/logo.png" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total price:100/-</a>
                        </li>

                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Search</button> <!--success removed-->
                    </form>
                </div>
            </div>
        </nav>

        <!-- Second child --> <!-- 10-01-2024 -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome Guest</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>

            </ul>
        </nav>

        <!-- Third child --> <!-- 10-01-2024 -->
        <div class="bg-light">
            <h3 class="text-center">Hidden Store</h3>
            <p class="text-center">Communication is at the heart of e-commerce and community</p>
        </div>

        <!-- Fourth Child -->
        <div class="row px-1">

            <div class="col-md-10">
                <div class="row">
                    <!-- // Fetching products and displaying products from the database 21-01-2024 -->
                    <?php
                    $select_query="Select * from `products` order by rand() limit 0,9";
                    $result_query=mysqli_query($con,$select_query);
                    // $row=mysqli_fetch_assoc($result_query);
                    // echo $row['product_title'];
                    while($row=mysqli_fetch_assoc($result_query))
                    {
                        $product_id = $row['product_id']; //product_id as mentioned in database
                        $product_title = $row['product_title'];
                        $product_description = $row['product_description'];
                        // $product_keywords = $row['product_keywords'];
                        $product_image1 = $row['product_image1'];
                        $product_price = $row['product_price'];
                        $category_id = $row['category_id'];
                        $brand_id = $row['brand_id'];

                        echo "  <div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/ $product_image1' class='card-img-top' alt='$product_title'> 
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description
                           </p>
                                <a href='#' class='btn btn-info'>Add to cart</a>
                                <a href='#' class='btn btn-secondary'>View More</a>
                            </div>
                        </div>
                    </div>";
                        // echo "<br>";
                        
                        // $product_image2 = $row['product_image2'];
                        // $product_image3 = $row['product_image3'];
                    }

                     ?>
                 
                
                   

                    

                  

                   

                </div>

            </div>

            <!-- Side Navigation Bar -->
            <div class="col-md-2 bg-secondary p-0">

                <ul class="navbar-nav me-auto text-center">

                    <li class="nav-item bg-info ">
                        <a href="#" class="nav-link text-light ">
                            <h4>Delivery Brands</h4>
                        </a>
                    </li>
                    <!--20-01-2024-->
                    <?php
                    $select_brands = "Select * from `brands` ";
                    $result_brands = mysqli_query($con, $select_brands);
                    // $row_data=mysqli_fetch_assoc($result_brands); //To fetch data from database
                    // echo $row_data['brand_title'];  //brand_title because in brand table of database column name is brand_title       
                    
                    //To display all the brands in the database
                    
                    while ($row_data = mysqli_fetch_assoc($result_brands)) {
                        $brand_title = $row_data['brand_title'];
                        $brand_id = $row_data['brand_id']; //brand_id,brand_title from database
                        echo "  <li class='nav-item '>
                        <a href='index.php?brand=$brand_id' class='nav-link text-light '>$brand_title</a>  
                    </li>";
                    }
                    //line 202 is for //To call brand name from database and display it in webpage
                    
                    ?>



                </ul>

                <!-- Categories to be displayed -->
                <ul class="navbar-nav me-auto text-center">

                    <li class="nav-item bg-info ">
                        <a href="#" class="nav-link text-light ">
                            <h4>Categories</h4>
                        </a>
                    </li>
                    <?php
                    $select_categories = "Select * from `categories` ";
                    $result_categories = mysqli_query($con, $select_categories);
                       
                    
                    //To display all the categories in the database
                    
                    while ($row_data = mysqli_fetch_assoc($result_categories)) {
                        $category_title = $row_data['category_title'];
                        $category_id = $row_data['category_id']; //brand_id,brand_title from database
                        echo "  <li class='nav-item '>
                        <a href='index.php?category=$category_id' class='nav-link text-light '>$category_title</a>  
                    </li>";
                    }
                    //line 232 is for //To call category name from database and display it in webpage
                    
                    ?>



                </ul>

            </div>

        </div>


        <!-- Footer -->
        <div class="bg-info p-3 text-center">
            <p>All rights reserved Designed by Karthik 2024</P>
        </div>

    </div>




    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>