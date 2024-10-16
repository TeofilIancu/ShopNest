<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered-mt-5">
    <thead class="bg-info">
        <tr class="text-center">
            <th>S1no</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $select_cat="SELECT * FROM `categories`";
        $result=mysqli_query(mysql: $con,query: $select_cat);
        $number=0;
        while($row=mysqli_fetch_assoc(result: $result)){
            $category_id=$row['category_id'];
            $category_title=$row['category_title'];
            $number++;

        }
        ?>
        <tr class="text-center">
            <td><?php echo $number;?></td>
            <td><?php echo $category_title;?></td>
            <td><a href='index.php?edit_categories=<?php echo $product_id?>' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_categories=<?php echo $product_id?>' class='text-dark'><i class='fa-solid fa-trash'></i></td>
        </tr>
    </tbody>
</table>