



<?php 
    // include constants file 
    include('../config/constants.php');
   // echo "Delete page "

   // check whether id and image_name value is set or not 

   if(isset($_GET['id']) AND isset($_GET['image_name']))
   {
        // get the value and delete
        //echo "get value and delete";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        // remove the physical image file if available
        if($image_name!= "")
        {
            // image is availabe so remove it 
            $path = "../images/category/".$image_name;

            // remove the image 
            $remove = unlink($path);
           // if failed to remove image then add and error message and stop process

            if($remove==false)
            {
                //set the session message 
                $_SESSION['remove'] = "<div class = 'error'> Failed to Remove Category Image </div>";


                // redirect to manage category page 
                header('location:'.SITEURL.'admin/manage-category.php');

                // stop process 
                die();
            }
        }


        // delete from database 
        // sql query to delete data form databse 
        $sql = "DELETE FROM tbl_category WHERE id=$id";


        // execute the query 
        $res = mysqli_query($conn,$sql);

        // check whether the data is deleted from databse or not 

        if($res==true)
        {
            // set success message and redirect 
            $_SESSION['delete'] = "<div class = 'success'>Deleted successfully . </div>";

            // redirect to manage category 

            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else
        {
            // set fail message

            $_SESSION['delete'] = "<div class = 'error'>Failed To Delete Category . </div>";

            // redirect to manage category 

            header('location:'.SITEURL.'admin/manage-category.php');
        }




        // redirect to manage category page with message 

   }

   else
   {
    // redirect to magage category page
       header('location:'.SITEURL.'admin/manage-category.php'); 
   }




?>