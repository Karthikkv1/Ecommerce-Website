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
                <a href='#' class='btn btn-secondary'>View More</a>
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


?>