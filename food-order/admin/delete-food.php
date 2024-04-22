<?php 
 


        // include constant php 
        include('../config/constants.php');


        //echo "Delete food";
        if(isset($_GET['id']) && isset($_GET['image_name']))    // either use && or AND  
        {
                // process to delete
                //echo "Process to delete";

                //1. get id and image name 

                $id = $_GET['id'];
                $image_name = $_GET['image_name'];

                // remove the imge if  available 

                // check wheter the image is availabl or not delete only if availabe

                if($image_name !="")
                {
                        // it has image and need to remove from folder 
                        // get the image path 
                        $path = "../images/food/".$image_name;

                        // remove image file form folder 
                        $remove = unlink($path);

                        // check whether the image is remvoed or not 
                        if($remove==false)
                        {
                                // failed  to remvoe 
                                $_SESSION['upload'] = "<div class = 'error'>Failed to remove image file</div>";
                                // redirect to manage food 
                                header('location:'.SITEURL.'admin/manage-food.php');
                                // stop the process of deleting foo d
                                die();
                        }
                }

                // 3. delete food from database 
                $sql ="DELETE FROM tbl_food WHERE id =$id";

                // exectute the query 
                $res = mysqli_query($conn, $sql);

                 // 4. Redirect to manage food with session message 

                // check the qeury executed or not and set the sesssion message respectively 

                if($res==true)
                {
                        // food deletedd 
                        $_SESSION['delete'] ="<div class ='success'>Food Deleted Successfully.</div>";
                        header('location:'.SITEURL.'admin/manage-food.php');
                }
                else
                {
                        // failed to delete food 
                        $_SESSION['delete']= "<div class = 'error'> Failed To Delete Food. </div>";
                        header('location:'.SITEURL.'admin/manage-food.php');
                }

               
        }
        else
        {       // rediect to manage food page 
                //echo "redirect";
                $_SESSION['unauthorize']="<div class = 'error'> Unauthorized Acess. </div>";
                header('location:'.SITEURL.'admin/manage-food.php');
        }

?>