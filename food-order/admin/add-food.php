

<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>

        <br><br>



        <?php 

        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        
        ?>


        <form action="" method = "POST" enctype = "multipart/form-data">
            <table class = "tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name = "title" placeholder ="title of the food">
                    </td>
                </tr>

                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder = "description of the food"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number" name = "price">
                    </td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name = "image">
                    </td>
                </tr>


                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category" >



                        <?php 

                        // create PHP code to display category from database 
                        // 1. create sql to get all active category from database 

                          $sql = "SELECT * FROM tbl_category WHERE active= 'Yes'";

                        // executing query 
                          $res = mysqli_query($conn, $sql);


                          // count rows to check whether we have category or not 

                          $count = mysqli_num_rows($res);

                          // if count is greater than zero we have category else we dont have category 
                          if($count>0)
                          {
                            // we have category
                            while($row=mysqli_fetch_assoc($res))
                            {
                                // get teh details of categories 
                                $id = $row['id'];
                                $title = $row['title'];
                                ?>
                                <option value="<?php echo $id; ?> "><?php echo $title ; ?></option>



                                <?php
                            }
                          }

                          else
                          {
                            // we dont have category
                            ?>
                            <option value="0">No Category Found</option>

                            <?php



                          }



                        //2. display on dropdown 
                        
                        
                        
                        ?>
                            <option value="1">Food</option>
                            <option value="2">Snacks</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name = "featured" value = "Yes">Yes
                        <input type="radio" name = "featured" value = "No">No

                    </td>
                </tr>


                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name = "active" value = "Yes">Yes
                        <input type="radio" name = "active" value = "No">No

                    </td>
                </tr>

                <tr>
                    <td colspan = "2">
                        <input type="submit" name = "submit" value = "Add Food" class = "btn-secondary">
                    </td>
                </tr>

            </table>


        
        </form>



        <?php 

                // check whether the button is clicked or not 
                if(isset($_POST['submit']))
                {
                    // add the food in database 
                    // echo "clicked";

                    //1. get the data form form 

                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $price = $_POST['price'];
                    $category = $_POST['category'];

                    // check whether radio button featured and active are check e or not 

                    if(isset($_POST['featured']))
                    {
                        $featured = $_POST['featured'];
                    }

                    else
                    {
                        $featured = "No"; // setting the default value 
                    }

                    if(isset($_POST['active']))
                    {
                        $active = $_POST['active'];
                    }

                    else
                    {
                        $active = "No"; // setting the default value 
                    }



                    //2. upload the image if selected 

                    // check whether the select image or not and upload the image only image is selectd 

                    if(isset($_FILES['image']['name']))
                    {
                            //get the details of the selected image 
                            $image_name = $_FILES['image']['name'];

                            // check whether the image is selected or not and upload image only if selected 

                            if($image_name!="")
                            {
                                // image is selected 
                                // A. rename the image 
                                // get the extension of selected image(jpg, png , gif , etc) "vikram.jpg"
                               // $ext = end(explode('.',$image_name));
                               $image_parts = explode('.', $image_name);
                               $ext = end($image_parts);
                               

                                // create new name for image 
                                $image_name = "Food-Name-".rand(0000,9999).".".$ext; // new image name may be Food Name  



                                // B. upload the image 

                                //get the source path and destination path 

                                // source path isthe current location of the image 
                                $src = $_FILES['image']['tmp_name'];

                                // destination path for the image to be uploaded 
                                $dst = "../images/food/".$image_name;

                                // finally upload teh food image 
                                $upload = move_uploaded_file($src, $dst);


                                // check whether image is uploaded or not 

                                if($upload==false)
                                {
                                    // failed to upload the image 
                                    // redirect to add food page with error message 
                                    $_SESSION['upload']= "<div class = 'error'> Failed to upload image . </div>";
                                    header('location:'.SITEURL.'admin/add-food.php');
                                    // stop the process 
                                    die();
                                }






                            }
                    }

                    else
                    {
                        $image_name = "";  // setiing default value as blank 

                    }




                    // 3. insert into database 


                    // create a sql query to save or add food 

                    // for numerical value no nedd to pass value inside quotes but for string value is is compulsory to add quotes 
                    $sql2 = "INSERT INTO tbl_food SET 
                        title = '$title',
                        description  = '$description',
                        price = $price,
                        image_name = '$image_name',
                        category_id = $category,
                        featured = '$featured',
                        active = '$active'
                    ";


                    // execute the query 
                    $res2 = mysqli_query($conn, $sql2);


                    // check whether the data is inserted or not 
                    // 4. redirect with message to manage food page 

                    if($res==true)
                    {
                        // data inserted successfully 
                        $_SESSION['add'] = "<div class = 'success'> Food Added Successfully. </div>";
                        header('location:'.SITEURL.'admin/manage-food.php');

                    }
                    else
                    {
                        // failed to insert data 
                        $_SESSION['add'] = "<div class = 'error'> Failed To Add Food. </div>";
                        header('location:'.SITEURL.'admin/manage-food.php');
                    }

                    

                }

                else
                {

                }
        
        
        
        
        ?>




    </div>
</div>







<?php include('partials/footer.php'); ?>





