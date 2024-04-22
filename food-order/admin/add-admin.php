

<?php include('partials/menu.php'); ?>




<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br>
        <br>

        <?php 

        if(isset($_SESSION['add'])) // checking whether the session is set or not 

        {
            echo $_SESSION['add'];  // display the session message 
            unset($_SESSION['add']);// remove session message 
        }
        
        
        
        ?>

        <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td>Full name:</td>
                <td><input type="text" name="full_name" placeholder ="enter your name"></td>
            </tr>


            <tr>
                <td>Username:</td>
                <td>
                    <input type="text" name="username" placeholder = "username">
                </td>
            </tr>


            <tr>
                <td>Password:</td>
                <td>
                    <input type ="password" name= "password" placeholder = "your password">
                </td>
            </tr>


            <tr>
                <td colspan="2">
                    <input type ="submit" name="submit" value ="Add Admin" class="btn-secondary">
                </td>
            </tr>
        </table>





        </form>


<?php include('partials/footer.php'); ?>



<?php 

// process the value from form and save it in database 
// check wheather the submit  button is clicked or not 

if(isset($_POST['submit']))
{
    // button clicked 
    // echo "Button Clicked";

    // 1. get the data from form 

     $full_name = $_POST['full_name'];
     $username  = $_POST['username'];
     $password  = md5($_POST['password']);  // password encryption with md5 

     // 2.sql query to save the data into database 

     $sql = "INSERT INTO tbl_admin SET
          full_name = '$full_name',
          username = '$username',
          password = '$password'
     ";

  // 3. executing query and saving data into database 
 $res = mysqli_query($conn, $sql) or die(mysqli_error());



 // 4. check wheateher the query is executed or not data is inserted or not 


 if($res==TRUE)
 {
    // data inserted 
    //echo "Data inserted";
    // create a session variable to display message 
    $_SESSION['add'] = "<div class= 'add'> Admin Added successfully </div>";

    // redirect page TO MANAGE ADMIN
    header("location:" .SITEURL.'admin/manage-admin.php');
 }
 else
 {
    // failed to insert data

    //echo "Failed to insert data";



     // create a session variable to display message 
     $_SESSION['add'] = "Failed to add admin";

     // redirect page TO add admin  ADMIN
     header("location:" .SITEURL.'admin/add-admin.php');
 }



    



}



?>


