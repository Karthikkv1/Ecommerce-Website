<?php include('../includes/connect.php');
include('../functions/common_function.php'); 

if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
   
}

//Getting Total items and Total price of all items

$get_ip_address=getIPAddress(); //11-02-2024 10:00PM
$total_price=0;

$cart_query_price="Select * from `cart_details` where ip_address='$get_ip_address'";

$result_cart_price=mysqli_query($con,$cart_query_price);
$count_products=mysqli_num_rows($result_cart_price);

while($row_price=mysqli_fetch_array($result_cart_price)){
    $product_id=$row_price['product_id'];

    $select_product="Select * from `products` where product_id=$product_id";  //11-02-2024 10:19PM
    $run_price=mysqli_query($con,$select_product);


    //11-02-2024 10:32PM
    while($row_product_price=mysqli_fetch_array($run_price))
    {
        $product_price=array($row_product_price['product_price']);
        $product_value=array_sum($product_price);
        $total_price+= $product_values;
        
    }

}
?>