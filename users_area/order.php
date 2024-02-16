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

$invoice_number=mt_rand(); //14-02-2024 //9:49PM  //To generate random invoice number
$status='pending';


$count_products=mysqli_num_rows($result_cart_price);

while($row_price=mysqli_fetch_array($result_cart_price)){
    $product_id=$row_price['product_id'];

    $select_product="Select * from `products` where product_id=$product_id";  //11-02-2024 10:19PM
    $run_price=mysqli_query($con,$select_product);


    //11-02-2024 10:32PM
    while($row_product_price=mysqli_fetch_array($run_price))
    {
        $product_price=array($row_product_price['product_price']);
        $product_values=array_sum($product_price);
        $total_price+= $product_values;
        
    }

}

//getting quantity from cart //14-02-2024 //10:02PM
$get_cart="select * from `cart_details`";
$run_cart=mysqli_query($con,$get_cart);
$get_item_quantity=mysqli_fetch_array($run_cart);
$quantity=$get_item_quantity['quantity'];  //To get quantity of product

if($quantity==0){
    $quantity=1;
    $subtotal=$total_price;
}
else{
    $quantity=$quantity;
    $subtotal=$total_price*$quantity;
}

$insert_orders="Insert into `user_orders` (user_id,amount_due,invoice_number,total_products,order_date,order_status) values($user_id,$subtotal,$invoice_number,$count_products,NOW(),'$status')";
$result_query=mysqli_query($con,$insert_orders);

if($result_query){
    echo "<script>alert('Orders are submitted successfully')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}


//Orders Pending //16-02-2024

$insert_pending_orders="Insert into `orders_pending` (user_id,invoice_number,product_id,order_status) values($user_id,$subtotal,$invoice_number,$count_products,NOW(),'$status')";


?>