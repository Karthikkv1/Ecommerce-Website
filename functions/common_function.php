<?php 

//include connect file

include('./includes/connect.php'); //23-01-2024

//getting products

function getproducts(){

    global $con; //23-01-2024

    //condition to check isset or not
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand']))
        {
            
       

    



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
                <a href='product_details.php?product_id=$product_id ' class='btn btn-secondary'>View More</a>
            </div>
        </div>
    </div>";
        // echo "<br>";
        
        // $product_image2 = $row['product_image2'];
        // $product_image3 = $row['product_image3'];
    }

}
}
}

//getting all products

function get_all_products(){
    global $con; //23-01-2024

    //condition to check isset or not
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand']))
        {
            
       

    



    $select_query="Select * from `products` order by rand() ";
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
                <a href='product_details.php?product_id=$product_id ' class='btn btn-secondary'>View More</a> 
            </div>
        </div>
    </div>";
        // echo "<br>";
        
        // $product_image2 = $row['product_image2'];
        // $product_image3 = $row['product_image3'];
    }

}
}

}

//getting unique categories
function get_unique_categories(){

    global $con; //23-01-2024

    //condition to check isset or not
    if(isset($_GET['category'])){
        $category_id=$_GET['category']; //23-01-2024
        
            
       

    



    $select_query="Select * from `products` where category_id=$category_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows( $result_query);

    //displaying error if searched product is not there //23-01-2024
    if($num_of_rows==0){
        echo "<h2 class='text-center text-danger' >No stock for this category</h2>";
    }


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
                <a href='product_details.php?product_id=$product_id ' class='btn btn-secondary'>View More</a>
            </div>
        </div>
    </div>";
        // echo "<br>";
        
        // $product_image2 = $row['product_image2'];
        // $product_image3 = $row['product_image3'];
    }

}
}


//getting unique brands
function get_unique_brands(){

    global $con; //23-01-2024

    //condition to check isset or not
    if(isset($_GET['brand'])){ //'brand' as mentioned in url when clicking on particular brand for example brand=1
        $brand_id=$_GET['brand']; //23-01-2024
        
            
       

    



    $select_query="Select * from `products` where category_id=$brand_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows( $result_query);

    //displaying error if searched product is not there //23-01-2024
    if($num_of_rows==0){
        echo "<h2 class='text-center text-danger' >This brand is not available for service</h2>";
    }


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
                <a href='product_details.php?product_id=$product_id ' class='btn btn-secondary'>View More</a>
            </div>
        </div>
    </div>";
        // echo "<br>";
        
        // $product_image2 = $row['product_image2'];
        // $product_image3 = $row['product_image3'];
    }

}
}



//displaying brands in side nav

function getbrands(){
    global $con; //23-01-2024
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
}


//displaying categories in side nav
function getcategories(){
    global $con;
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
   
}

//searching products function

function search_product(){
    
    global $con; //23-01-2024
    if(isset($_GET['search_data_product'])){
        $search_data_value=$_GET['search_data'];

    

   
       

    



    $search_query="Select * from `products` where product_keywords like '% $search_data_value%'";
    $result_query=mysqli_query($con,$search_query);
    // $row=mysqli_fetch_assoc($result_query);
    // echo $row['product_title'];
    $num_of_rows=mysqli_num_rows( $result_query);

    //displaying error if searched product is not there //23-01-2024
    if($num_of_rows==0){
        echo "<h2 class='text-center text-danger' >No results match.No products found on this category!</h2>";
    }
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
                <a href='product_details.php?product_id=$product_id ' class='btn btn-secondary'>View More</a>
            </div>
        </div>
    </div>";
        // echo "<br>";
        
        // $product_image2 = $row['product_image2'];
        // $product_image3 = $row['product_image3'];
    }

}
}




?>