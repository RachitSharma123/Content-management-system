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
if(isset($_POST['create_user'])){
      
   
      $user_firstname=$_POST['user_firstname'];
      $user_lastname=$_POST['user_lastname'];
      $user_role=$_POST['user_role'];
      $username=$_POST['username'];
      $user_email=$_POST['user_email'];
     $user_password=$_POST['user_password'];
     // $post_date=date('d-m-y');
      //$post_comment_count=4;
    
    
   
    
 $query = "INSERT INTO users(user_firstname, user_lastname,user_role,username,user_email,user_password) VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}', '{$user_password}') "; 
             
      $create_user_query = mysqli_query($connection, $query);  
          

if(!$create_user_query){
    echo "it failed ".mysqli_error($connection);

}
echo "User Have been Registered"." "."<a href='users.php'>Veiw Users</a>";
}
    ?>

<form action="" method="post" enctype="multipart/form-data">  

  <div class="form-group">
         <label for="title">First Name</label>
      <input type="text" class="form-control" name="user_firstname">
      </div> 
  <div class="form-group">
         <label for="title">Last Name</label>
          <input type="text" class="form-control" name="user_lastname">
      </div>
      <div class="form-group">
       <label for="categories">Roles</label>
       <select name="user_role" id="">
       <option value="">Select</option>
      <option value="Adminstrator">Adminstrator</option>
      <option value="Subscriber">Subscriber</option>
       </select>

      </div>
    <div class="form-group">

         <label for="post_tags">Username</label>
          <input type="text" class="form-control" name="username">
      </div>
          <div class="form-group">

         <label for="post_tags">Email</label>
          <input type="email" class="form-control" name="user_email">
      </div>
          <div class="form-group">

         <label for="post_tags">Password</label>
          <input type="password" class="form-control" name="user_password">
      </div>


  
      
     

<div class="form-group">

<input class="btn btn-primary" type="submit" name="create_user" value="Add User">
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
    