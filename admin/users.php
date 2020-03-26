<?php include "includes/admin_header.php"?>
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
                         <?php
                        if(isset($_GET['source']))
                        {
                            $source=$_GET['source'];
                        
                        switch($source){
                            case'add_user';
                       include "add_user.php";
                            break;
                            case'edit_user';
                       include "edit_user.php";
                            break;      
                           
                  }
                        
             }
             ?>
                   <table class="table table-bordered table-hover">
                           <thead>
                               <tr>
                                   <th>Id</th>
                                   <th>Username</th>
                                   <th>Firstname</th>
                                   <th>Lastname</th>
                                   <th>Email</th>
                                   <th>Role</th>
                                
                                  
                               
                               </tr>
                           </thead>
                           <tbody>
                           <?php 
                               
                               
      $query = "SELECT * FROM users";
        $select_users = mysqli_query($connection,$query);         
        
     while($row = mysqli_fetch_assoc($select_users)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
         $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
         $user_image = $row['user_image'];
         $user_email = $row['user_email'];
         $user_role = $row['user_role'];
      
                             
          echo "</tr>";
          echo "<td>$user_id</td>";
          echo "<td>$username</td>";
          echo "<td>$user_firstname</td>";
         echo "<td>$user_lastname</td>";
         echo "<td>$user_email</td>";
           echo "<td>$user_role</td>";
         
   
  
       
        echo "<td><a href='users.php?subscriber={$user_id}'>Subscriber</a></td>";
         echo "<td><a href='users.php?admin={$user_id}'>Admin</a></td>";
        echo "<td><a href='edit_user.php?edit_user={$user_id}'>Edit</a></td>";
        echo "<td><a href='users.php?delete={$user_id}'>Revoke Access</a></td>";
         echo "</tr>";
     }
                               
  ?>
  </tbody>
                        </table>
                       <?php

                                                if(isset($_GET['subscriber'])){
                            $the_user_id=$_GET['subscriber'];
                             $query="UPDATE users SET user_role='Subscriber' WHERE user_id=$the_user_id";
                       $subscriber_query=mysqli_query($connection,$query);
                             header("Location:users.php");
                        }
                                                if(isset($_GET['admin'])){
                            $the_user_id=$_GET['admin'];
                             $query="UPDATE users SET user_role='Administrator' WHERE user_id=$the_user_id";
                       $admin_query=mysqli_query($connection,$query);
                             header("Location:users.php");
                        }
                        if(isset($_GET['delete'])){
                            $the_user_id=$_GET['delete'];
                            $query="DELETE FROM users WHERE user_id ={$the_user_id}";
                       $delete_query=mysqli_query($connection,$query);
                             header("Location:users.php");
                        }
                        
                        
                        
                        
                        ?>
                       
                       
                        </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"?>
    