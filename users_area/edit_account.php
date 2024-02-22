<!DOCTYPE html>
<!-- File created on 22-02-2024 4:00PM -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>

<body>
    <h3 class="text-success mb-4">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data" >

        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_username">
        </div>

        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" name="user_email">
        </div>

        <div class="form-outline mb-4 d-flex  w-50 m-auto">
            <input type="file" class="form-control  m-auto" name="user_image">
            <!-- Displaying Image of person who  have account -->
            <img src="./user_images/<?php echo $user_image ?>" alt="" class="edit_image" >  <!--22-02-2024 5:10PM-->
        </div>

        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_address">
        </div>

        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_mobile">
        </div>

        <input type="submit" value="update" class="bg-info py-2 px-3 border-0" name="user_update">

    </form>
</body>

</html>