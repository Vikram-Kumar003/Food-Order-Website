


<?php include('partials-front/menu.php'); ?> 



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php 

                // Display all the category that are active 
                // sql query 
                
                $sql = "SELECT * FROM tbl_category WHERE active = 'Yes'";

                // active or featured dono yes hoga to home page me show hoga or sirf active yes hoga to category me dikhayega featured no hoga to ni dikahayega 



                // food me bhi featured ko no kr denge to home me ni dikhega 

                // active rhega to category me show hoga or featured rehge

                // execute the query 

                $res = mysqli_query($conn, $sql);


                // count rows 
                $count =mysqli_num_rows($res);

                // check whether categories availbae or not 

                if($count>0)
                {
                    // categories availabe 
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //get the value 
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>



                        
                        <a href="category-foods.html">
                            <div class="box-3 float-container">
                                <?php 

                                    if($image_name=="")
                                    {
                                        // image not available 
                                        echo "<div class = 'error'>Image not found. </div>";
                                    }

                                    else
                                    {
                                        // image availabe 
                                        ?>

                                            <img src="<?php echo SITEURL;  ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">

                                        <?php

                                    }
                                
                                ?>
                            

                            <h3 class="float-text text-white"><?php echo $title; ?></h3>
                        </div>
                        </a>


                        <?php

                    }

                }
                else
                {
                    // categories not availabe 
                    echo "<div class = 'error'>Category not found. </div>";
                }
            
            
            ?>



            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


   <?php  include('partials-front/footer.php'); ?>