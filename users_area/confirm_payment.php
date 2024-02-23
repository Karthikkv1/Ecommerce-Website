<?php
include('../includes/connect.php');          //23-02-2024

session_start();

//23-02-2024 10:44PM
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    // echo $order_id;

    //23-02-2024 //11:05AM
    $select_data="Select * from `user_orders` where order_id=$order_id";
    $result=mysqli_query($con,$select_data);

    //For fetching values from database and display it in payment page while selecting payment options
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount_due=$row_fetch['amount_due'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body class="bg-secondary">
    
    <div class="container my-5">
    <h1 class="text-center text-light">Confirm Payment</h1>
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number ?>">
            </div>

            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount"  value="<?php echo $amount_due ?>">
            </div>

            <div class="form-outline my-4 text-center w-50 m-auto">
               <select name="payment_mode" class="form-select w-50 m-auto">
                <option >Select Payment Mode</option>
                <option >UPI</option>
                <option >Netbanking</option>
                <option >Paypal</option>
                <option >Cash on Delivery</option>
                <option >Pay Offline</option>
               </select>
            </div>

            <div class="form-outline my-4 text-center w-50 m-auto">
               <input type="submit" class="bg-info py-2 px-3 border-0" value="Confirm" name="confirm_payment">
            </div>

        </form>
    </div>

</body>

</html>