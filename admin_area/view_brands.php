<!-- File Created on 24-02-2024 10:54PM -->




<h3 class="text-center text-success">All Brands</h3>

<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr class="text-center">
            <th>SI No</th>
            <th>Brand Title</th>
            <th>Edit</th>
            <th>Delete</th>
            
        </tr>
    </thead>

    <tbody class="bg-secondary text-light">
        <?php 
        $select_cat="Select * from `brands`";
        $result=mysqli_query($con,$select_cat);

        $number=0;

        while($row=mysqli_fetch_assoc($result))
        {
            $brand_id=$row['brand_id'];
            $brand_title=$row['brand_title'];
           
            $number++;

            ?>

            
       

        
        <tr class="text-center">
            <td><?php echo $number ;?></td>
            <td><?php echo $brand_title ;?></td>
            <td><a href='index.php?edit_products=<?php echo $product_id ?>' class='text-danger'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_product=<?php echo $product_id ?>' class='text-danger'><i class='fa-solid fa-trash'></i></a></td>
          
        </tr>

        <?php 
        }
        ?>
    </tbody>
</table>