<?php
include "includes/admin_header.php";?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Welcome to Admin
                            <small>Author</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Add Post</a>
                            </li> 
                        </ol>
                        
                          <?php
    if(isset($_GET['edit_user'])){
        
        $the_user_id=$_GET['edit_user'];
        
         $query = "SELECT * FROM users WHERE user_id=$the_user_id";
        $select_users_query = mysqli_query($connection,$query);         
        
     while($row = mysqli_fetch_assoc($select_users_query)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
         $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
         $user_image = $row['user_image'];
         $user_email = $row['user_email'];
         $user_role = $row['user_role'];
         $user_password = $row['user_password'];
         
         
         
         
         
         
     }
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
if(isset($_POST['edit_user'])){
      
   
      $user_firstname=$_POST['user_firstname'];
      $user_lastname=$_POST['user_lastname'];
      $user_role=$_POST['user_role'];
      $username=$_POST['username'];
      $user_email=$_POST['user_email'];
     $user_password=$_POST['user_password'];
     // $post_date=date('d-m-y');
      //$post_comment_count=4;
    $query = "SELECT randSalt FROM users";
    $select_randsalt_query = mysqli_query($connection,$query);
    if(!$select_randsalt_query){
        die("Query Failed".mysqli_error($connection));
    }
    $row = mysqli_fetch_array($select_rand_query);
    $salt = $row['randSalt'];
    $hashed_password = crypt($user_password, $salt);
    
   
    
 
          $query = "UPDATE users SET ";
          $query .="user_firstname  = '{$user_firstname}', ";
          $query .="user_lastname = '{$user_lastname}', ";
          $query .="user_role   =  '{$user_role}', ";
          $query .="username = '{$username}', ";
          $query .="user_email  = '{$user_email}', ";
          $query .="user_password= '{$hashed_password}' ";
          $query .= "WHERE user_id = {$the_user_id} ";
        
        $update_user_query = mysqli_query($connection,$query);
          

if(!$update_user_query){
    echo "it failed ".mysqli_error($connection);
    
    
    
}

}
    ?>

<form action="" method="post" enctype="multipart/form-data">  

  <div class="form-group">
         <label for="title">First Name</label>
          <input type="text"  value="<?php echo $user_firstname; ?> " class="form-control" name="user_firstname">
      </div> 
  <div class="form-group">
         <label for="title">Last Name</label>
          <input type="text" value="<?php echo $user_lastname; ?> "  class="form-control" name="user_lastname">
      </div>
      <div class="form-group">
       <label for="categories">Roles</label>
       <select name="user_role" id="">
       <option value="<?php echo $user_role?>"><?php echo $user_role?></option>
    <?php   if($user_role=='Administrator'){
     
    echo "<option value='Subscriber'>Subscriber</option>";
}
           else{
               echo "      <option value='Administrator'>Adminstrator</option>";
           }
       ?>

      
       </select>

      </div>
    <div class="form-group">

         <label for="post_tags">Username</label>
          <input type="text" value="<?php echo $username; ?> "  class="form-control" name="username">
      </div>
          <div class="form-group">

         <label for="post_tags">Email</label>
          <input type="email" value="<?php echo $user_email; ?> "  class="form-control" name="user_email">
      </div>
          <div class="form-group">

         <label for="post_tags">Password</label>
          <input type="password" value="<?php echo $user_password; ?> "  class="form-control" name="user_password">
      </div>


  
      
     

<div class="form-group">

<input class="btn btn-primary" type="submit" name="edit_user" value="Edit User">
      </div>

</form>
                        
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"?>
    