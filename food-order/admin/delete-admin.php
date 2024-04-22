




<?php 

// include constant.php file here

include('../config/constants.php');


// 1. get the id of admin to be delted 

 $id = $_GET['id'];

// 2. create sql query to delete admin

$sql = "DELETE FROM tbl_admin WHERE id = $id";

// execute the query 

$res = mysqli_query($conn, $sql);

// check the query executed successfuly or not 

if($res==true)
{
    // query executed successfuly and admin deleted 
    // echo "Admin Deleted";

    // create session variable to display message
    $_SESSION['delete'] = " <div class = 'success'>Admin Deleted successfully.</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}

else
{
    // failed to delete
    //echo "Failed to delete Admin";
    $_SESSION['delete'] = "<div class = 'error'> Failed to delete Admin. Try Again Later.</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}
// 3. redirect to manage admin page with message(success/error)





?>