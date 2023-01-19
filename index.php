<?php include('partials-front/menu.php') ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL;?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    <?php 
        if(isset($_SESSION['order']))
        {
        echo $_SESSION['order'];
        unset($_SESSION['order']);
        }
    ?>
    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Categories</h2>
            <?php 
            // create sql to display category from database
            $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 4";
            // execute the query
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            if($count>0)
            {
                // category available
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>

                <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                    <div class="box-3 float-container">
                        <?php
                        // check if image is available or not
                        if($image_name=="")
                        {
                            echo "<div class='error'>Image not available</div>";
                        }
                        else
                        {
                            ?>
                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve" height="300px" >
                            <?php
                        }
                    
                        ?>
                       <!-- float-text text-white -->
                        <h3 class="" style="color: red;"><?php echo "$title"; ?></h3>
                    </div>
                </a>
                    <?php
                }

            }
            else
            {
                // category not available 
                echo "<div class='error'>Category not available</div>";
            }
            ?>
         


            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
            $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 6";

            // execute query 
            $res2 = mysqli_query($conn, $sql2);

            // check if food available or not
            $count2 = mysqli_num_rows($res2);
         
                if($count2>0)
                {
                    // food available
                    while($row=mysqli_fetch_assoc($res2))
                    {
                         $id = $row['id'];
                         $title = $row['title'];
                         $description = $row['description'];
                         $price = $row['price'];
                         $image_name = $row['image_name'];
                        ?>

                    <div class="food-menu-box">
                        <div class="food-menu-img">
                        <?php
                        // check if image available or not
                        if($image_name=="")
                        {
                            echo "<div class='error'>Image not available</div>";
                        }else 
                        {
                            ?>

                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve" width="15px" height="100px">
                            <?php
                        }
                        
                        ?>
                           
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title?></h4>
                            <p class="food-price"><?php echo $price?></p>
                            <p class="food-detail"><?php echo $description?>
                            </p>
                            <br>

                            <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>

                        <?php
                    }
                }
                else
                {
                    // food not available
                    echo "<div class='error'>food not available</div>";
                }
            


            ?>

            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php') ?>